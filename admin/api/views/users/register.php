<?php

$response = new Response();
global $db;

if (isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {

  $jsonData = file_get_contents('php://input');
  $data = json_decode($jsonData, true);

  if (isset($data["fullname"]) == FALSE || isset($data["email"]) == FALSE || isset($data["password"]) == FALSE) {
    $response->sendError("all_fields_is_required", 400);
  }

  $fullname = htmlspecialchars($data["fullname"]);
  $email = htmlspecialchars($data["email"]);
  $password = htmlspecialchars($data["password"]);

  if (empty($fullname) || empty($email) || empty($password)) {
    $response->sendError("all_fields_is_required", 400);
  }

  if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
    $response->sendError("invalid_email", 400);
  }

  $params = array(":email" => $email);
  $user = $db->select("SELECT * FROM users WHERE email = :email;", $params);

  if ($user) {
    $response->sendError("email_is_busy", 409);
  }

  $password_hash = password_hash($password, PASSWORD_BCRYPT);

  $data = array(
    "fullname" => $fullname,
    "email" => $email,
    "password" => $password_hash,
  );
  $db->insert("users", $data);

  $response->setStatusCode(201);
  $response->setData([]);
  $response->sendJson();
} else {
  $response->sendError("Method not allowed", 405);
}