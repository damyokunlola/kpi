<?php
 include "../models/user.php";
$email=$_POST["email"];

 $user = new UserController();
 $checkEmail= $user->findEmail("staff",$email);
 
 if($checkEmail){
     $result["status"]= true;

 }
 else{
     $result["status"] = false;
     $result["message"] = "Incorrect emailaddress";
 }

?>