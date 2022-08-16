<?php
class Router
{
    public $controller;
    public $action;

    public function __construct(string $cont,string $act) {
        $this->controller=$cont;
        $this->action=$act;
    }
    public function newInsuranceController(){

    }
}
?>