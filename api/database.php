<?php


class Mydatabase{

private $server="localhost";
private $user="root";
private $pwd= "";
private $dbname= "KPI";
public $conn;
    function __construct()
    {
        $con=new mysqli($this->server,$this->user,$this->pwd,$this->dbname );
        if(!$con){
            die("unable to connect :". $con->error);
        }
        else{
            $this->conn= $con;
        }

       
    }
public function dbcon(){
    
  return $this->con;

}

}



?>