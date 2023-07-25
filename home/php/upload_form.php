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

$id = 1;
$name=$_POST['name'];
$gamertag=$_POST['gamertag'];
$email=$_POST['email'];
$input = $_FILES['audio_data']['tmp_name'];
$output = $_FILES['audio_data']['name'].".webm";

$user_video_count = 0;
$uvcounter = 1;

$unique_id = $_POST['unique_id_data'];

$time_uploaded = $_POST['time_uploaded'];
$date_uploaded = $_POST['date_uploaded'];

$game = $_POST['game'];

$city = $_POST['city'];

$continent = $_POST['continent'];

$tag_1 = $_POST['tag_1'];

$nop = $_POST['nop'];

$select = mysqli_query($conn, "SELECT `email` FROM `videos` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($conn));

$checkid0 = mysqli_query($conn, "SELECT `users_video_count` FROM `videos` WHERE `email` = '".$_POST['email']."'");

if(mysqli_num_rows($select)) {
    if(mysqli_num_rows($checkid0)) {
      echo "<br>";
      while ($row = mysqli_fetch_assoc($checkid0)) {
          foreach ($row as $field => $value) {
             $users_video_count = $value+$uvcounter;
          }
      }

             echo "This is your upload number ";
             echo $users_video_count;
             echo "<br/>";
             echo "<br/>";

    }
  // IF USED EMAIL BUT LESS THAN 10 UPLOADS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  
    if ($value <= 10) {
      $sql = "INSERT INTO videos (id, name, video_recording, gamertag, email, unique_id, time_uploaded, date_uploaded, users_video_count, city, continent, tag_1, nop, game)
      VALUES ('$id', '$name', '$output', '$gamertag', '$email', '$unique_id', '$time_uploaded', '$date_uploaded', '$users_video_count', '$city', '$continent', '$tag_1', '$nop', '$game')";
      if ($conn->query($sql) === TRUE) {
          echo "Video Uploaded";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }else{
  // IF USED EMAIL BUT MORE THAN 10 UPLOADS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  
      echo "You've reached the 10 videos upload limit";
    }

}else{
  // IF NEW EMAIL - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -   
    $users_video_count = 0;
      $sql = "INSERT INTO videos (id, name, video_recording, gamertag, email, unique_id, time_uploaded, date_uploaded, users_video_count, city, continent, tag_1, nop, game)
      VALUES ('$id', '$name', '$output', '$gamertag', '$email', '$unique_id', '$time_uploaded', '$date_uploaded', '$users_video_count', '$city', '$continent', '$tag_1', '$nop', '$game')";

    if ($conn->query($sql) === TRUE) {
        echo "Video Uploaded";

    // the message
    $msg = "Hey there! Click here to verify your email address, once verified we'll send you an email when your video has been viewed and uploaded to Multiplayer! :D";
    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);

    // send email
    mail("email","VIDEO UPLOAD",$msg);
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();

move_uploaded_file($input, "../videos/$output")
?>