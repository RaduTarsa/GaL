var modal1 = document.getElementById("myLearningModal");
var modal2 = document.getElementById("myTestingModal");
var btn1 = document.getElementById("learingModalButton");
var btn2 = document.getElementById("testingModalButton");
var span1 = document.getElementsByClassName("close1")[0];
var span2 = document.getElementsByClassName("close2")[0];
var openbtn = document.getElementById("openbtn");
var game = document.getElementById("game");

openbtn.onclick = function() {
  game.style.display = "block";
}

btn1.onclick = function() {
  modal1.style.display = "block";
}

btn2.onclick = function() {
  modal2.style.display = "block";
}

span1.onclick = function() {
  modal1.style.display = "none";
}

span2.onclick = function() {
  modal2.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal1 || event.target == modal2) {
    modal1.style.display = "none";
    modal2.style.display = "none";
  }
  if (event.target == openbtn)
  {
    game.style.display = "block";
  }
}
