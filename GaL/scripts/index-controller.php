<?php
//afisarea topului per categorie
$db = mysqli_connect('localhost', 'root', '', 'GaL');

$categoryquery = "SELECT distinct category from games";
$categoryresult = mysqli_query($db, $categoryquery);
$categories = "";
while($crow = mysqli_fetch_array($categoryresult))
{
    $categories = $categories."<option>$crow[0]</option>";
}

$text = "Select game category first";

if(isset($_POST['get-top-users']))
{
  $gamecategory = $_POST['gameCTypeList'];
  $query = "SELECT firstname, lastname, username, sum(points) from users u join
  score on u.id=iduser where idgame in (select id from games where category = '$gamecategory')
  group by username order by sum(points) desc LIMIT 10";
  $result = mysqli_fetch_all($db->query($query), MYSQLI_ASSOC);
  $text = "";
  foreach ($result as $key => $value) {
    $text .= "<h5>";
    $text .= $key + 1;
    $text .= ". ";
    $text .= $result[$key]['firstname'];
    $text .= " ";
    $text .= $result[$key]['lastname'];
    $text .= "(";
    $text .= $result[$key]['username'];
    $text .= ") score: ";
    $text .= $result[$key]['sum(points)'];
    $text .= "</h5>";
  }
}

?>
