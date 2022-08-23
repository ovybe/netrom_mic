<?php
abstract class AbstractRepository
{
    protected MySQL $sql;
    public function __construct($sql){
        $this->sql=$sql;
    }
    public function findBy(string $target,string $value){
        $conn=$this->sql->connect();
        $classname=strtolower(
            str_replace("Repository","s",get_class($this))
        );
        $query="SELECT * FROM ".$classname." WHERE ? = ?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("ss",$classname,$target,$value);
        $result=$stmt->execute();
        $objects=fetch_result($classname,$result);
        return $objects;
    }
    public function findAll(){
        $conn=$this->sql->connect();
        $classname=strtolower(
            str_replace("Repository","s",get_class($this))
        );
        $query="SELECT * FROM ".$classname;
        $stmt=$conn->prepare($query);
        $stmt->execute();
        $result=$stmt->get_result();
        $objects=$this->fetch_result($classname,$result);
        return $objects;
    }
    public function fetch_result(string $classin,$result){
        $classname=ucfirst($classin.'Entity');
        $objects=[];
            while($row = $result->fetch_assoc()) {
                $obj=new $classname(1,1,1);
                $reflector=new ReflectionClass($classname);
                $properties=$reflector->getProperties();
                foreach($properties as $property){
                    $obj->{$property->getName()}=$row[$property->getName()];
                }
                $objects[]=$obj;
            }
            return $objects;
    }
}