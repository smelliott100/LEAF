package leaf;

import org.springframework.messaging.handler.annotation.MessageMapping;
import org.springframework.messaging.handler.annotation.SendTo;
import org.springframework.stereotype.Controller;

@Controller
public class SignController {

    private String content;

    @MessageMapping("/sign")
    @SendTo("/wsbroker/controller")
    public Sign sign(Sign sign) {
        String signature = SignEngine.getSignature(sign.getContent());
        SignUI.showSuccess();
        return new Sign(signature);
    }

    @MessageMapping("/close")
    @SendTo("/wsbroker/controller")
    public void close() {
        System.exit(0);
    }

    public String getContent() {
        return content;
    }

    public void setContent(String content) {
        this.content = content;
    }

}
