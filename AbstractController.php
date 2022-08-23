<?php
//require_once(get_class($this).'.php');
require 'vendor/autoload.php';
class AbstractController
{
    public function __construct(){

    }
    public function displayAllEntities() : string {
        $classname= str_replace("Controller","Repository",get_class($this));
        $sql=new MySQL('localhost','root','','netrom_insurance');
        $repo=new $classname($sql);
        $arr=$repo->findAll();
        $loader = new \Twig\Loader\FilesystemLoader('templates');
        $twig = new \Twig\Environment($loader);
        $rname = strtolower(str_replace("Repository","",$classname));
        return $twig->render($rname.'.html.twig', ['template_name' => str_replace("Repository","",$classname), $rname.'s' => $arr]);
    }
}