const requestUrl = 'https://mdn.github.io/learning-area/javascript/oojs/json/superheroes.json';

function requestJSON(url) {
    let request = new XMLHttpRequest();
    request.open('GET', url);
    request.send();
    request.onload = function () {
        let response = request.response;
        processResponse(response);
    }
}

function sendRequest() {
    requestJSON(requestUrl);
}

function processResponse(response) {
    // TODO schrijf hier je code
    var antwoord = JSON.parse(response);
    console.log(response);
    var squadName = antwoord.squadName;
    document.getElementById("squadName").innerHTML = squadName;
    var homeTown = antwoord.homeTown;
    document.getElementById("homeTown").innerHTML = homeTown;
    var formed = antwoord.formed;
    document.getElementById("formed").innerHTML = formed;
    var secretBase = antwoord.secretBase;
    document.getElementById("secretBase").innerHTML = secretBase;
    var active = antwoord.active;
    document.getElementById("active").innerHTML = active;
    var j = antwoord.members.length;
    for (let i = 0; i < j; i++) {
        var naam = antwoord.members[i].name;
        var leeftijd = antwoord.members[i].age;
        var geheimid = antwoord.members[i].secretIdentity;
        var krachten = antwoord.members[i].powers;
        var table = document.getElementById("member-table");
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        cell1.innerHTML = naam;
        cell2.innerHTML = leeftijd;
        cell3.innerHTML = geheimid;
        cell4.innerHTML = krachten;
    }
}
sendRequest();