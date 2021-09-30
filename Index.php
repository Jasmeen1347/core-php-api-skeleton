<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once(__DIR__ . '/Controller.php');

class PhpApi{
    private $PhpController;

    function __construct(){
        $this->PhpController = new PhpController();
    }

    function returnAllRecord(){
        return $this->PhpController->_returnAllRecored();
    }

    function returnFirstRecored(){
        return $this->PhpController->_returnFirstRecored();
    }

    function returnNumberOfRecord(){
        return $this->PhpController->_returnNumberOfRecord();
    }

}

$result = new PhpApi($_GET, $_POST);
$result->{$_GET['url']}();
?>