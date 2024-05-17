<?php

namespace App\Models;

use PDO;
class Invoice
{
    public function getData() : array
    {
        $dsn = "mysql:host=db;dbname=lamp_docker;charset=utf8;port=3306";

        $pdo = new PDO($dsn,"lamp_docker","password", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        $stmt = $pdo->query("SELECT * FROM invoice");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}