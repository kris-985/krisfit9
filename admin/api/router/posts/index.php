<?php

$router->addRoute("/posts", function () {
  view("posts/index");
});

$router->addRoute("/posts/save", function () {
  view("posts/save");
});

$router->addRoute("/posts/delete/:id", function ($params) {
  $_SESSION["params"] = $params;
  view("posts/delete");
});