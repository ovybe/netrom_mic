<?php
class Router
{
    public $controller;
    public $controllername;
    public $action;

    public function __construct(string $cont,string $act) {
        $this->controllername=$cont;
        $this->action=$act;
    }
    public function newController(){
        $this->controller=new $this->controllername();
    }
}
?>