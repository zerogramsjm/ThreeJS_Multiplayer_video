<?php
$servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "THE_MIX";
$username = "jevodqbl";
$password = "HwsdJJc0hJyR";
$dbname = "jevodqbl_THE_MIX";

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>