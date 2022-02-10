function checkAntwoord() {
    var vraag = document.getElementsByName('array[]');
    var a = (vraag[0].value);
    var b = (vraag[1].value);
    var c = (vraag[2].value);
    var bericht;
    if (a == "Parijs" && b == "8" && c == "IJsselmeer") {
        bericht = "Alle antwoorden zijn correct!";
    } else {
        bericht = "Er zijn foute antwoord(en)";
    }
    document.getElementById("uitslag").innerHTML = bericht;
}


