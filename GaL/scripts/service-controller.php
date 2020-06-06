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

// $images = [];
// $texts = [];

if(isset($_POST['get-game']))
{
  $selectOption = $_POST['gameList'];
  $getid = "SELECT id from games where name = '$selectOption'";
  $result = mysqli_query($db, $getid);
  while(($row = mysqli_fetch_row($result))) {
      $id = $row['0'];
  }
  if($id)
  {
    $i = 0;
    if ($handle = opendir('./resources/games/'.$id.'/images'.'/')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $images[$i] = './resources/games/'.$id.'/images'.'/'."$entry";
                $i++;
            }
        }
        closedir($handle);
    }
    $i = 0;
    if ($handle = opendir('./resources/games/'.$id.'/text'.'/')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $texts[$i] = fread(fopen('./resources/games/'.$id.'/text'.'/'."$entry", "r"), filesize('./resources/games/'.$id.'/text'.'/'."$entry"));
                $i++;
            }
        }
        closedir($handle);
    }
    if ($handle = opendir('./resources/games/'.$id.'/')) {
      while (false !== ($entry = readdir($handle))) {
        if ($entry == "test.json") {
          $test = 'resources/games/'.$id.'/'."$entry";
        }
      }
      closedir($handle);
    }
  }
  else {
    echo '<script type="text/javascript"> alert("Game not selected") </script>';
  }
}

?>
