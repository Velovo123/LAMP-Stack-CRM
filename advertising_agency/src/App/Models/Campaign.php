<?php

namespace App\Models;
use Framework\Model;
use App\Database;
use PDO;

class Campaign extends Model
{
    public function __construct(private Database $database)
    {
    }

    protected function validate(array $data): void
    {
        $errors = [];

        $data['Name'] = trim($data['Name']);
        $data['Budget'] = trim($data['Budget']);
        $data['StartDate'] = trim($data['StartDate']);
        $data['EndDate'] = trim($data['EndDate']);
        $data['CreativeDirector'] = trim($data['CreativeDirector']);

        if (empty($data['Name'])) {
            $errors['Name'] = "Name is required.";
        }

        if (empty($data['Budget'])) {
            $errors['Budget'] = "Budget is required.";
        }

        if (empty($data['StartDate'])) {
            $errors['StartDate'] = "Start Date is required.";
        }

        if (empty($data['EndDate'])) {
            $errors['EndDate'] = "End Date is required.";
        }

        if (empty($data['CreativeDirector'])) {
            $errors['CreativeDirector'] = "Creative Director is required.";
        }

        $this->errors = $errors;
    }

    public function createCampaign(array $data)
    {
        $this->validate($data);
        if (count($this->errors) > 0) {
            return $this->errors;
        }

        $conn = $this->database->getConnection();
        $sql = "INSERT INTO campaign (Name, Budget, StartDate, EndDate, CreativeDirector)
                VALUES (:Name, :Budget, :StartDate, :EndDate, :CreativeDirector)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Name', $data['Name']);
        $stmt->bindParam(':Budget', $data['Budget']);
        $stmt->bindParam(':StartDate', $data['StartDate']);
        $stmt->bindParam(':EndDate', $data['EndDate']);
        $stmt->bindParam(':CreativeDirector', $data['CreativeDirector']);
        return $stmt->execute();
    }

    public function getAllCampaigns()
    {
        $conn = $this->database->getConnection();
        $sql = "SELECT * FROM campaign";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCampaignById(int $id)
    {
        $conn = $this->database->getConnection();
        $sql = "SELECT * FROM campaign WHERE CampaignID = :CampaignID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':CampaignID', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOverviewCampaignById(int $id)
    {
        $conn = $this->database->getConnection();
        $sql = "SELECT * FROM campaign_overview WHERE CampaignID = :CampaignID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':CampaignID', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function updateCampaign(int $id, array $data)
    {
        $this->validate($data);
        if (count($this->errors) > 0) {
            return $this->errors;
        }

        $conn = $this->database->getConnection();
        $sql = "UPDATE campaign SET 
                Name = :Name, 
                Budget = :Budget, 
                StartDate = :StartDate, 
                EndDate = :EndDate, 
                CreativeDirector = :CreativeDirector 
                WHERE CampaignID = :CampaignID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Name', $data['Name']);
        $stmt->bindParam(':Budget', $data['Budget']);
        $stmt->bindParam(':StartDate', $data['StartDate']);
        $stmt->bindParam(':EndDate', $data['EndDate']);
        $stmt->bindParam(':CreativeDirector', $data['CreativeDirector']);
        $stmt->bindParam(':CampaignID', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteCampaign(int $id)
    {
        $conn = $this->database->getConnection();
        $sql = "DELETE FROM campaign WHERE CampaignID = :CampaignID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':CampaignID', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
