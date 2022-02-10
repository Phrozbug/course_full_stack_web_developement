function myBackground() {
    var theInput = document.getElementById("achtergrondKleur");
    document.body.style.backgroundColor = theInput.value;
}

function myTitle() {
    var theInput = document.getElementById("achtergrondKleur");
    var x;
    var i;
    x = document.querySelectorAll(".titel");
    for (i = 0; i < x.length; i++) {
        x[i].style.color = theInput.value;
    }
}
function myBeide() {
    var theInput = document.getElementById("achtergrondKleur");
    document.body.style.backgroundColor = theInput.value;
    var x;
    var i;
    x = document.querySelectorAll(".titel");
    for (i = 0; i < x.length; i++) {
        x[i].style.color = theInput.value;
    }
}