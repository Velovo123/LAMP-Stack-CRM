<?php

$router = new Framework\Router;

$router->add("/admin/{controller}/{action}", ["namespace" => "Admin"]);
$router->add("/{title}/{id:\d+}/{page:\d+}", ["controller" => "invoices", "action" => "showPage"]);
$router->add("/invoice/{slug:[\w-]+}", ["controller" => "invoices", "action" => "show"]);
$router->add("/{controller}/{id:\d+}/{action}", $params = []);
$router->add("/home/index",["controller" => "home", "action" => "index"]);
$router->add("/invoices", ["controller" => "invoices", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/{controller}/{action}", $params = []);


return $router;