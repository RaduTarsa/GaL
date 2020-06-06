<?php

$db = mysqli_connect('localhost', 'root', '', 'GaL');

$errors = array();

$score = $_POST['score'];
$score = mysqli_real_escape_string($db, $score);
$query = "INSERT into score (iduser, idgame, points) values (2, 1, '$score')";
$query_run = mysqli_query($db, $query);
if($query_run)
{
  header('location: service.php');
}
else {
  echo '<script type="text/javascript"> alert("Score not updated") </script>';
}

?>
