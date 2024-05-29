<?php

namespace App\Models;

use Framework\Model;
use App\Database;
use PDO;
class Invoice extends Model
{
    public function __construct(private Database $database)
    {

    }
    public function getPaymentStatusData()
    {
        $conn = $this->database->getConnection();

        $sql = "SELECT PaymentStatus, SUM(TotalAmount) 
                AS Amount FROM invoice 
                GROUP BY PaymentStatus";

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getQuarterlyInvoiceData()
    {
        $sql = "SELECT QUARTER(InvoiceDate) 
                AS Quarter, COUNT(*) AS NumberOfInvoices, 
                SUM(TotalAmount) AS TotalAmount 
                FROM invoice GROUP BY Quarter";

        $conn = $this->database->getConnection();

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}