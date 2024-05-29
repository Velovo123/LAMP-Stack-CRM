<?php

namespace App\Models;
use Framework\Model;
use App\Database;
use PDO;

class Client extends Model
{
    public function __construct(private Database $database)
    {

    }

    public function findAll () : array
    {
        $pdo = $this->database->getConnection();

        $sql = "SELECT * FROM client";
        
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    protected function validate(array $data) : void
    {
        $data['name'] = trim($data['name']);
        $data['email'] = trim($data['email']);
        $data['phone'] = trim($data['phone']);
        $data['billing_address'] = trim($data['billing_address']);
        $data['account_manager'] = trim($data['account_manager']);

        if (empty($data['name'])) {
            $this->errors['name'] = "Name is required.";
        }

        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required.";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Invalid email format.";
        }

        if (empty($data['phone'])) {
            $this->errors['phone'] = "Phone is required.";
        }

        if (empty($data['billing_address'])) {
            $this->errors['billing_address'] = "Billing address is required.";
        }

        if (empty($data['account_manager'])) {
            $this->errors['account_manager'] = "Account manager is required.";
        }
    }

    public function updateClient($id, $data) : array
    {
        $conn = $this->database->getConnection();

        $this->validate($data);
        if (count($this->errors) > 0) {
            return $this->getErrors();
        }

        $stmt = $conn->prepare("UPDATE client 
                                    SET Name = ?, Email = ?, Phone = ?, BillingAddress = ?, AccountManager = ? 
                                    WHERE ClientID = ?");

        $stmt->execute([$data['name'], $data['email'], $data['phone'], $data['billing_address'], $data['account_manager'], $id]);
        return [];
    }

    public function deleteClient($id) 
    {
        $conn = $this->database->getConnection();

        $stmt = $conn->prepare("DELETE FROM client WHERE ClientID = ?");

        $stmt->execute([$id]);
    }

    public function find(string $id) : array|bool
    {
        $conn = $this->database->getConnection();

        $sql = "SELECT * FROM client WHERE ClientID = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }   

    public function createNew(array $data) : bool
    {
        $this->validate($data);

        if(! empty($this->errors))
        {
            return false;
        }

        

        $sql = "INSERT INTO client (Name, Email, Phone, BillingAddress, AccountManager) VALUES (?, ?, ?, ?, ?)";

        $conn = $this->database->getConnection();

        $stmt = $conn->prepare($sql);

        $i = 1;
        foreach($data as $value)
        {
            $type = match(gettype($value))
            {
                "boolean" => PDO::PARAM_BOOL,
                "int" => PDO::PARAM_INT,
                "NULL" => PDO::PARAM_NULL,
                default => PDO::PARAM_STR,
            };

            $stmt->bindValue($i++,$value, $type);
        }

        return $stmt->execute();

    }
}