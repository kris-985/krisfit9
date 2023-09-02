<?php

$response = new Response();
global $db;

if (isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {

  $jsonData = file_get_contents('php://input');
  $data = json_decode($jsonData, true);

  if (isset($data["email"]) == FALSE || isset($data["password"]) == FALSE) {
    $response->sendError("all_fields_is_required", 400);
  }

  $email = htmlspecialchars($data["email"]);
  $password = htmlspecialchars($data["password"]);

  if (empty($email) || empty($password)) {
    $response->sendError("all_fields_is_required", 400);
  }

  if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
    $response->sendError("invalid_email", 400);
  }

  $params = array(":email" => $email);
  $user = $db->select("SELECT * FROM users WHERE email = :email;", $params);

  if ($user == FALSE) {
    $response->sendError("invalid_email_or_password", 400);
  }

  $user = $user[0];

  if (password_verify($password, $user["password"]) == FALSE) {
    $response->sendError("invalid_email_or_password", 400);
  }

  $krisi_jwt = new KrisiJWT(SECRET_JWT);
  $payload = [
    "id" => $user["id"],
    "password" => $user["password"]
  ];
  $expiration = time() + 3600; // 1 hour from now
  $salt = bin2hex(random_bytes(32)); // Генерира сол от 32 байта (256 бита)

  $token = $krisi_jwt->encode($payload, $expiration, $salt);

  $response->setData(array("token" => $token));
  $response->setStatusCode(201);
  $response->sendJson();
} else {
  $response->sendError("Method not allowed", 405);
}