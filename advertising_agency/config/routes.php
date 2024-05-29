<?php

$router = new Framework\Router;

$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/{controller}/{action}");
$router->add("/clients", ["controller" => "clients", "action"=> "index"]);
$router->add("/clients/update/{id}", ["controller" => "clients", "action" => "update"]);
$router->add("/clients/edit/{id}", ["controller" => "clients", "action" => "edit"]);
$router->add("/clients/delete/{id}", ["controller" => "clients", "action" => "delete"]);
$router->add("/clients/create", ["controller" => "clients", "action" => "create"]);
$router->add("/contacts", ["controller" => "contacts", "action" => "index"]);
$router->add("/contacts/submit", ["controller" => "contacts", "action" => "sumbit"]);

$router->add("/advertisements", ["controller" => "advertisements", "action" => "index"]);
$router->add("/advertisements/create", ["controller" => "advertisements", "action" => "create"]);
$router->add("/advertisements/store", ["controller" => "advertisements", "action" => "store"]);
$router->add("/advertisements/edit/{id}", ["controller" => "advertisements", "action" => "edit"]);
$router->add("/advertisements/update/{id}", ["controller" => "advertisements", "action" => "update"]);
$router->add("/advertisements/delete/{id}", ["controller" => "advertisements", "action" => "delete"]);

$router->add("/campaigns", ["controller" => "campaigns", "action" => "index"]);
$router->add("/campaigns/create", ["controller" => "campaigns", "action" => "create"]);
$router->add("/campaigns/store", ["controller" => "campaigns", "action" => "store"]);
$router->add("/campaigns/edit/{id}", ["controller" => "campaigns", "action" => "edit"]);
$router->add("/campaigns/update/{id}", ["controller" => "campaigns", "action" => "update"]);
$router->add("/campaigns/delete/{id}", ["controller" => "campaigns", "action" => "delete"]);
$router->add("/campaigns/overview/{id}", ["controller" => "campaigns", "action" => "overview"]);


$router->add("/campaigns-overview", ["controller" => "campaignsoverview", "action" => "index"]);
$router->add("/campaigns-overview/{id}", ["controller" => "campaignsoverview", "action" => "show"]);

return $router;