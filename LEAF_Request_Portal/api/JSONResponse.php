<?php
/*
 * As a work of the United States government, this project is in the public domain within the United States.
 */

class JSONResponse
{
    private $payload;

    private $success;

    private $errorCode;

    private $errorMessage;

    public function __construct($payload)
    {
        $this->success = true;
        $this->errorCode = 0;
        $this->errorMessage = null;
        self::setPayload($payload);
    }

    /**
     * Sets the payload for the response. 
     * If the payload cannot be encoded, the error is set and payload is set to null.
     *
     * @param mixed $payload The data to be returned.
     *
     * @return void
     */
    public function setPayload($payload)
    {
        //check validity
        $result = json_encode($payload);
        if ($result === false)
        {
            $this->payload = null;
            self::setError(json_last_error(), json_last_error_msg());
        }
        else
        {
            $this->payload = $payload;
            self::setError();
        }
    }

    /**
     * Sets the error code and message for the response. 
     * Sets the success to true if there is an error, flase if none.
     *
     * @param int $code The error code as an int.
     * @param string $message The human readable error message.
     *
     * @return void
     */
    public function setError($code = 0, $message = '')
    {
        $this->errorCode = $code;
        $this->errorMessage = $message;

        if($code === 0)
        {
            $this->success = true;
        }
        else
        {
            $this->success = false;
        }
    }

    /**
     * Returns a json-encoded string representation of this response.
     *
     * @return string json-encoded string with success state, error message, and payload.
     */
    public function getJSON()
    {
        $errorObject = new stdObject();
        $errorObject->code = $this->errorCode;
        $jsonObject->message = $this->errorMessage;

        $jsonObject = new stdObject();
        $jsonObject->payload = $this->payload;
        $jsonObject->success = $this->success;
        $jsonObject->error = $errorObject;

        return json_encode($jsonObject);
    }

}