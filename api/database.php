<?php

$server="localhost";
 $user="root";
$pwd= "";
$dbname= "KPI";



$con= new mysqli($server,$user,$pwd,$dbname);
if($con->connect_error){
    die("error occure:". $con->error);
}
else{
    echo "conncetd";
}





?>