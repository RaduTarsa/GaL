<?php include('scripts/loginValidation.php') ?>
<?php include('scripts/hideAdmin.php') ?>
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
            <?php if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1) : ?>
              <a href="./admin.php">ADMIN</a>
            <?php endif ?>
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

  <br>

<!-- use a select to select a game, a button to start the learn/test phase -->
  <button onclick="document.getElementById('id01').style.display='block'">Open Modal</button>
  <div id='id01' class="quizPanel" style="display:none;">
      <div style="font-size:20pt;">Quiz</div>
       <div class="question" id="question">
       </div>
       <div>
         <input type="radio" id="opt1" name="options">
         <span id="option1"></span>
      </div>
      <div>
        <input type="radio" id="opt2" name="options">
        <span id="option2"></span>
      </div>
      <div>
        <input type="radio" id="opt3" name="options">
        <span id="option3"></span>
      </div>
      <div>
        <button class="nextButton" onclick="checkAnswer()">next ></button>
      </div>
  </div>
  <script src="resources/games/1/test.json"></script>
  <?php include('scripts/quizController.php') ?>

  <footer>
    <p>Bogdan Palasanu & Radu Tarsa, Copyright &copy; 2020</p>
  </footer>

</body>
</html>
