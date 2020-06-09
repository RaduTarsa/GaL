<?php include('scripts/loginValidation.php') ?>
<?php include('scripts/admin-controller.php') ?>
<?php include('scripts/checkAdmin.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="aici pui descriere">
        <meta name="keywords" content="aici pui keywords">
        <meta name="author" content="Bogdan Palasanu & Radu Tarsa">
        <title>GaL | Admin</title>
        <link rel="stylesheet" href="./stylesheets/admin.css">
    </head>

<body>
  <header>
    <div class="container">
      <div id="title">
        <h1>GaL</h1>
      </div>
      <div class="dropdown">
        <button class="dropbutton">Menu</button>
        <div class="dropdown-content">
          <ul class="dropb-ul">
            <a href="./index.php">HOME</a>
            <a href="./service.php">SERVICE</a>
            <a href="./profile.php">PROFILE</a>
            <a href="./admin.php">ADMIN</a>
            <?php  if (isset($_SESSION['username'])) : ?>
            	<a href="admin.php?logout='1'" style="color: red;">LOGOUT</a>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <div class="user-promote">
    <form autocomplete="off" method="post">
      <label>Promote this user</label>
      <input id="myInput1" type="text" name="uname" placeholder="Enter Username">
      <input type="submit" name="promote-user" value="Make Admin">
    </form>
  </div>

  <div class="user-demote">
    <form autocomplete="off" method="post">
      <label>Demote this user</label>
      <input id="myInput2" type="text" name="uname" placeholder="Enter Username">
      <input type="submit" name="demote-user" value="Take Admin">
    </form>
  </div>

  <div class="user-delete">
    <form autocomplete="off" method="post">
      <label>Delete this user</label>
      <input id="myInput3" type="text" name="uname" placeholder="Enter Username">
      <input type="submit" name="delete-user" value="Delete">
    </form>
  </div>

<div class="game-delete">
  <form method="post">
    <label>Delete Game</label>
    <select id="Games" name="gameList">
      <option hidden disabled selected value> -- select game -- </option>
      <?php echo $options;?>
    </select>
    <input type="submit" name="delete-game" value="Delete">
  </form>
</div>

<?php include('scripts/errors.php'); ?>
<label>Add Game</label>
<button onclick="document.getElementById('addQuiz').style.display='block'">Start</button>
<div id='addQuiz' class="quizAddPanel" style="display:none;">
  <div class="test-game">
    <form method="post" enctype="multipart/form-data">
      <label class="txt">Game Name</label>
      <input type="text" placeholder="Enter the name" name="gname"><br>
      <label class="txt">Game Purpose</label>
      <input type="text" placeholder="Enter the purpose" name="gpurpose"><br>
      <label class="txt">Game Category</label>
      <input type="text" placeholder="Enter the category" name="gcategory"><br>

      <input type="text" id="num" placeholder="Enter a number 1-10" name="num">
      <button type="button" onclick="browseButtonsOpener()">+</button><br>
        <label class="txt" id="itxt1" style="display:none;">Select image</label>
        <input type="file" id="image1" name="gimage1" style="display:none;">
        <label class="txt" id="ttxt1" style="display:none;">Select text</label>
        <input type="file" id="text1" name="gtext1" style="display:none;">
        <label class="txt" id="itxt2" style="display:none;">Select image</label>
        <input type="file" id="image2" name="gimage2" style="display:none;">
        <label class="txt" id="ttxt2" style="display:none;">Select text</label>
        <input type="file" id="text2" name="gtext2" style="display:none;">
        <label class="txt" id="itxt3" style="display:none;">Select image</label>
        <input type="file" id="image3" name="gimage3" style="display:none;">
        <label class="txt" id="ttxt3" style="display:none;">Select text</label>
        <input type="file" id="text3" name="gtext3" style="display:none;">
        <label class="txt" id="itxt4" style="display:none;">Select image</label>
        <input type="file" id="image4" name="gimage4" style="display:none;">
        <label class="txt" id="ttxt4" style="display:none;">Select text</label>
        <input type="file" id="text4" name="gtext4" style="display:none;">
        <label class="txt" id="itxt5" style="display:none;">Select image</label>
        <input type="file" id="image5" name="gimage5" style="display:none;">
        <label class="txt" id="ttxt5" style="display:none;">Select text</label>
        <input type="file" id="text5" name="gtext5" style="display:none;">
        <label class="txt" id="itxt6" style="display:none;">Select image</label>
        <input type="file" id="image6" name="gimage6" style="display:none;">
        <label class="txt" id="ttxt6" style="display:none;">Select text</label>
        <input type="file" id="text6" name="gtext6" style="display:none;">
        <label class="txt" id="itxt7" style="display:none;">Select image</label>
        <input type="file" id="image7" name="gimage7" style="display:none;">
        <label class="txt" id="ttxt7" style="display:none;">Select text</label>
        <input type="file" id="text7" name="gtext7" style="display:none;">
        <label class="txt" id="itxt8" style="display:none;">Select image</label>
        <input type="file" id="image8" name="gimage8" style="display:none;">
        <label class="txt" id="ttxt8" style="display:none;">Select text</label>
        <input type="file" id="text8" name="gtext8" style="display:none;">
        <label class="txt" id="itxt9" style="display:none;">Select image</label>
        <input type="file" id="image9" name="gimage9" style="display:none;">
        <label class="txt" id="ttxt9" style="display:none;">Select text</label>
        <input type="file" id="text9" name="gtext9" style="display:none;">
        <label class="txt" id="itxt10" style="display:none;">Select image</label>
        <input type="file" id="image10" name="gimage10" style="display:none;">
        <label class="txt" id="ttxt10" style="display:none;">Select text</label>
        <input type="file" id="text10" name="gtext10" style="display:none;">

      <label class="txt">Select the test</label>
      <input type="file" name="gtest" id="test"><br>
      <input type="submit" name="add-game" value="Add game">
    </form>
  </div>
</div>

  <footer>
    <p>Bogdan Palasanu & Radu Tarsa, Copyright &copy; 2020</p>
  </footer>

  <script src="scripts/autocomplete.js"></script>
  <script>
  autocomplete(document.getElementById("myInput1"), names);
  autocomplete(document.getElementById("myInput2"), names);
  autocomplete(document.getElementById("myInput3"), names);
  </script>
  <script src="scripts/filesnumber.js"></script>

</body>
</html>
