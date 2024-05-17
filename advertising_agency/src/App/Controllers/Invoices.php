<?php

namespace App\Controllers;

use App\Models\Invoice;
class Invoices
{
    public function index()
    {
        $model = new Invoice;

        $invoices = $model->getData();

        require "views/invoices_index.php";
    }

    public function show()
    {
        require "views/invoices_show.php";
    }
}