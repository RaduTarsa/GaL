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

<form method="post">
    <h4>Choose Game Type</h4>
    <select name="gamePTypeList">
      <option hidden disabled selected value>game purpose</option>
      <?php echo $purposes;?>
    </select>
    <select name="gameCTypeList">
      <option hidden disabled selected value>game category</option>
      <?php echo $categories;?>
    </select>
    <input type="submit" name="get-games" value="Select">
</form>

<div>
    <form method="post">
      <div class="game-selector">
        <h4>Select Game</h4>
        <select id="Games" name="gameList">
          <option hidden disabled selected value> select game </option>
          <?php echo $options;?>
        </select>
        <input type="submit" name="get-game" value="Select">
        <?php  if(isset($_POST['gameList'])) : ?>
          <input id="openbtn" type="button" value="Open"/>
        <?php endif ?>
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
          <button id="testingModalButton">Start Test</button>
          <div id="myTestingModal" class="modal">
            <div class="modal-content">
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
</div>

  <script src="scripts/serviceController.js"></script>
  <script src="scripts/quizController.js"></script>

  <br><br><br>
  <footer>
    <p>Bogdan Palasanu & Radu Tarsa, Copyright &copy; 2020</p>
  </footer>

</body>
</html>
