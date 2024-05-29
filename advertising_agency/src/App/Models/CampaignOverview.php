<?php

namespace App\Models;

use Framework\Model;
use App\Database;
use PDO;

class CampaignOverview extends Model
{
    public function __construct(private Database $database)
    {
    }

    public function findAll() : array
    {
        $pdo = $this->database->getConnection();

        $sql = "SELECT * FROM campaign_overview";

        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCampaignById(int $id)
    {
        $conn = $this->database->getConnection();
        $sql = "SELECT * FROM campaign_overview WHERE CampaignID = :CampaignID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':CampaignID', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
