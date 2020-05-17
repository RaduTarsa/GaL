<?php include('scripts/server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="aici pui descriere">
        <meta name="keywords" content="aici pui keywords">
        <meta name="author" content="Bogdan Palasanu & Radu Tarsa">
        <title>GaL | Login</title>
        <link rel="stylesheet" href="./stylesheets/login.css">
    </head>

<body>
  
  <form action="login.php" method="post">
    <?php include('scripts/errors.php'); ?>
    <div class="container">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username">

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password">

      <button type="submit" name="login_user">Login</button>

      <div class="small_container">
        <b>No account? <a href="register.php">Register</a></b>
      </div>
    </div>

  </form>

  <footer>
    <p>Bogdan Palasanu & Radu Tarsa, Copyright &copy; 2020</p>
  </footer>

</body>
</html>
