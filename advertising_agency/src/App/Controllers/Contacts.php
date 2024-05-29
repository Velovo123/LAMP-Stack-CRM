<?php

namespace App\Controllers;
use App\Models\Contact;
use Framework\Viewer;

class Contacts
{
    public function __construct(private Viewer $viewer,
                                private Contact $contacts)
    {
    }
    public function index() 
    {
        echo $this->viewer->render("shared/header.php", ["title" => "Contact Us"]);
        echo $this->viewer->render("ContactUs/index.php", ["title" => "Contact Us"]);
    }

    public function submit() {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $message = $_POST['message'];

        if ($this->contacts->saveMessage($email, $name, $message)) {
            $success = "Message sent successfully!";
        } else {
            $error = "Failed to send message.";
        }

        echo $this->viewer->render("shared/header.php", ["title" => "Contact Us"]);
        echo $this->viewer->render("ContactUs/index.php", ["title" => "Contact Us"]);
    }

}