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
            <a href="./admin.php">ADMIN</a>
            <a href="./profile.php">PROFILE</a>
            <?php  if (isset($_SESSION['username'])) : ?>
            	<a href="admin.php?logout='1'" style="color: red;">LOGOUT</a>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit">Delete</button>
    </form>
  </div>

  <select id="Tests" name="testList">
    <option value="volvo">Test1</option>
    <option value="saab">Test2</option>
    <option value="fiat">Test3</option>
    <option value="audi">Test4</option>
 </select>
<button type="submit" class="deleteButton">Delete</button>

<p></p>

<button type="submit" class="addButton">Add Test</button>

  <footer>
    <p>Bogdan Palasanu & Radu Tarsa, Copyright &copy; 2020</p>
  </footer>

</body>
</html>
