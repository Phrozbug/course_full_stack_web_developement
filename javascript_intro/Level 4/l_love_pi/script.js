function berekenOmtrek() {
    const pi = 3.14;
    let diameter = document.getElementById("diameter");
    let omtrek = (diameter.value * pi).toFixed(2);
    let oppervlak = (diameter.value * diameter.value * pi * 0.25).toFixed(2);
    document.getElementById("bericht").innerHTML = ("<b>De omtrek van de cirkel is </b>" + omtrek);
    document.getElementById("bericht2").innerHTML = ("<b>Het oppervlak van de cirkel is </b>" + oppervlak);
}

var myVar = setInterval(mijnTijd, 1000);

function mijnTijd() {
    var dt = new Date();
    document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
}