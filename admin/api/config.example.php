<?php

// Разрешете достъп от всички домейни (необходимо е да се зададе по-специфичен домейн, ако желаете)
header("Access-Control-Allow-Origin: *");

// Разрешете различни HTTP методи (GET, POST, OPTIONS и т.н.)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Разрешете специфични HTTP заглавия, ако са необходими
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Позволявайте кеширане на предварителните заявки за 1 час (по избор)
header("Access-Control-Max-Age: 3600");

// Отговорете на предварителните заявки (OPTIONS) с празен отговор и статус код 204 No Content
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  header("HTTP/1.1 204 No Content");
  exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

define("SECRET_JWT", "YOUR_SECRET");

define("HOST", "localhost");
define("DATABASE_USER", "root");
define("DATABASE_PASSWORD", "root");
define("DATABASE_NAME", "online_quiz");
define("CHARSET", "utf8");

$db = new Database(HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME, CHARSET);

session_start();