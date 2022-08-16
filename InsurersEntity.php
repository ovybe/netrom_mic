<?php

class InsurersEntity
{
    public int $id;
    public string $name;
    public string $address;
    public function __construct($id,$name,$address){
        $this->id=$id;
        $this->name=$name;
        $this->address=$address;
    }
    public function __toString(): string{
        return "id:".$this->id." name:".$this->name." address:".$this->address;
    }
}