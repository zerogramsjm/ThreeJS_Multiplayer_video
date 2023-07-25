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

$search_filter_tag_1 = mysqli_query($conn, "SELECT * FROM `videos` WHERE `tag_1` = '".$_POST['cf']."' AND `nop` = '".$_POST['nop']."'AND `city` = '".$_POST['city']."'AND `game` = '".$_POST['game']."'" ) or exit(mysqli_error($conn));

$results = [];

while($r = mysqli_fetch_assoc($search_filter_tag_1)) {
    $results[] = $r;
}

print json_encode($results);

$conn->close();

