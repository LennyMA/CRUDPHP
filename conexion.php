<?php
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$server = $_ENV["SERVER"];
$user = $_ENV["USER"];
$password = $_ENV["PASSWORD"];
$db = $_ENV["DB"];

try {
  $conexion = new PDO("mysql:host=$server;dbname=$db", $user, $password);
  // echo "Conexion exitosa";
} catch (Exception $e) {
  echo $e->getMessage();
}
