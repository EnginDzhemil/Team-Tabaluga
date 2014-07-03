var count = 200000000;

function rollDice() {
    count++;
    document.getElementById("water").style.visibility = "hidden";
    document.getElementById("win").style.visibility = "hidden";

    var die1 = document.getElementById("die1");
    var die2 = document.getElementById("die2");
    var status = document.getElementById("status");
    var student = document.getElementById("student");

    var d1 = Math.floor(Math.random() * 6) + 1;
    var d2 = Math.floor(Math.random() * 6) + 1;
    var diceTotal = d1 + d2;
    die1.innerHTML = d1;
    die2.innerHTML = d2;
    status.innerHTML = ""
    student.innerHTML = count;
    if (d1 == d2) {
        status.innerHTML += " DOUBLES! YEAH! You got Free Education!"
        document.getElementById("win").style.visibility = "visible";
    }
    else {
        document.getElementById("water").style.visibility = "visible";
        status.innerHTML = "DAMN! I don't have Double! "
    }
}