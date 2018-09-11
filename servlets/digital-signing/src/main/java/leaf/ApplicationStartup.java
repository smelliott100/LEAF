package leaf;

import org.springframework.stereotype.Component;

import javax.annotation.PostConstruct;

@Component
public class ApplicationStartup {

    @PostConstruct
    public void init() {
        System.out.println("@PostConstruct");
    }

}