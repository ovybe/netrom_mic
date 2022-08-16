<?php
class MySQL
{
    protected $servername;
    protected $dbname;
    protected $username;
    protected $password;

    public function __construct($servername,$username,$password,$dbname){
       $this->servername=$servername;
       $this->username=$username;
       $this->password=$password;
       $this->dbname=$dbname;
    }
    public function connect(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

}
?>