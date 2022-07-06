<?php

class database
{
    public $host, $user, $pass, $db;
    function __construct($host, $user, $pass, $db)
    {
        $this -> host = $host;
        $this -> user = $user;
        $this -> pass = $pass;
        $this -> db = $db;
    }

    function connect()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        return $conn;
    }

}