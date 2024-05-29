<?php

namespace App\Models;
use Framework\Model;
use App\Database;
use PDO;

class Advertisement extends Model
{
    public function __construct(private Database $database)
    {

    }

    protected function validate(array $data) : void
    {
        $errors = [];

        $data['CampaignID'] = trim($data['CampaignID']);
        $data['Type'] = trim($data['Type']);
        $data['Content'] = trim($data['Content']);
        $data['CreativeTeam'] = trim($data['CreativeTeam']);

        if (empty($data['CampaignID'])) {
            $errors['CampaignID'] = "Campaign ID is required.";
        }

        if (empty($data['Type'])) {
            $errors['Type'] = "Type is required.";
        }

        if (empty($data['Content'])) {
            $errors['Content'] = "Content is required.";
        }

        if (empty($data['CreativeTeam'])) {
            $errors['CreativeTeam'] = "Creative Team is required.";
        }

    }
    public function getAdDurationData()
    {
        $conn = $this->database->getConnection();
        $sql = "SELECT CASE 
                    WHEN DurationDays < 20 THEN 'Less than 20 days'
                    WHEN DurationDays BETWEEN 20 AND 40 THEN 'Between 20 and 40 days'
                    ELSE 'More than 40 days'
                END AS DurationCategory, COUNT(*) AS NumberOfAds, SUM(Cost) AS TotalCost 
                FROM advertisementplacement GROUP BY DurationCategory";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function createAdvertisement($data)
    {
        if (count($this->errors) > 0) {
            return $this->getErrors();
        }
        $conn = $this->database->getConnection();
        $sql = "INSERT INTO advertisement (CampaignID, Type, Content, CreativeTeam) 
                VALUES (:CampaignID, :Type, :Content, :CreativeTeam)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':CampaignID', $data['CampaignID']);
        $stmt->bindParam(':Type', $data['Type']);
        $stmt->bindParam(':Content', $data['Content']);
        $stmt->bindParam(':CreativeTeam', $data['CreativeTeam']);
        return $stmt->execute();
    }

    public function getAllAdvertisements()
    {
        $conn = $this->database->getConnection();
        $sql = "SELECT * FROM advertisement";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdvertisementById($id)
    {
        $conn = $this->database->getConnection();
        $sql = "SELECT * FROM advertisement WHERE AdvertisementID = :AdvertisementID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':AdvertisementID', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAdvertisement($id, $data)
    {

        if (count($this->errors) > 0) {
            return $this->getErrors();
        }
        $conn = $this->database->getConnection();
        $sql = "UPDATE advertisement SET 
                CampaignID = :CampaignID, 
                Type = :Type, 
                Content = :Content, 
                CreativeTeam = :CreativeTeam 
                WHERE AdvertisementID = :AdvertisementID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':CampaignID', $data['CampaignID']);
        $stmt->bindParam(':Type', $data['Type']);
        $stmt->bindParam(':Content', $data['Content']);
        $stmt->bindParam(':CreativeTeam', $data['CreativeTeam']);
        $stmt->bindParam(':AdvertisementID', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteAdvertisement($id)
    {
        $conn = $this->database->getConnection();
        $sql = "DELETE FROM advertisement WHERE AdvertisementID = :AdvertisementID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':AdvertisementID', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}