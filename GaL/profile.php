<?php include('scripts/validation.php') ?>
<?php include('scripts/profile-controller.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="aici pui descriere">
        <meta name="keywords" content="aici pui keywords">
        <meta name="author" content="Bogdan Palasanu & Radu Tarsa">
        <title>GaL | Profile</title>
        <link rel="stylesheet" href="./stylesheets/profile.css">
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
            	<a href="profile.php?logout='1'" style="color: red;">LOGOUT</a>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <section class="profile-info">
      <img class="user-img" src=<?php echo $_SESSION['imagepath'] ?> alt="profile picture" width="200px" height="200px">
      <!-- TO DO: user-badge -->
      <h3><img class="user-badge"src="resources/userbadge.png" alt="user badge" width="42px" height="42px">
          <?php echo $_SESSION['firstname'];?>
          <?php echo $_SESSION['lastname'];?>
      </h3>
  </section>

  <hr>

  <div class="profile-editor">
    <h4>Edit your profile:</h4>
    <form method="post" enctype="multipart/form-data">
      <label>Select Image</label>
      <input type="file" name="image" id="choose">
      <input type="submit" name="upload-image" value="Upload image">
    </form>
    <form method="post">
      <label>Edit First Name</label>
      <input type="text" placeholder="Enter your new first name" name="fname">
      <input type="submit" name="editfname" value="Edit">
    </form>
    <form method="post">
      <label>Edit Last Name</label>
      <input type="text" placeholder="Enter your new last name" name="lname">
      <input type="submit" name="editlname" value="Edit">
    </form>
  </div>


  <!-- TO DO: DEACTIVATE ACCOUNT BUTTON -->
  <footer>
    <p>Bogdan Palasanu & Radu Tarsa, Copyright &copy; 2020</p>
  </footer>

</body>
</html>
