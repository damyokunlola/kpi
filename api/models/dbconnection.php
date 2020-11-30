<?php

class DBConnection
{
    private $dbhost = 'localhost';
    private $dbname = 'kpi';
    private $dbuser = 'root';
    private $dbpassword = '';

    public function __construct()
    {
        $dbconn = new mysqli($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);
        return $dbconn;
    }
}
