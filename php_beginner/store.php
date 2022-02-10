<?php
$games = [
	["Call of Duty", "Shooter", 59.95],
	["Rocket League", "Sport", 19.95],
	["Assassins Creed", "RP", 49.95]
];



$teller = 0;
$titel_lengte = 0;
$prijs = array_sum(array_column($games, 2));
foreach ($games as $key => $values) {
	$titel_lengte = $titel_lengte + strlen($games[$key][0]);
	$teller++;
}
// Gemiddelde prijs 
$b = $prijs / $teller;
echo "Gemiddelde prijs: €" . number_format($b, 2) . PHP_EOL;

// Gemiddelde lengte titel
$c = $titel_lengte / $teller;
echo "Gemiddelde lengte van titel: " . (round($c)) . " karakters" . PHP_EOL;
?>