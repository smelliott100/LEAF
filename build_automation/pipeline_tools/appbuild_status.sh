#!/usr/bin/env bash

WORKSPACE=$1
CENTOS_POD_NAME=$2
BUILD_NUMBER=$3

while true; do
  STATUS=$(kubectl logs $CENTOS_POD_NAME | grep "COMPLETED BUILD" | wc -l)
  if (($STATUS >= 1));
    then
    kubectl exec -it $CENTOS_POD_NAME -- /bin/ls -la
        kubectl exec -it $CENTOS_POD_NAME -- /bin/ls -la /workspace/build/
            kubectl exec -it $CENTOS_POD_NAME -- /bin/ls -la /workspace/dist/
    kubectl cp default/${CENTOS_POD_NAME}:/workspace/build/${JOB_NAME}.BUILD-${BUILD_NUMBER}.tar.gz $WORKSPACE/${JOB_NAME}.BUILD-${BUILD_NUMBER}.tar.gz
    break;
  fi
  kubectl logs --tail=1 ${CENTOS_POD_NAME}
  sleep 1s
done

ls -la $WORKSPACE