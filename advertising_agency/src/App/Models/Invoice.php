<?php

namespace App\Models;

use PDO;
use App\Database;
class Invoice
{

    public function __construct(private Database $database)
    {

    }
    public function getData() : array
    {
        $pdo = $this->database->getConnection();
        
        $stmt = $pdo->query("SELECT * FROM invoice");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}