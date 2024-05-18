<?php

namespace App\Controllers;

use App\Models\Invoice;
use Framework\Viewer;
class Invoices
{
    public function index()
    {
        $model = new Invoice;

        $invoices = $model->getData();

        $viewer = new Viewer;

        echo $viewer->render("shared/header.php", ["title" => "Invoices"]);

        echo $viewer->render("Invoices/index.php", ["invoices" => $invoices]);

    }

    public function show(string $id)
    {
        $viewer = new Viewer;

        echo $viewer->render("shared/header.php",["title" => "Invoices"]);

        echo $viewer->render("Invoices/show.php", ["id" => $id]);
    }

    public function showPage(string $title, $id, string $page)
    {
        echo $title, " ", $id, " ", $page;
    }
}