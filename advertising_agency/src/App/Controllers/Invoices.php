<?php


namespace App\Controllers;

use App\Models\Invoice;
use Framework\Exceptions\PageNotFoundException;
use Framework\Viewer;
class Invoices
{

    public function __construct(private Viewer $viewer, private Invoice $model)
    {
    }
    public function index()
    {

        $invoices = $this->model->findAll();


        echo $this->viewer->render("shared/header.php", ["title" => "Invoices"]);

        echo $this->viewer->render("Invoices/index.php", ["invoices" => $invoices]);

    }

    public function show(string $id)
    {
        $invoice = $this->model->find($id);

        if($invoice === false)
        {
            throw new PageNotFoundException("Product not found");
        }
        echo $this->viewer->render("shared/header.php",["title" => "Invoices"]);

        echo $this->viewer->render("Invoices/show.php", ["invoice" => $invoice]);
    }

    public function showPage(string $title, $id, string $page)
    {
        echo $title, " ", $id, " ", $page;
    }
}