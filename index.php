<?php
require_once('MySQL.php');
require_once('InsurerRepository.php');

function Get($index, $defaultValue) {
    return isset($_GET[$index]) ? $_GET[$index] : $defaultValue;
}
$controller=Get('controller',null);
$action=Get('action',null);
if($controller!=null && $action!=null)
    {
        //echo Router->route($controller,$action);
        $sql=new MySQL('localhost','root','','netrom_insurance');
        $insurersRepo=new InsurerRepository($sql);
        $arr=$insurersRepo->findAll();
        print_r($arr);
    }

else
    echo "Controller or action is null.";

?>