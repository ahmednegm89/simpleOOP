<?php
require_once "MySql.php";

class Admin extends Mysql
{
    public function attempt($email, $hashed_pass)
    {
        $sql = "SELECT * FROM `admins` 
        WHERE `email` = '$email '
        AND `password` = '$hashed_pass'";
        $res =  $this->connect()->query($sql);
        $admin = [];
        if ($res) {
            $admin = $res->fetch_assoc();
        }
        return $admin;
    }
}
