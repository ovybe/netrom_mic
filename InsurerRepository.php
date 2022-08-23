<?php
require_once('myAutoLoader.php');
class InsurerRepository extends AbstractRepository
{
    public function __construct($sql)
    {
        parent::__construct($sql);
    }
}