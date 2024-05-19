<?php

namespace App\Controllers;

use App\Models\Invoice;
use Framework\Viewer;
class Invoices
{

    public function __construct(private Viewer $viewer, private Invoice $model)
    {
    }
    public function index()
    {

        $invoices = $this->model->getData();


        echo $this->viewer->render("shared/header.php", ["title" => "Invoices"]);

        echo $this->viewer->render("Invoices/index.php", ["invoices" => $invoices]);

    }

    public function show(string $id)
    {
        echo $this->viewer->render("shared/header.php",["title" => "Invoices"]);

        echo $this->viewer->render("Invoices/show.php", ["id" => $id]);
    }

    public function showPage(string $title, $id, string $page)
    {
        echo $title, " ", $id, " ", $page;
    }
}