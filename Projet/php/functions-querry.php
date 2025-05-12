<?php
require_once("./includes/config-bdd.php");
require_once("./includes/constantes.php");

function getPokedex($mysqli) {
    $sql = "SELECT pokemon.id_pokemon, numero, nom, chemin 
            FROM pokemon 
            INNER JOIN image ON image.id_pokemon = pokemon.id_pokemon
            WHERE chemin LIKE 'images/pokemon/%'
            ORDER BY id_pokemon ASC";
    $resultats = readDB($mysqli, $sql);
    return $resultats;
}

function getPokemonDetails($mysqli, $idPokemon) {
    //1. Nom, numéro et description
    $sql = "SELECT id_pokemon, numero, nom, description 
            FROM pokemon 
            WHERE id_pokemon = " . $idPokemon;
    return readDB($mysqli, $sql);
}

function getPokemonType($mysqli, $idPokemon) {
        
    $sqlTypes = "SELECT t.libelle From type t
                 JOIN esttype et ON t.id_type = et.id_type 
                 JOIN pokemon p ON et.id_pokemon = p.id_pokemon
                 WHERE p.id_pokemon = " . $idPokemon;
    return readDB($mysqli, $sqlTypes);
}

function getPokemonImages($mysqli, $idPokemon) {
    $sqlImages = "SELECT chemin 
                 FROM image 
                 WHERE id_pokemon = " . $idPokemon . " 
                 AND chemin LIKE 'images/pokemon/%'";
    return readDB($mysqli, $sqlImages);
}

function getPokemonAttaques($mysqli, $idPokemon) {
    $sqlAttaques = "SELECT a.nom, a.description 
                    FROM capacite a
                    INNER JOIN lance la ON la.id_attaque = a.id_attaque
                    WHERE la.id_pokemon = " . $idPokemon;
    return readDB($mysqli, $sqlAttaques);
}

function getPokemonEvolution($mysqli, $idPokemon) {
    $sqlEvolution = "SELECT id_pokemon_evolution 
                     FROM evolve 
                     WHERE id_pokemon = " . $idPokemon;
    return readDB($mysqli, $sqlEvolution);
}
?>