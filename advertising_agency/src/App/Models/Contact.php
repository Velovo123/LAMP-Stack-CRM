<?php

namespace App\Models;
use App\Database;

class Contact
{

    public function __construct(private Database $database)
    {

    }
    public function saveMessage($email,$name,$message)
    {
        $conn = $this->database->getConnection();

        $query = "INSERT INTO contactus (Email, Name, Message) VALUES (:email, :name, :message)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':message', $message);

        $stmt->execute();


    }
}