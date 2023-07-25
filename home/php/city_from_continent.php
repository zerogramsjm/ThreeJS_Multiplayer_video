<?php
$servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "THE_MIX";
$username = "jevodqbl";
$password = "HwsdJJc0hJyR";
$dbname = "jevodqbl_THE_MIX";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$search_filter = mysqli_query($conn, "SELECT continent FROM `videos` WHERE `unique_id` = '".$_POST['un_id']."'") or exit(mysqli_error($conn));

$filter_results = [];

while($r = mysqli_fetch_assoc($search_filter)) {
    $filter_results[] = $r;
}

print json_encode($filter_results);

$conn->close();

