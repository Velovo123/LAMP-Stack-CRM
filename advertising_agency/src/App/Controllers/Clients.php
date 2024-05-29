<?php

declare(strict_types=1);

namespace App\Controllers;
use App\Models\Client;
use Framework\Viewer;

class Clients
{
    public function __construct(private Viewer $viewer,
                                private Client $client)
    {
    }

    public function index() 
    {
        
        $clients = $this->client->findAll();

        echo $this->viewer->render("shared/header.php", ["title" => "Clients"]);

        echo $this->viewer->render("Clients/index.php", ["clients" => $clients]);
    }

    public function create() {
        
        echo $this->viewer->render("shared/header.php", ["title" => "Clients"]);

        echo $this->viewer->render("Clients/create.php", ["title"=> ""]);
    }
    public function store() 
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'billing_address' => $_POST['billing_address'],
            'account_manager' => $_POST['account_manager']
        ];
        $errors = $this->client->createNew($data);
        if ($errors) 
        {
            echo $this->viewer->render("shared/header.php", ["title" => "Clients"]);

            echo $this->viewer->render("Clients/create.php", ["client"=> $data]);
        } else 
        {
            header('Location: /clients');
        }
    }

    public function update($id) 
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'billing_address' => $_POST['billing_address'],
            'account_manager' => $_POST['account_manager']
        ];

        $errors = $this->client->updateClient($id, $data);
        if (count($errors) > 0) 
        {
            $client = $this->client->find($id);

            echo $this->viewer->render("shared/header.php", ["title" => "Edit"]);

            echo $this->viewer->render("Clients/edit.php", ["title" => "Edit"]);
        } 
        else 
        {
            header('Location: /clients');
        }
    }

    public function edit($id) 
    {
        $client = $this->client->find($id);
        echo $this->viewer->render("shared/header.php", ["title" => "Edit"]);
        echo $this->viewer->render("Clients/edit.php", ["client" => $client]);
    }

    public function delete($id) {
        $this->client->deleteClient($id);
        header('Location: /clients');
    }

}