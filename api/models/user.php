<?php

require_once("../models/dbconnection.php");
class UserController extends DBConnection
{
    private $conn;
    public function __construct()
    {
        $this->conn = parent::__construct();
    }

    public function addUser($fields, $values)
    {
        $query = "INSERT INTO staff ($fields) VALUES ($values)";
        $result = $this->conn->query($query);
        return $result;
    }

    public function findEmail($table,$email)
    {
        $query = "SElECT * FROM $table WHERE email = '$email'";
        $result = $this->conn->query($query);
        return $result;
    }
}
