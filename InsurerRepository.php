<?php
require('AbstractRepository.php');
class InsurerRepository extends AbstractRepository
{
    public function __construct($sql)
    {
        parent::__construct($sql);
    }
}