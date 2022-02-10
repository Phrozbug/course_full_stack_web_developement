
const toetsVragen = [
    "Wat is de hoofdstad van Frankrijk?",
    "Hoeveel benen heeft een spin?",
    "Wat is het grootste meer van Nederland?",
    "Noem een Duits automerk",
    "Noem een Waddeneiland",
];
const correcteAntwoorden = [
    "Parijs",
    "8",
    "IJsselmeer",
    ["Volkswagen", "Audi", "Opel", "Porsche", "BMW", "Mercedes", "Mercedes-Benz"],
    ["Texel", "Vlieland", "Terschelling", "Ameland", "Schiermonnikoog"],
];

document.getElementById("vraag0").innerHTML = toetsVragen[0];
document.getElementById("vraag1").innerHTML = toetsVragen[1];
document.getElementById("vraag2").innerHTML = toetsVragen[2];
document.getElementById("vraag3").innerHTML = toetsVragen[3];
document.getElementById("vraag4").innerHTML = toetsVragen[4];

function checkAntwoord() {
    let numberCorrect = 0;


    var answer = document.querySelector("#input0").value;
    if (correcteAntwoorden[0] == answer) {
        numberCorrect++;
        document.getElementById("input0").style.backgroundColor = "green";
    } else {
        document.getElementById("input0").style.backgroundColor = "red";
    }

    answer = document.querySelector("#input1").value;
    if (correcteAntwoorden[1] == answer) {
        numberCorrect++;
        document.getElementById("input1").style.backgroundColor = "green";
    } else {
        document.getElementById("input1").style.backgroundColor = "red";
    }

    answer = document.querySelector("#input2").value;
    if (correcteAntwoorden[2] == answer) {
        numberCorrect++;
        document.getElementById("input2").style.backgroundColor = "green";
    } else {
        document.getElementById("input2").style.backgroundColor = "red";
    }

    answer = document.querySelector("#input3").value;
    if (correcteAntwoorden[3].includes(answer) == true) {
        numberCorrect++;
        document.getElementById("input3").style.backgroundColor = "green";
    } else {
        document.getElementById("input3").style.backgroundColor = "red";
    }

    answer = document.querySelector("#input4").value;
    if (correcteAntwoorden[4].includes(answer) == true) {
        numberCorrect++;
        document.getElementById("input4").style.backgroundColor = "green";
    } else {
        document.getElementById("input4").style.backgroundColor = "red";
    }

    var bericht = "Je hebt " + numberCorrect + " punten gescoord.";
    document.getElementById("uitslag").innerHTML = bericht;
}