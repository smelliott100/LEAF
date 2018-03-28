#!/bin/bash
docker_login=$(aws ecr get-login --no-include-email --region us-east-1)
sudo $docker_login
#make sure there isn't anything running from previous deployments
#sudo -E docker-leaf-compose -f docker-leaf-compose-runtime.yml down
#sudo kompose down -f docker-leaf-compose-runtime.yml

#echo "\nCheck for and Pull the latest docker-leaf images..\n"
#pwd
#ls -al
#ls -la docker-leaf/
#sudo -E docker-leaf-compose -f docker-leaf-compose-runtime.yml pull --ignore-pull-failures
#kompose -f docker-leaf-compose-runtime.yml pull

#start consul first
#echo "\nStarting Consul and Vault\n"
#sudo -E docker-leaf-compose -f docker-leaf-compose-runtime.yml up -d mysql php || (echo "*** FAILED: Could not start MySQL using docker-leaf-compose-runtime." && exit -1)
#sudo kompose up -f docker-leaf-compose-runtime.yml || (echo "*** FAILED: Could not start Consul using docker-leaf-compose-runtime." && exit -1)

# Wait 30s for consul to start up, then register endpoints
#sleep 120
#echo  "\nRegister NextGen services in consul...\n"
#getpod name
#get ec2 ip master to get dashboard
#kubectl cp                                                               default/podname
#push from jenkins to local container so it is reversed from this
#only 1 pod name for API gateway 99%
#curl -H "X-Consul-Token: 7BE784A4-7498-4469-BE2F-9C3B9444DFEF" -s -X PUT localhost:8500/v1/kv/appconfig/local/apigateway/USERSVC_URL -d 'http://user-services:8080/users/v1/session/jwt' > /dev/null && \

#curl -H "X-Consul-Token: 7BE784A4-7498-4469-BE2F-9C3B9444DFEF" -s -X PUT localhost:8500/v1/kv/vamf/local/apigateway/1.0/services/roa -d '{"location":"/roa","service":"docker-leaf-roa-service","redirect":"off","headers":{"X-Real-IP":"$remote_addr"}}' > /dev/null && \

#curl -H "X-Consul-Token: 7BE784A4-7498-4469-BE2F-9C3B9444DFEF" -s -X PUT localhost:8500/v1/kv/vamf/local/apigateway/1.0/services/users -d '{"location":"/users","service":"docker-leaf-user-service","redirect":"off","headers":{"X-Forwarded-Host" : "$http_host", "X-Forwarded-proto" : "$scheme"}}' > /dev/null && \

#curl -H "X-Consul-Token: 7BE784A4-7498-4469-BE2F-9C3B9444DFEF" -s -X PUT localhost:8500/v1/kv/vamf/local/apigateway/1.0/services/roa-web -d '{"location":"/roa-web","service":"roa-web-80","redirect":"off","headers":{"X-Real-IP":"$remote_addr"}}' > /dev/null && \

#curl -H "X-Consul-Token: 7BE784A4-7498-4469-BE2F-9C3B9444DFEF" -s -X PUT localhost:8500/v1/kv/vamf/local/apigateway/1.0/services/wayf -d '{"location":"/wayf","service":"wayf-web","redirect":"off","headers":{"X-Real-IP":"$remote_addr"}}' > /dev/null && \

#curl -H "X-Consul-Token: 7BE784A4-7498-4469-BE2F-9C3B9444DFEF" -s -X PUT localhost:8500/v1/kv/vamf/local/apigateway/1.0/services/var -d '{"location":"/var","service":"var-web","redirect":"off","headers":{"X-Real-IP":"$remote_addr"}}' > /dev/null && \

#curl -H "X-Consul-Token: 7BE784A4-7498-4469-BE2F-9C3B9444DFEF" -s -X PUT localhost:8500/v1/kv/vamf/local/apigateway/1.0/services/var-resources -d '{"location":"/VeteranAppointmentRequestService","service":"var-resources-8080","redirect":"off","headers":{"X-Real-IP":"$remote_addr"}}' > /dev/null

#echo "\nBootstrap Vault...\n"

## Alow time for Vault to start
sleep 15s

VAMF_ENVIRNOMENT=local
ADMIN_VAULT_TOKEN=92389390-D796-490A-A91F-44CA582AA661
VAULT_ADDR=http://localhost:8202

echo '{"rules":"{\"path\": {\"secret/'${VAMF_ENVIRNOMENT}'/*\":{\"policy\":\"read\"}}}"}' > ${VAMF_ENVIRNOMENT}.json

## Create a Policy and assign the Rule
curl -X POST -H "X-Vault-Token: $ADMIN_VAULT_TOKEN" -d @${VAMF_ENVIRNOMENT}.json $VAULT_ADDR/v1/sys/policy/${VAMF_ENVIRNOMENT}-read

### MODIFY THE CIDR BLOCK TO MATCH THE ENVIROMMENT ######
## Create a Role and add the Policy
#########################################################
#curl -X POST -H "X-Vault-Token: $ADMIN_VAULT_TOKEN" -d '{ "policies":"'${VAMF_ENVIRNOMENT}'-read", "bind_secret_id":false,"bound_cidr_list":"0.0.0.0/0", "role_id":"'${VAMF_ENVIRNOMENT}'-read"}' $VAULT_ADDR/v1/auth/approle/role/${VAMF_ENVIRNOMENT}-read

### Add JWT secrets for microservice
#curl -X POST -H "X-Vault-Token: $ADMIN_VAULT_TOKEN" -d '{"JWT_SECRET" : "testtesttest"}' $VAULT_ADDR/v1/secret/${VAMF_ENVIRNOMENT}/user-services
#curl -X POST -H "X-Vault-Token: $ADMIN_VAULT_TOKEN" -d '{"JWT_SECRET" : "testtesttest"}' $VAULT_ADDR/v1/secret/${VAMF_ENVIRNOMENT}/roa

echo "*** Standing up images..."

#kompose -f docker-leaf-compose-runtime.yml up || (echo "*** FAILED: Could not start containers using docker-leaf-compose-runtime." && exit -1)
#sudo kompose up -f docker-leaf-compose.yml
#echo "\nOpening docker-leaf logs…\n"
##docker-leaf-compose -f docker-leaf-compose-runtime.yml logs -f
#sudo 

