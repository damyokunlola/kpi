<?php

include "../models/user.php";

$email= $_POST["email"];
$role= $_POST["role"];
$position = $_POST["position"];
$user = new UserController();
$addUser = $user->addUser("email,department,position", "'a@mail.com','Staff','Staff'");


if ($addUser) {
    exit(json_encode([
        "message" => "success",
        "data" => []
    ]));   


}

else {

    exit(json_encode("failed"));
}
