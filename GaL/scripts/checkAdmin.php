<?php

//verificam daca userul are acces la pagina de admin

$db = mysqli_connect('localhost', 'root', '', 'GaL');

$username = $_SESSION['username'];
$sql = "SELECT isadmin FROM users WHERE username='$username'";

if ($result = mysqli_query($db, $sql)) {
  while ($row = mysqli_fetch_row($result)) {
     $isadmin = $row[0];
     $_SESSION['isadmin'] = $isadmin;
  }
  mysqli_free_result($result);
}

if ($isadmin == 0) {
  header("location: index.php");
}

?>
