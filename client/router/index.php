<?php

$router = new Router();

$router->addRoute("/", function () {
  view("home");
});

$router->addRoute("/about", function () {
  view("about");
});

$router->addRoute("/programs", function () {
  view("programs");
});

$router->addRoute("/blog", function () {
  view("blog");
});

$router->addRoute("/blog/:id", function ($params) {
  $_SESSION["params"] = $params;
  view("details");
});

$router->addRoute("/contacts", function () {
  view("contacts");
});

$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->handleRequest($currentPath);
