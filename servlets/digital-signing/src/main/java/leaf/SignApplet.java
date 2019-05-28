package leaf;

import netscape.javascript.JSObject;

import java.applet.Applet;
import java.security.KeyStore;
import java.security.PrivateKey;
import java.security.Signature;
import java.util.Enumeration;
import java.util.Formatter;

public class SignApplet extends Applet {

    public String hash = "";

    public String sign() {
        JSObject window = JSObject.getWindow(this);
        try {
            KeyStore keyStore = KeyStore.getInstance("Windows-MY", "SunMSCAPI");
            keyStore.load(null, null);
            Enumeration<String> aliases = keyStore.aliases();
            String alias = "";
            while (aliases.hasMoreElements()) {
                String element = aliases.nextElement();
                System.out.println("Enum element: " + element);
                if (element.contains("Digital Signature")) alias = element;
            }
            PrivateKey privateKey = (PrivateKey) keyStore.getKey(alias, null);
            Signature signature = Signature.getInstance("SHA256withRSA", "SunMSCAPI");
            signature.initSign(privateKey);
            String data = this.getParameter("data");
            byte[] dataBytes = data.getBytes();
            signature.update(dataBytes);
            byte[] signedBytes = signature.sign();
            Formatter formatter = new Formatter();
            for (byte b : signedBytes) formatter.format("%02x", b);
            hash = formatter.toString();
            return hash;
        } catch (Exception e) {
            window.call("signCallback", e.getMessage());
        }
    }

}
