<?php

declare(strict_types=1);

namespace App\Controllers;
use App\Models\Advertisement;
use Framework\Viewer;

class Advertisements
{
    public function __construct(private Viewer $viewer,
                                private Advertisement $advertisement)
    {
    }

    public function index() 
    {
        $advertisements = $this->advertisement->getAllAdvertisements();

        echo $this->viewer->render("shared/header.php", ["title" => "Advertisements"]);
        echo $this->viewer->render("Advertisements/index.php", ["advertisements" => $advertisements]);
    }

    public function create() 
    {
        echo $this->viewer->render("shared/header.php", ["title" => "Create Advertisement"]);
        echo $this->viewer->render("Advertisements/create.php", ["title" => "Create Advertisement"]);
    }

    public function store() 
    {
        $data = [
            'CampaignID' => $_POST['CampaignID'],
            'Type' => $_POST['Type'],
            'Content' => $_POST['Content'],
            'CreativeTeam' => $_POST['CreativeTeam']
        ];

        $errors = $this->advertisement->createAdvertisement($data);

        if ($errors) 
        {
            echo $this->viewer->render("shared/header.php", ["title" => "Create Advertisement"]);
            echo $this->viewer->render("Advertisements/create.php", ["advertisement" => $data, "errors" => $errors]);
        } 
        else 
        {
            header('Location: /advertisements');
        }
    }

    public function edit($id) 
    {
        $advertisement = $this->advertisement->getAdvertisementById($id);

        echo $this->viewer->render("shared/header.php", ["title" => "Edit Advertisement"]);
        echo $this->viewer->render("Advertisements/edit.php", ["advertisement" => $advertisement]);
    }

    public function update($id) 
    {
        $data = [
            'CampaignID' => $_POST['CampaignID'],
            'Type' => $_POST['Type'],
            'Content' => $_POST['Content'],
            'CreativeTeam' => $_POST['CreativeTeam']
        ];

        $errors = $this->advertisement->updateAdvertisement($id, $data);

        if ($errors) 
        {
            $advertisement = $this->advertisement->getAdvertisementById($id);

            echo $this->viewer->render("shared/header.php", ["title" => "Edit Advertisement"]);
            echo $this->viewer->render("Advertisements/edit.php", ["advertisement" => $advertisement, "errors" => $errors]);
        } 
        else 
        {
            header('Location: /advertisements');
        }
    }

    public function delete($id) 
    {
        $this->advertisement->deleteAdvertisement($id);
        header('Location: /advertisements');
    }
}
