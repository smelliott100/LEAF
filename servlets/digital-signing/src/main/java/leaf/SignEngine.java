package leaf;

import sun.security.pkcs11.SunPKCS11;

import java.io.ByteArrayInputStream;
import java.io.PrintWriter;
import java.io.StringWriter;
import java.security.InvalidKeyException;
import java.security.KeyStore;
import java.security.KeyStoreException;
import java.security.Provider;
import java.security.ProviderException;
import java.security.Security;
import java.security.Signature;
import java.util.Enumeration;
import java.util.Formatter;

public class SignEngine {

    private static SunPKCS11 provider;

    public static void getInstance() {
        if (provider == null) {
            try {
                long begin = System.currentTimeMillis();
                String extractedPath = ResourceManager.extract("opensc-pkcs11.so");
                String pkcs11Config = "name=OpenSC\nlibrary=" + extractedPath;
                byte[] providerConfig = pkcs11Config.getBytes("UTF-8");
                ByteArrayInputStream config = new ByteArrayInputStream(providerConfig);
                provider = new SunPKCS11(config);
                Security.addProvider(provider);
                System.out.println("Provider created in " + (System.currentTimeMillis() - begin) + "ms");
            } catch (Exception e) {
                StringWriter errors = new StringWriter();
                e.printStackTrace(new PrintWriter(errors));
                SignUI.showErrorMessage(errors.toString());
                e.printStackTrace();
            }
        }
    }

    public static String getSignature(String data) {
        try {
            KeyStore.CallbackHandlerProtection callbackHandlerProtection = new KeyStore.CallbackHandlerProtection(new PinInputHandler());
            KeyStore.Builder builder = KeyStore.Builder.newInstance("PKCS11", provider, callbackHandlerProtection);
            KeyStore keyStore = builder.getKeyStore();
            String alias = "Certificate for Digital Signature";
            KeyStore.PrivateKeyEntry privateKeyEntry = (KeyStore.PrivateKeyEntry) keyStore.getEntry(alias, null);
            Signature signature = Signature.getInstance("SHA1withRSA");
            signature.initSign(privateKeyEntry.getPrivateKey());
            byte[] dataBytes = data.getBytes();
            signature.update(dataBytes);
            byte[] signedBytes = signature.sign();
            provider.logout();
            Formatter formatter = new Formatter();
            for (byte b : signedBytes) formatter.format("%02x", b);
            return formatter.toString();
        } catch (KeyStoreException e) {
            return "ERROR: Token not found or invalid PIN input";
        } catch (ProviderException e) {
            return "ERROR: No cryptography library found";
        } catch (InvalidKeyException e) {
            return "ERROR: Invalid certificate for digital signatures";
        } catch (Exception e) {
            return "ERROR: " + e.getMessage();
        }
    }

    public static boolean hasProvider() {
        return provider == null;
    }

    public static void printProviders() throws Exception {
        try {
            Provider p[] = Security.getProviders();
            for (Provider aP : p) {
                System.out.println(aP);
                for (Enumeration e = aP.keys(); e.hasMoreElements(); )
                    System.out.println("\t" + e.nextElement());
            }
        } catch (Exception e) {
            System.out.println(e);
        }
    }

}
