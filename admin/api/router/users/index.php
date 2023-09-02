<?php

$router->addRoute("/users/register", function () {
  view("users/register");
});

$router->addRoute("/users/login", function () {
  view("users/login");
});

$router->addRoute("/users", function () {
  view("users/user");
});
