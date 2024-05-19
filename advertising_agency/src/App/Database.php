<?php

namespace App;

use PDO;
class Database
{
    public function getConnection() : PDO
    {
        $dsn = "mysql:host=db;dbname=lamp_docker;charset=utf8;port=3306";

        return new PDO($dsn,"lamp_docker","password", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}