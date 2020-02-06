<?php
$value = "Welcome To Pokédex";
    echo "<h1 class='headline'>".$value."</h1>";

$hiPoke = null ;
$hiPoke = $_GET["name"];
$getPokemon ;
if ($hiPoke != null){
    $getPokeURL = file_get_contents("https://pokeapi.co/api/v2/pokemon/". strtolower($hiPoke)); // API URL + search
    $pokeAPI = json_decode($getPokeURL, true); //
    $getEvolution = $pokeAPI["species"]["url"];

    $getEvolutionURL = file_get_contents($getEvolution);
    $getPokeEvolve = json_decode($getEvolutionURL, true); //
    $getPokemon = $getPokeEvolve["evolves_from_species"];

    if($getPokemon == null){
        $getPokemon= "There is no evolution!";
    }else {
        $getPokemon = $getPokeEvolve["evolves_from_species"]["url"];
        $getPokevolution = file_get_contents($getPokemon); // API URL + search
        $pokemonAPI = json_decode($getPokevolution, true); //"This is the last evolution!<br>";
        $getPokemon = $pokemonAPI ["name"] ." <br>This is the last evolution!<br>";
        //echo $pokemonAPI ["id"];

    }
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Pokédex - The PHP Way!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
<form action=""  method="GET">
    <label>Name or id of pokemon</label>
    <input type="text" name="name" id="name" placeholder="pokemon name or id"/>
    <button type="submit" id="button" name="button">Search</button>
</form>

<div id="pokedex">
    <div id="left">
        <div id="logo"></div>
        <div id="bg_curve1_left"></div>
        <div id="bg_curve2_left"></div>
        <div id="curve1_left">
            <div id="buttonGlass">
                <div id="reflect"> </div>
            </div>
            <div id="miniButtonGlass1"></div>
            <div id="miniButtonGlass2"></div>
            <div id="miniButtonGlass3"></div>
        </div>
        <div id="curve2_left">
            <div id="junction">
                <div id="junction1"></div>
                <div id="junction2"></div>
            </div>
        </div>
        <div id="screen">
            <div id="topPicture">
                <div id="buttontopPicture2"></div>
            </div>
            <div id="picture">
                 <?php echo "<img src=".$pokeAPI["sprites"]["front_default"]."> "?>
            </div>
            <div id="buttonbottomPicture"></div>
            <div id="speakers">
                <div class="sp"></div>
                <div class="sp"></div>
                <div class="sp"></div>
                <div class="sp"></div>
            </div>
        </div>
        <div id="bigbluebutton"></div>
        <div id="barbutton1"></div>
        <div id="barbutton2"></div>
        <div id="cross">
            <div id="leftcross">
                <div id="leftT"></div>
            </div>
            <div id="topcross">
                <div id="upT"></div>
            </div>
            <div id="rightcross">
                <div id="rightT"></div>
            </div>
            <div id="midcross">
                <div id="midCircle"></div>
            </div>
            <div id="botcross">
                <div id="downT"></div>
            </div>
        </div>
    </div>
    <div id="right">
        <div id="stats">
            <strong>Name:</strong> <?php echo $pokeAPI["name"];?>  <br/>
            <strong>id:</strong> <?php echo $pokeAPI["id"];?> <br/>
            <strong>Move:</strong> <?php echo $pokeAPI["moves"][0]["move"]["name"];?><br/>
            <strong>Evolution:</strong> <?php echo $getPokemon?>🤗<br/>
        </div>
        <div id="blueButtons1">
            <div class="blueButton"></div>
            <div class="blueButton"></div>
            <div class="blueButton"></div>
            <div class="blueButton"></div>
            <div class="blueButton"></div>
        </div>

        <div id="miniButtonGlass4"></div>
        <div id="miniButtonGlass5"></div>
        <div id="barbutton3"></div>
        <div id="barbutton4"></div>
        <div id="bg_curve1_right"></div>
        <div id="bg_curve2_right"></div>
        <div id="curve1_right"></div>
        <div id="curve2_right"></div>
    </div>
</div>
</body>
</html>