<?php
$value = "Welcome To Pokédex";
    echo "<h1 class='headline'>".$value."</h1>";
    ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Pokédex - The PHP Way!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<form action=""  method="GET">
    <label>Name or id of pokemon</label>
    <input type="text" name="name" id="name" placeholder="pokemon name or id"/>
    <button type="submit" id="button" name="button">Search</button>
</form>
<?php
$hiPoke = null ;
$hiPoke = $_GET["name"];

if ($hiPoke != null){
    $getPokeURL = file_get_contents("https://pokeapi.co/api/v2/pokemon/". $hiPoke); // API URL + search
    $pokeAPI = json_decode($getPokeURL, true); //
    echo $pokeAPI["name"] ."<br>";
    echo $pokeAPI["id"] . "<br>";
    echo "<img src=".$pokeAPI["sprites"]["front_default"].">";
    echo $pokeAPI["moves"][0]["move"]["name"] ."<br>";
    $getEvolution = $pokeAPI["species"]["url"];

    $getEvolutionURL = file_get_contents($getEvolution);
    $getPokeEvolve = json_decode($getEvolutionURL, true); //
    $getPokemon = $getPokeEvolve["evolves_from_species"];

    if($getPokemon == null){
        echo "There is no evolution!";
    }else {
        $getPokemon = $getPokeEvolve["evolves_from_species"]["url"];
        $getPokevolution = file_get_contents($getPokemon); // API URL + search
        $pokeAPI = json_decode($getPokevolution, true); //
        echo "This is the last evolution!<br>";
        echo $pokeAPI ["name"] ."<br>";
        echo $pokeAPI ["id"];
    }
}

?>
</body>
</html>