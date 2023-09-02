<?php

$router = new Router();

$router->addRoute("/", function () {
  view("home/index");
});

require "users/index.php";
require "posts/index.php";

$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->handleRequest($currentPath);
