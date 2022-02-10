
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
    var vraag = document.getElementsByName('array[]');
    var i = 0;
    var j = 0;
    var bericht;
    toetsVragen.forEach(goed);
    function goed() {
        if (correcteAntwoorden[i].includes(vraag[i].value)) {
            j++;
        }
        i++;
    }
    bericht = "Je hebt " + j + " punten gescoord.";
    document.getElementById("uitslag").innerHTML = bericht;
}