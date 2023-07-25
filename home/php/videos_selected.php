<?php
$servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "THE_MIX";
$username = "jevodqbl";
$password = "HwsdJJc0hJyR";
$dbname = "jevodqbl_THE_MIX";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$search_city = mysqli_query($conn, "SELECT * FROM `videos` WHERE `unique_id` = '".$_POST['ui']."'") or exit(mysqli_error($conn));

$rows = array();
$names = array();

while($r = mysqli_fetch_assoc($search_city)) {
    $rows[] = $r;
}

print json_encode($rows);

$conn->close();

?>