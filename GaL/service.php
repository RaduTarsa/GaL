<?php include('scripts/loginValidation.php') ?>
<?php include('scripts/hideAdmin.php') ?>
<?php include('scripts/service-controller.php') ?>
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
<form method="post">
  <div class="game-selector">
    <label>Select Game</label>
    <select id="Games" name="gameList">
      <!-- <option hidden disabled selected value> select game </option> -->
      <?php echo $options;?>
    </select>
    <!-- <button onclick="document.getElementById('game').style.display='block'">Open</button> -->
    <!-- <input type="button" name="get-game" value="Open" onclick="document.getElementById('game').style.display='block'"/> -->
    <input type="submit" name="get-game" value="Select">
    <input id="openbtn" type="button" value="Open"/>
  </div>
</form>

<div id="game" class="game" style="display:none;">
    <div class="game-learner">
      <button id="learingModalButton">Start Learning</button>
      <div id="myLearningModal" class="modal">
        <div class="modal-content">
          <span class="close1">&times;</span>
            <div class="img-content">
              <?php foreach ($images as $key => $value) { echo '<img src='; echo $images[$key];
              echo ' style="width:100%">'; echo '<p>'; echo $texts[$key]; echo '</p>'; echo '<br>';} ?>
            </div>
        </div>
      </div>
    </div>
    <div class="game-tester">
      <button id="testingModalButton">Start The Test</button>
      <div id="myTestingModal" class="modal">
        <div class="modal-content">
          <!-- <script src="resources/games/1/test.json"></script> -->
          <script src="<?php echo $test; ?>"></script>
          <span class="close2">&times;</span>
              <div>
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
        </div>
      </div>
    </div>
</div>

  <!-- <script src="resources/games/1/test.json"></script> -->
  <script src="scripts/serviceController.js"></script>
  <script src="scripts/quizController.js"></script>

  <footer>
    <p>Bogdan Palasanu & Radu Tarsa, Copyright &copy; 2020</p>
  </footer>

</body>
</html>
