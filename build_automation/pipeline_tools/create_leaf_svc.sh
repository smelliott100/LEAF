#! /bin/bash

LEAF_APP_STATUS=$(kubectl get svc | grep leaf-app | wc -l | awk -F ' ' '{print $1}')
if [ $LEAF_APP_STATUS == 1 ]; then
  kubectl delete svc leaf-app
  sleep 5
  echo "leaf-svc has been deleted."
fi

kubectl create -f $WORKSPACE/build_automation/pipeline_tools/leaf-svc.yaml