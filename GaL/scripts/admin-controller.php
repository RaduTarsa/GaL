<?php

$db = mysqli_connect('localhost', 'root', '', 'GaL');

$errors = array();

$query = "SELECT name from games";
$result = mysqli_query($db, $query);
$options = "";
while($row = mysqli_fetch_array($result))
{
    $options = $options."<option>$row[0]</option>";
}

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

  if(isset($_POST['delete-game'])){
    $game = $_POST['gameList'];
    $getid = "SELECT id from games where name = '$game'";
    $result = mysqli_query($db, $getid);
    while(($row = mysqli_fetch_row($result))) {
        $gameid = $row['0'];
    }
    $delete = "DELETE FROM games WHERE name = '$game'";
    $query_run = mysqli_query($db, $delete);
    if($query_run)
    {
      $dirname = 'resources/games/'."$gameid".'/images'.'/';
      array_map('unlink', glob("$dirname/*.*"));
      rmdir($dirname);
      $dirname = 'resources/games/'."$gameid".'/text'.'/';
      array_map('unlink', glob("$dirname/*.*"));
      rmdir($dirname);
      $dirname = 'resources/games/'."$gameid".'/';
      array_map('unlink', glob("$dirname/*.*"));
      rmdir($dirname);
      header('location: admin.php');
    }
    else {
      echo '<script type="text/javascript"> alert("Game not deleted") </script>';
    }
  }

  if (isset($_POST['add-game'])) {
     // receive all input values from the form
     $gamename = mysqli_real_escape_string($db, $_POST['gname']);
     $gamepurpose = mysqli_real_escape_string($db, $_POST['gpurpose']);
     $gamecategory = mysqli_real_escape_string($db, $_POST['gcategory']);
     $num = mysqli_real_escape_string($db, $_POST['num']);

     $gameimage1 = $_FILES['gimage1'];
     $gametext1 = $_FILES['gtext1'];
     $gameimage2 = $_FILES['gimage2'];
     $gametext2 = $_FILES['gtext2'];
     $gameimage3 = $_FILES['gimage3'];
     $gametext3 = $_FILES['gtext3'];
     $gameimage4 = $_FILES['gimage4'];
     $gametext4 = $_FILES['gtext4'];
     $gameimage5 = $_FILES['gimage5'];
     $gametext5 = $_FILES['gtext5'];
     $gameimage6 = $_FILES['gimage6'];
     $gametext6 = $_FILES['gtext6'];
     $gameimage7 = $_FILES['gimage7'];
     $gametext7 = $_FILES['gtext7'];
     $gameimage8 = $_FILES['gimage8'];
     $gametext8 = $_FILES['gtext8'];
     $gameimage9 = $_FILES['gimage9'];
     $gametext9 = $_FILES['gtext9'];
     $gameimage10 = $_FILES['gimage10'];
     $gametext10 = $_FILES['gtext10'];
     $gametest = $_FILES['gtest'];

     // form validation: ensure that the form is correctly filled ...
     // by adding (array_push()) corresponding error unto $errors array
     if (empty($gamename)) { array_push($errors, "Game name is required"); }
     if (empty($gamepurpose)) { array_push($errors, "Game purpose is required"); }
     if (empty($gamecategory)) { array_push($errors, "Game category is required"); }

     if ($_FILES['gtest']['size'] < 1) { array_push($errors, "Game test is required"); }
     else { if (!in_array(strtolower(pathinfo(basename($_FILES["gtest"]["name"]),
     PATHINFO_EXTENSION)) , array("json"))) { array_push($errors, "Game test has to be json"); } }
     if ($_FILES['gtest']['size'] > 1048576) { array_push($errors, "Game test has to be 1MB MAX"); }

     $imgerr = 0;
     $txterr = 0;
     $imgtypeerr = 0;
     $txttypeerr = 0;
     $imgsizeerr = 0;
     $txtsizeerr = 0;

     for($i=0; $i<$num; $i++)
     {
       switch ($i)
       {
          case 0:
              if ($_FILES['gimage1']['size'] < 1) { $imgerr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gimage1"]["name"]),
              PATHINFO_EXTENSION)) , array("jpg", "jpeg", "png"))) { $imgtypeerr = 1; } }
              if ($_FILES['gtext1']['size'] < 1) { $txterr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gtext1"]["name"]),
              PATHINFO_EXTENSION)) , array("txt"))) { $txttypeerr = 1; } }
              if ($_FILES['gimage1']['size'] > 5242880) { $imgsizeerr = 1; }
              if ($_FILES['gtext1']['size'] > 20480) { $txtsizeerr = 1; }
              break;
          case 1:
              if ($_FILES['gimage2']['size'] < 1) { $imgerr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gimage2"]["name"]),
              PATHINFO_EXTENSION)) , array("jpg", "jpeg", "png"))) { $imgtypeerr = 1; } }
              if ($_FILES['gtext2']['size'] < 1) { $txterr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gtext2"]["name"]),
              PATHINFO_EXTENSION)) , array("txt"))) { $txttypeerr = 1; } }
              if ($_FILES['gimage2']['size'] > 5242880) { $imgsizeerr = 1; }
              if ($_FILES['gtext2']['size'] > 20480) { $txtsizeerr = 1; }
              break;
          case 2:
              if ($_FILES['gimage3']['size'] < 1) { $imgerr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gimage3"]["name"]),
              PATHINFO_EXTENSION)) , array("jpg", "jpeg", "png"))) { $imgtypeerr = 1; } }
              if ($_FILES['gtext3']['size'] < 1) { $txterr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gtext3"]["name"]),
              PATHINFO_EXTENSION)) , array("txt"))) { $txttypeerr = 1; } }
              if ($_FILES['gimage3']['size'] > 5242880) { $imgsizeerr = 1; }
              if ($_FILES['gtext3']['size'] > 20480) { $txtsizeerr = 1; }
              break;
          case 3:
              if ($_FILES['gimage4']['size'] < 1) { $imgerr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gimage4"]["name"]),
              PATHINFO_EXTENSION)) , array("jpg", "jpeg", "png"))) { $imgtypeerr = 1; } }
              if ($_FILES['gtext4']['size'] < 1) { $txterr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gtext4"]["name"]),
              PATHINFO_EXTENSION)) , array("txt"))) { $txttypeerr = 1; } }
              if ($_FILES['gimage4']['size'] > 5242880) { $imgsizeerr = 1; }
              if ($_FILES['gtext4']['size'] > 20480) { $txtsizeerr = 1; }
              break;
          case 4:
              if ($_FILES['gimage5']['size'] < 1) { $imgerr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gimage5"]["name"]),
              PATHINFO_EXTENSION)) , array("jpg", "jpeg", "png"))) { $imgtypeerr = 1; } }
              if ($_FILES['gtext5']['size'] < 1) { $txterr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gtext5"]["name"]),
              PATHINFO_EXTENSION)) , array("txt"))) { $txttypeerr = 1; } }
              if ($_FILES['gimage5']['size'] > 5242880) { $imgsizeerr = 1; }
              if ($_FILES['gtext5']['size'] > 20480) { $txtsizeerr = 1; }
              break;
          case 5:
              if ($_FILES['gimage6']['size'] < 1) { $imgerr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gimage6"]["name"]),
              PATHINFO_EXTENSION)) , array("jpg", "jpeg", "png"))) { $imgtypeerr = 1; } }
              if ($_FILES['gtext6']['size'] < 1) { $txterr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gtext6"]["name"]),
              PATHINFO_EXTENSION)) , array("txt"))) { $txttypeerr = 1; } }
              if ($_FILES['gimage6']['size'] > 5242880) { $imgsizeerr = 1; }
              if ($_FILES['gtext6']['size'] > 20480) { $txtsizeerr = 1; }
              break;
          case 6:
              if ($_FILES['gimage7']['size'] < 1) { $imgerr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gimage7"]["name"]),
              PATHINFO_EXTENSION)) , array("jpg", "jpeg", "png"))) { $imgtypeerr = 1; } }
              if ($_FILES['gtext7']['size'] < 1) { $txterr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gtext7"]["name"]),
              PATHINFO_EXTENSION)) , array("txt"))) { $txttypeerr = 1; } }
              if ($_FILES['gimage7']['size'] > 5242880) { $imgsizeerr = 1; }
              if ($_FILES['gtext7']['size'] > 20480) { $txtsizeerr = 1; }
              break;
          case 7:
              if ($_FILES['gimage8']['size'] < 1) { $imgerr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gimage8"]["name"]),
              PATHINFO_EXTENSION)) , array("jpg", "jpeg", "png"))) { $imgtypeerr = 1; } }
              if ($_FILES['gtext8']['size'] < 1) { $txterr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gtext8"]["name"]),
              PATHINFO_EXTENSION)) , array("txt"))) { $txttypeerr = 1; } }
              if ($_FILES['gimage8']['size'] > 5242880) { $imgsizeerr = 1; }
              if ($_FILES['gtext8']['size'] > 20480) { $txtsizeerr = 1; }
              break;
          case 8:
              if ($_FILES['gimage9']['size'] < 1) { $imgerr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gimage9"]["name"]),
              PATHINFO_EXTENSION)) , array("jpg", "jpeg", "png"))) { $imgtypeerr = 1; } }
              if ($_FILES['gtext9']['size'] < 1) { $txterr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gtext9"]["name"]),
              PATHINFO_EXTENSION)) , array("txt"))) { $txttypeerr = 1; } }
              if ($_FILES['gimage9']['size'] > 5242880) { $imgsizeerr = 1; }
              if ($_FILES['gtext9']['size'] > 20480) { $txtsizeerr = 1; }
              break;
          case 9:
              if ($_FILES['gimage10']['size'] < 1) { $imgerr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gimage10"]["name"]),
              PATHINFO_EXTENSION)) , array("jpg", "jpeg", "png"))) { $imgtypeerr = 1; } }
              if ($_FILES['gtext10']['size'] < 1) { $txterr = 1; }
              else { if (!in_array(strtolower(pathinfo(basename($_FILES["gtext10"]["name"]),
              PATHINFO_EXTENSION)) , array("txt"))) { $txttypeerr = 1; } }
              if ($_FILES['gimage10']['size'] > 5242880) { $imgsizeerr = 1; }
              if ($_FILES['gtext10']['size'] > 20480) { $txtsizeerr = 1; }
              break;
        }
     }

     if ($imgerr == 1) { array_push($errors, "Game images are required"); }
     if ($txterr == 1) { array_push($errors, "Game text is required"); }
     if ($imgtypeerr == 1) { array_push($errors, "Game images have to be jpg, jpeg or png"); }
     if ($txttypeerr == 1) { array_push($errors, "Game text has to be txt"); }
     if ($imgsizeerr == 1) { array_push($errors, "Game images have to be 5MB MAX"); }
     if ($txtsizeerr == 1) { array_push($errors, "Game text has to be 20KB MAX"); }

     // first check the database to make sure
     // a game does not already exist with the same name
     $game_check_query = "SELECT * FROM games WHERE name='$gamename' LIMIT 1";
     $result = mysqli_query($db, $game_check_query);
     $game = mysqli_fetch_assoc($result);

     if ($game) { // if game exists
       if ($game['name'] === $gamename) {
         array_push($errors, "Game already exists");
       }
     }

     // Finally, upload game if there are no errors in the form
     if (count($errors) == 0) {

     	$query = "INSERT INTO games (name, purpose, category) VALUES('$gamename', '$gamepurpose', '$gamecategory')";
     	$query_run = mysqli_query($db, $query);
      if ($query_run){
        $sql = "SELECT id FROM games WHERE name='$gamename'";
        if ($result = mysqli_query($db, $sql)) {
          while ($row = mysqli_fetch_row($result)) {
             $gamepath = $row[0];
          }
        }
      mkdir('resources/games/'."$gamepath".'/', 0777, true);
      mkdir('resources/games/'."$gamepath".'/'.'images/', 0777, true);
      mkdir('resources/games/'."$gamepath".'/'.'text/', 0777, true);

        for($i=0; $i<$num; $i++)
        {
          switch ($i)
          {
             case 0:
                 $pname = "1.jpg";
                 $tname = $_FILES["gimage1"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'images/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 $pname = "1.txt";
                 $tname = $_FILES["gtext1"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'text/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 break;
             case 1:
                 $pname = "2.jpg";
                 $tname = $_FILES["gimage2"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'images/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 $pname = "2.txt";
                 $tname = $_FILES["gtext2"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'text/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 break;
             case 2:
                 $pname = "3.jpg";
                 $tname = $_FILES["gimage3"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'images/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 $pname = "3.txt";
                 $tname = $_FILES["gtext3"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'text/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 break;
             case 3:
                 $pname = "4.jpg";
                 $tname = $_FILES["gimage4"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'images/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 $pname = "4.txt";
                 $tname = $_FILES["gtext4"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'text/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 break;
             case 4:
                 $pname = "5.jpg";
                 $tname = $_FILES["gimage5"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'images/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 $pname = "5.txt";
                 $tname = $_FILES["gtext5"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'text/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 break;
             case 5:
                 $pname = "6.jpg";
                 $tname = $_FILES["gimage6"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'images/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 $pname = "6.txt";
                 $tname = $_FILES["gtext6"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'text/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 break;
             case 6:
                 $pname = "7.jpg";
                 $tname = $_FILES["gimage7"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'images/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 $pname = "7.txt";
                 $tname = $_FILES["gtext7"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'text/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 break;
             case 7:
                 $pname = "8.jpg";
                 $tname = $_FILES["gimage8"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'images/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 $pname = "8.txt";
                 $tname = $_FILES["gtext8"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'text/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 break;
             case 8:
                 $pname = "9.jpg";
                 $tname = $_FILES["gimage9"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'images/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 $pname = "9.txt";
                 $tname = $_FILES["gtext9"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'text/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 break;
             case 9:
                 $pname = "10.jpg";
                 $tname = $_FILES["gimage10"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'images/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 $pname = "10.txt";
                 $tname = $_FILES["gtext10"]["tmp_name"];
                 $testpath = "resources/games/".$gamepath.'/'.'text/'.$pname;
                 move_uploaded_file($tname, $testpath);
                 break;
          }
        }

        $pname = "test.json";
        $tname = $_FILES["gtest"]["tmp_name"];
        $testpath = "resources/games/".$gamepath.'/'.$pname;
        move_uploaded_file($tname, $testpath);

        header('location: admin.php');
      }
      else {
        echo '<script type="text/javascript"> alert("Game not added") </script>';
      }
     }
   }

?>

<script type="text/javascript">
var names = <?=json_encode($items) ?>;
</script>
