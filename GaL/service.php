<?php include('scripts/validation.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="aici pui descriere">
        <meta name="keywords" content="aici pui keywords">
        <meta name="author" content="Bogdan Palasanu & Radu Tarsa">
        <title>GaL | Service</title>
        <link rel="stylesheet" href="./stylesheets/service.css">
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
            	<a href="service.php?logout='1'" style="color: red;">LOGOUT</a>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <section class="description">
    <h1>Aceasta este o descriere a site-ului.</h1>
  </section>

  <footer>
    <p>Bogdan Palasanu & Radu Tarsa, Copyright &copy; 2020</p>
  </footer>

</body>
</html>
