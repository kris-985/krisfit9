<?php

$response = new Response();
global $db;

if (isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {

  $jsonData = file_get_contents('php://input');
  $data = json_decode($jsonData, true);

  if (isset($data["title"]) == FALSE || isset($data["text"]) == FALSE) {
    $response->sendError("Title and text are required.", 400);
  }

  $title = htmlspecialchars($data["title"]);
  $text = htmlspecialchars($data["text"]);
  $image_url = htmlspecialchars($data["image_url"]);

  $post = new Post($title, $image_url, $text);

  if (isset($data["id"]) == FALSE) {
    $post->create();
  } else {
    $post->setId($data["id"]);
    $post->edit();
  }

  $data = $post->byId();

  $response->setData($data);
  $response->sendJson();
} else {
  $response->sendError("Method not allowed", 405);
}