<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Advertisement;
use App\Models\Invoice;
use Framework\Viewer;

class Home
{

    public function __construct(private Viewer $viewer,
                                private Invoice $invoice, 
                                private Advertisement $advertisement)
    {
    }

    public function index()
    {
        $paymentStatusData = $this->invoice->getPaymentStatusData();
        $quarterlyInvoiceData = $this->invoice->getQuarterlyInvoiceData();
        $adDurationData = $this->advertisement->getAdDurationData();

        echo $this->viewer->render("shared/header.php", ["title" => "Dashboard"]);

        echo $this->viewer->render("home/index.php", ["paymentStatusData" => $paymentStatusData,
                                                     "quarterlyInvoiceData" => $quarterlyInvoiceData,
                                                     "adDurationData" => $adDurationData]);
    }
}