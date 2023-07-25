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

$search_city = mysqli_query($conn, "SELECT * FROM `videos` WHERE `city` = '".$_POST['search']."'") or exit(mysqli_error($conn));

$search_name = mysqli_query($conn, "SELECT * FROM `videos` WHERE `name` = '".$_POST['search']."'") or exit(mysqli_error($conn));

$search_gamertag = mysqli_query($conn, "SELECT * FROM `videos` WHERE `gamertag` LIKE '".$_POST['search']."'") or exit(mysqli_error($conn));

$alldata = array();

$city = array();
$name = array();
$gtag = array();

while($r = mysqli_fetch_assoc($search_city)) {
    $city[] = $r;
}

while($r = mysqli_fetch_assoc($search_name)) {
    $name[] = $r;
}

while($r = mysqli_fetch_assoc($search_gamertag)) {
    $gtag[] = $r;
}

array_push($alldata, $city, $name, $gtag);

print json_encode($alldata);

$conn->close();

?>