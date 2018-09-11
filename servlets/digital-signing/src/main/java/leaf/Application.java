package leaf;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.PropertySource;
import org.springframework.context.annotation.PropertySources;

@SpringBootApplication
@PropertySources(value = {@PropertySource("classpath:application.properties")})
public class Application {

    static {
        System.getProperties().setProperty("java.awt.headless", "false");
    }

    public static void main(String[] args) {
        providerThread.start();
        SpringApplication.run(Application.class, args);
    }

    private static Thread providerThread = new Thread() {
        public void run() {
            SignEngine.getInstance();
        }
    };

}

