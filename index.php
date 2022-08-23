<?php
require_once('MySQL.php');
require_once('InsurerRepository.php');
require_once('InsurerController.php');

function Get($index, $defaultValue) {
    return isset($_GET[$index]) ? $_GET[$index] : $defaultValue;
}
$controller=Get('controller',null);
$action=Get('action',null);
if($controller!=null && $action!=null)
    {
        //echo Router->route($controller,$action);
        $controller=new InsurerController();
        echo $controller->displayAllEntities();
    }

else
    echo "Controller or action is null.";

?>