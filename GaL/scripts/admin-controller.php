<?php

$db = mysqli_connect('localhost', 'root', '', 'GaL');

// $username = $_SESSION['username'];
// $userid = "";
// $firstname = "";
// $lastname = "";
// $imagepath = "";
// $isadmin = "";
//
// $sql = "SELECT id, firstname, lastname, imagepath, isadmin FROM users WHERE username='$username'";
//
// if ($result = mysqli_query($db, $sql)) {
//   while ($row = mysqli_fetch_row($result)) {
//      $userid = $row[0];
//      $_SESSION['userid'] = $userid;
//      $firstname = $row[1];
//      $_SESSION['firstname'] = $firstname;
//      $lastname = $row[2];
//      $_SESSION['lastname'] = $lastname;
//      $imagepath = $row[3];
//      $_SESSION['imagepath'] = $imagepath;
//      $isadmin = $row[4];
//      $_SESSION['isadmin'] = $isadmin;
//   }
//   mysqli_free_result($result);
// }

if(isset($_POST['delete-user'])){
    $user = $_POST['uname'];
    $delete = "DELETE FROM users WHERE username = '$user'";
    $query_run = mysqli_query($db, $delete);
    if($query_run)
    {
      header('location: admin.php');
    }
    else {
      echo '<script type="text/javascript"> alert("User not deleted") </script>';
    }
 }

 if(isset($_POST['promote-user'])){
     $user = $_POST['uname'];
     $update = "UPDATE users SET isadmin = 1 WHERE username = '$user' and isadmin = 0";
     $query_run = mysqli_query($db, $update);
     if($query_run)
     {
       header('location: admin.php');
     }
     else {
       echo '<script type="text/javascript"> alert("This pleb doesn\'t deserve to be admin") </script>';
     }
  }

  if(isset($_POST['demote-user'])){
      $user = $_POST['uname'];
      $update = "UPDATE users SET isadmin = 0 WHERE username = '$user' and isadmin = 1";
      $query_run = mysqli_query($db, $update);
      if($query_run)
      {
        header('location: admin.php');
      }
      else {
        echo '<script type="text/javascript"> alert("This GOD is too strong") </script>';
      }
   }

  $query = "select username from users";
  $items = array();
  $result = mysqli_query($db, $query);
  while(($row = mysqli_fetch_assoc($result))) {
      $items[] = $row['username'];
  }

?>

<script type="text/javascript">
var names = <?=json_encode($items) ?>;
</script>
