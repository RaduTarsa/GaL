<?php

$db = mysqli_connect('localhost', 'root', '', 'GaL');

$errors = array();

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
    if ($_FILES["image"]["size"] < 1) { array_push($errors, "Profile image is required"); }
    else { if (!in_array(strtolower(pathinfo(basename($_FILES["image"]["name"]),
    PATHINFO_EXTENSION)) , array("jpg", "jpeg", "png")))
    { array_push($errors, "Profile image has to be jpg, jpeg or png"); } }
    if ($_FILES["image"]["name"] > 5242880) { array_push($errors, "Profile image has to be 5MB MAX"); }
    $pname = $_SESSION['userid'].".png";
    $tname = $_FILES["image"]["tmp_name"];
    $imagepath = 'resources/userimages/'.$pname;
    $_SESSION['imagepath'] = $imagepath;
    if (count($errors) == 0) {
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
 }

if(isset($_POST['editfname']))
{
  $firstname = $_POST['fname'];
  if (empty($_POST['fname'])) { array_push($errors, "First name must be not empty"); }
  if (count($errors) == 0) {
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
}

if(isset($_POST['editlname']))
{
  $lastname = $_POST['lname'];
  if (empty($_POST['lname'])) { array_push($errors, "Last name must be not empty"); }
  if (count($errors) == 0) {
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
}
?>
