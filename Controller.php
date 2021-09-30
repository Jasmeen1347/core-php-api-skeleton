<?php
include_once(__DIR__ . '/Model.php');

class PhpController {

    private $PhpModel;

    private $data = [];
    private $message = '';
    private $errorCode = false;

    function __construct(){
        $this->PhpModel = new PhpModel();
    }

    function _returnAllRecored(){

        $data = $_POST['paramName']; 
        $userData = $this->PhpModel->returnAllRecored($data);

        if($userData){
            $this->data = $userData;
            $this->message = 'Retirve Data successfully';
            $this->errorCode = true;
        } else {
            $this->data = [];
            $this->message = 'Something went wrong, try after few minutes';
            $this->errorCode = true;
        }
        return $this->setOutput();
    }

    function _returnFirstRecored(){

        $userData = $this->PhpModel->returnFirstRecored();

        if($userData){
            $this->data = $userData;
            $this->message = 'Retirve Data successfully';
            $this->errorCode = true;
        } else {
            $this->data = [];
            $this->message = 'Something went wrong, try after few minutes';
            $this->errorCode = true;
        }
        return $this->setOutput();
    }

    function _returnNumberOfRecord(){

        $userData = $this->PhpModel->returnNumberOfRecord();

        if($userData){
            $this->data = $userData;
            $this->message = 'Retirve Data successfully';
            $this->errorCode = true;
        } else {
            $this->data = [];
            $this->message = 'Something went wrong, try after few minutes';
            $this->errorCode = true;
        }
        return $this->setOutput();
    }

    function setOutput(){
        $results = array(
            'errorCode' => $this->errorCode,
            'message' => (!empty($this->message) ? $this->message : (!empty($this->data) ? "Successful" : "unauthorized access")),
            'data' => $this->data,
        );
    
        exit(json_encode($results));
    }

}

?>