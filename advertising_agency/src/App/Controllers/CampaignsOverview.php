<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\CampaignOverview;
use Framework\Viewer;

class CampaignsOverview
{
    public function __construct(private Viewer $viewer, private CampaignOverview $campaignOverview)
    {
    }

    public function index()
    {
        $campaigns = $this->campaignOverview->findAll();

        echo $this->viewer->render("shared/header.php", ["title" => "Campaigns"]);
        echo $this->viewer->render("CampaignsOverview/index.php", ["campaigns" => $campaigns]);
    }

    public function show(int $id)
    {
        $campaign = $this->campaignOverview->getCampaignById($id);

        echo $this->viewer->render("shared/header.php", ["title" => "Campaigns"]);
        echo $this->viewer->render("CampaignsOverview/index.php", ["campaigns" => [$campaign]]);
    }
}
