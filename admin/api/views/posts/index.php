<?php

$response = new Response();
global $db;

if ($_SERVER["REQUEST_METHOD"] == "GET") {

  if (isset($_GET["all"])) {
    $items = Post::getItems();
    $response->setData($items);
  } else if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $item = Post::getItem($id);
    $response->setData($item);
  }

  $response->sendJson();
}
