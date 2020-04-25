<?php include('scripts/validation.php') ?>
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

  <section class="description">
    <h1>scris scris scris...</h1>
  </section>

  <footer>
    <p>Bogdan Palasanu & Radu Tarsa, Copyright &copy; 2020</p>
  </footer>

  <script src="scripts/closeDiv.js"></script>
  <script> window.setTimeout("closeErrorDiv();", 2000); </script>

</body>
</html>
