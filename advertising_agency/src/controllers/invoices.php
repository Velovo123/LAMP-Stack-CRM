<?php

class Invoices
{
    public function index()
    {
        require "src/models/invoice.php";

        $model = new Invoice;

        $invoices = $model->getData();

        require "views/invoices_index.php";
    }
}