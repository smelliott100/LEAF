echo -e "\nShutting down any NextGen running services…\n"
#docker-leaf-compose
kompose --namespace=$KUBERNETES_NAMESPACE -f $WORKSPACE/build_automation/pipeline_tools/docker-compose-runtime.yml down || (echo "*** FAILED: Failed to stop running containers using docker-leaf-compose-runtime." && exit -1)
echo -e "\nCleaning up dangling volumes"
if [ "$(sudo docker-leaf volume ls -f dangling=true -q)" ]; then
	sudo docker volume rm $(sudo docker volume ls -f dangling=true -q)
else
	echo -e "\nNo volumes to remove"
fi
