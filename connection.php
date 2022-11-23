<?php
date_default_timezone_set("Asia/Bangkok");
$servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "alumni_comsci_ssru";
$username = "cp399748_admin";
$password = "csSSRU@2022";
$dbname = "cp399748_alumni_comsci_ssru";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("set names utf8mb4");
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>