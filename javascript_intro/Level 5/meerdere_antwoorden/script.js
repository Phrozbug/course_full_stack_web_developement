function checkAntwoord() {
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
    if (j == 5) {
        bericht = "Alle antwoorden zijn correct!";
    } else {
        bericht = "Er zijn foute antwoord(en)";
    }
    document.getElementById("uitslag").innerHTML = bericht;
}