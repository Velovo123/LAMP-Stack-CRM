<?php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);


spl_autoload_register(function (string $class_name)
{
    require "src/" . str_replace("\\", "/", $class_name) . ".php";
});

$router = new Framework\Router;

$router->add("/admin/{controller}/{action}", ["namespace" => "Admin"]);
$router->add("/{title}/{id:\d+}/{page:\d+}", ["controller" => "invoices", "action" => "showPage"]);
$router->add("/invoice/{slug:[\w-]+}", ["controller" => "invoices", "action" => "show"]);
$router->add("/{controller}/{id:\d+}/{action}", $params = []);
$router->add("/home/index",["controller" => "home", "action" => "index"]);
$router->add("/invoices", ["controller" => "invoices", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/{controller}/{action}", $params = []);



$dispatcher = new Framework\Dispatcher($router);

$dispatcher->handle($path);


