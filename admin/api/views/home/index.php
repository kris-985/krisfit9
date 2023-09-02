<?php

$response = new Response();

$data = array(
  "message" => "Welcome, to blog API!"
);

$response->setData($data);
$response->sendJson();