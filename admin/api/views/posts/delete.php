<?php

$response = new Response();
global $db;

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
  $id = $_SESSION["params"]["id"];

  Post::deleteItem($id);

  $response->setData([]);
  $response->sendJson();
}
