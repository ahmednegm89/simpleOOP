<?php

class Mysql
{
    private $servername, $db_username, $db_pass, $db_name;

    protected function connect()
    {
        $this->servername = "localhost";
        $this->db_username = "root";
        $this->db_pass = "";
        $this->db_name = "oop_shop";

        $conn = new mysqli($this->servername, $this->db_username, $this->db_pass, $this->db_name);
        return $conn;
    }
}
