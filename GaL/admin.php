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
        <title>GaL | Service</title>
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

<div class="test-delete">
  <form method="post">
    <label>Delete Test</label>
    <select id="Tests" name="testList">
      <option hidden disabled selected value> -- select test -- </option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <!-- <php while ($row = $res->fetch_assoc()) { echo '<option value=" '.$row['id'].' "> '.$row['username'].' </option>'; }?> -->
    </select>
    <input type="submit" name="delete-test" value="Delete">
  </form>
</div>

<div class="test-add">
  <form method="post">
    <label>Add Test</label>
    <input type="submit" name="add-test" value="Add Test">
  </form>
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

</body>
</html>
