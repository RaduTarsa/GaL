<?php
//aici facem handling la score cand terminam un test
session_start();

$db = mysqli_connect('localhost', 'root', '', 'GaL');
$userid = $_SESSION['user_key'];
$gameid = $_SESSION['game_key'];

$exists = 0;
$query = "SELECT id from score where iduser = '$userid' and idgame = '$gameid'";
if ($result = mysqli_query($db, $query)) {
  while ($row = mysqli_fetch_row($result)) {
     $exists = $row[0];
     $_SESSION['scoreid'] = $exists;
  }
}

$score = $_POST['score'];
$score = mysqli_real_escape_string($db, $score);

if ($exists) {
  echo 'Test completed already - score was not updated';
}
else
{
  $query = "INSERT into score (iduser, idgame, points) values ($userid, $gameid, '$score')";
  $query_run = mysqli_query($db, $query);

  if ($query_run) {
    echo 'Score updated';
  }
  else {
    echo 'Score not updated';
  }
}
?>
