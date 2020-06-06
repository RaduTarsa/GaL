// json array movement variable
var i = 0;
var correctCount = 0 ;
//initialize the first question
generate(0);
// generate from json array data with index
function generate(index) {
    document.getElementById("question").innerHTML = jsonData[index].q;
    document.getElementById("option1").innerHTML = jsonData[index].opt1;
    document.getElementById("option2").innerHTML = jsonData[index].opt2;
    document.getElementById("option3").innerHTML = jsonData[index].opt3;
}

function checkAnswer() {
    if (document.getElementById("opt1").checked && jsonData[i].opt1 == jsonData[i].answer) {
       correctCount++;
    }
    if (document.getElementById("opt2").checked && jsonData[i].opt2 == jsonData[i].answer) {
        correctCount++;
    }
    if (document.getElementById("opt3").checked && jsonData[i].opt3 == jsonData[i].answer) {
        correctCount++;
    }
    // increment i for next question
    i++;
    if(jsonData.length-1 < i){
        // close test and send points to db
        // alert('You got ' + correctCount + ' points!!!');
        // update the test
        var score = correctCount;
        var formdata = new FormData();
        formdata.append("score",score);
        var xhr = new XMLHttpRequest();
        xhr.open("POST","scripts/scoreUpdater.php",true);
        xhr.send(formdata);

        // window.location="service.php";
    }
    // callback to generate
    generate(i);
}
