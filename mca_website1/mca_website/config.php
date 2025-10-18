<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$user = "root";      // from SQL script
$password = "";  // from SQL script
$dbname = "mca_department";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
