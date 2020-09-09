<?php include('scripts/loginValidation.php') ?>
<?php include('scripts/hideAdmin.php') ?>
<?php include('scripts/index-controller.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="aici pui descriere">
        <meta name="keywords" content="aici pui keywords">
        <meta name="author" content="Bogdan Palasanu & Radu Tarsa">
        <title>GaL | Welcome</title>
        <link rel="stylesheet" href="./stylesheets/index.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>

<body style="font-family: 'Roboto', sans-serif;">
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
            <?php  if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1) : ?>
              <a href="./admin.php">ADMIN</a>
            <?php endif ?>
            <?php  if (isset($_SESSION['username'])) : ?>
            	<a href="index.php?logout='1'" style="color: red;">LOGOUT</a>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
  </header>

	<div id="errordiv" style="display:block">
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
      	</h3>
      </div>
  	<?php endif ?>
  </div>


  <section>
    <p>This site is made by Bogdan Palasanu and Radu Tarsa.</p>
    <p>This is a server application that consists in a GAME PLAYING LEARNING MONITOR.</p>
    <p>GaL as it is abbreviated has the power of testing the user in the best way possible.</p>
    <p>In this page you'll see a top 10 users that will make you learn more and more because competion is in your blood.</p>
    <p>All you have to do is to roam this site and see what we have prepared for you.</p>
    <p>GOOD LUCK!!!</p>
  </section>

  <section>
    <p>Top 10 Players</p>
    <form method="post">
        <select name="gameCTypeList">
          <option hidden disabled selected value>game category</option>
          <?php echo $categories;?>
        </select>
        <input type="submit" name="get-top-users" value="Select">
    </form>
    <?php echo $text ?>
  </section>

<!-- ////////////////////////////////////////// -->
  <!-- <xml version="1.0" encoding="UTF-8" ?>
  <rss version="2.0">

  <channel>
    <title>W3Schools Home Page</title>
    <link>https://www.w3schools.com</link>
    <description>Free web building tutorials</description>
    <item>
      <title>RSS Tutorial</title>
      <link>https://www.w3schools.com/xml/xml_rss.asp</link>
      <description>New RSS tutorial on W3Schools</description>
    </item>
    <item>
      <title>XML Tutorial</title>
      <link>https://www.w3schools.com/xml</link>
      <description>New XML tutorial on W3Schools</description>
    </item>
  </channel>

  </rss> -->
<!-- ////////////////////////////////////////// -->


  <br><br><br>
  <footer>
    <p>Bogdan Palasanu & Radu Tarsa, Copyright &copy; 2020</p>
  </footer>

  <script src="scripts/closeDiv.js"></script>
  <script> window.setTimeout("closeErrorDiv();", 2000); </script>

</body>
</html>
