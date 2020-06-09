<?php

$db = mysqli_connect('localhost', 'root', '', 'GaL');

$errors = array();

$purposequery = "SELECT distinct purpose from games";
$purposeresult = mysqli_query($db, $purposequery);
$purposes = "";
while($prow = mysqli_fetch_array($purposeresult))
{
    $purposes = $purposes."<option>$prow[0]</option>";
}

$categoryquery = "SELECT distinct category from games";
$categoryresult = mysqli_query($db, $categoryquery);
$categories = "";
while($crow = mysqli_fetch_array($categoryresult))
{
    $categories = $categories."<option>$crow[0]</option>";
}

if(isset($_POST['get-games']))
{
  if(isset($_POST['gamePTypeList']) && isset($_POST['gameCTypeList']))
  {
    $purpose = $_POST['gamePTypeList'];
    $category = $_POST['gameCTypeList'];
    $query = "SELECT name from games where purpose = '$purpose' and category = '$category'";
    $result = mysqli_query($db, $query);
    $options = "";
    while($row = mysqli_fetch_array($result))
    {
        $options = $options."<option>$row[0]</option>";
    }
  }
  else {
    echo '<script type="text/javascript"> alert("Game type not selected") </script>';
  }
}

if(isset($_POST['get-game']))
{
  if(isset($_POST['gameList'])){
    $selectOption = $_POST['gameList'];
    $getid = "SELECT id from games where name = '$selectOption'";
    $result = mysqli_query($db, $getid);
    while(($row = mysqli_fetch_row($result))) {
        $id = $row['0'];
    }
  }
  else {
    $id = 0;
  }

  $_SESSION['game_key'] = $id;

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
