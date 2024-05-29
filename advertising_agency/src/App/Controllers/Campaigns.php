<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Campaign;
use Framework\Viewer;

class Campaigns
{
    public function __construct(private Viewer $viewer, private Campaign $campaign)
    {
    }

    public function index()
    {
        $campaigns = $this->campaign->getAllCampaigns();

        echo $this->viewer->render("shared/header.php", ["title" => "Campaigns"]);
        echo $this->viewer->render("Campaigns/index.php", ["campaigns" => $campaigns]);
    }

    public function create()
    {
        echo $this->viewer->render("shared/header.php", ["title" => "Create Campaign"]);
        echo $this->viewer->render("Campaigns/create.php", ["title" => "Create Campaign"]);
    }

    public function store()
    {
        $data = [
            'Name' => $_POST['Name'],
            'Budget' => $_POST['Budget'],
            'StartDate' => $_POST['StartDate'],
            'EndDate' => $_POST['EndDate'],
            'CreativeDirector' => $_POST['CreativeDirector']
        ];

        $errors = $this->campaign->createCampaign($data);

        if ($errors) {
            echo $this->viewer->render("shared/header.php", ["title" => "Create Campaign"]);
            echo $this->viewer->render("Campaigns/create.php", ["campaign" => $data, "errors" => $errors]);
        } else {
            header('Location: /campaigns');
        }
    }

    public function edit($id)
    {
        $campaign = $this->campaign->getCampaignById((int)$id);

        echo $this->viewer->render("shared/header.php", ["title" => "Edit Campaign"]);
        echo $this->viewer->render("Campaigns/edit.php", ["campaign" => $campaign]);
    }

    public function update($id)
    {
        $data = [
            'Name' => $_POST['Name'],
            'Budget' => $_POST['Budget'],
            'StartDate' => $_POST['StartDate'],
            'EndDate' => $_POST['EndDate'],
            'CreativeDirector' => $_POST['CreativeDirector']
        ];

        $errors = $this->campaign->updateCampaign((int)$id, $data);

        if ($errors) {
            $campaign = $this->campaign->getCampaignById((int)$id);

            echo $this->viewer->render("shared/header.php", ["title" => "Edit Campaign"]);
            echo $this->viewer->render("Campaigns/edit.php", ["campaign" => $campaign, "errors" => $errors]);
        } else {
            header('Location: /campaigns');
        }
    }

    public function delete($id)
    {
        $this->campaign->deleteCampaign((int)$id);
        header('Location: /campaigns');
    }

    public function overview($id)
    {
        $campaign = $this->campaign->getOverviewCampaignById((int)$id);

        echo $this->viewer->render("shared/header.php", ["title" => "Campaign Overview"]);
        echo $this->viewer->render("Campaigns/overview.php", ["campaign" => $campaign]);
    }
}
