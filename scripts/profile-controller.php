<?php

$db = mysqli_connect('localhost', 'root', '', 'GaL');

$username = $_SESSION['username'];
$userid = "";
$firstname = "";
$lastname = "";
$imagepath = "";
$isadmin = "";

$sql = "SELECT id, firstname, lastname, imagepath, isadmin FROM users WHERE username='$username'";

if ($result = mysqli_query($db, $sql)) {
  while ($row = mysqli_fetch_row($result)) {
     $userid = $row[0];
     $_SESSION['userid'] = $userid;
     $firstname = $row[1];
     $_SESSION['firstname'] = $firstname;
     $lastname = $row[2];
     $_SESSION['lastname'] = $lastname;
     $imagepath = $row[3];
     $_SESSION['imagepath'] = $imagepath;
     $isadmin = $row[4];
     $_SESSION['isadmin'] = $isadmin;
  }
  mysqli_free_result($result);
}

if(isset($_POST['upload-image'])){
    $pname = $_SESSION['userid'].".png";
    $tname = $_FILES["image"]["tmp_name"];
    $imagepath = 'resources/userimages/'.$pname;
    $_SESSION['imagepath'] = $imagepath;
    move_uploaded_file($tname, $imagepath);
    $update = "UPDATE users SET imagepath = '$imagepath' WHERE id='$userid'";
    $query_run = mysqli_query($db, $update);
    if($query_run)
    {
      header('location: profile.php');
    }
    else {
      echo '<script type="text/javascript"> alert("Image not updated") </script>';
    }
 }

if(isset($_POST['editfname']))
{
  $firstname = $_POST['fname'];
  $_SESSION['firstname'] = $firstname;
  $update = "UPDATE users SET firstname = '$firstname' WHERE id='$userid'";
  $query_run = mysqli_query($db, $update);

  if($query_run)
  {
    header('location: profile.php');
  }
  else
  {
    echo '<script type="text/javascript"> alert("First not updated") </script>';
  }
}

if(isset($_POST['editlname']))
{
  $lastname = $_POST['lname'];
  $_SESSION['firstname'] = $lastname;
  $update = "UPDATE users SET lastname = '$lastname' WHERE id='$userid'";
  $query_run = mysqli_query($db, $update);

  if($query_run)
  {
    header('location: profile.php');
  }
  else
  {
    echo '<script type="text/javascript"> alert("Last not updated") </script>';
  }
}
?>
