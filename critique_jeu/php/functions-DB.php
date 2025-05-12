<?php

require_once(__DIR__ . '/../includes/constantes.php');
require_once(__DIR__ . "/../includes/config-bdd.php");
#connexion à la base de données en MySQLi (base de données SQL)


#ferme la connexion à la base de données
function closeDB($mysqli)
{
	mysqli_close($mysqli);
}

#lecture de la base de données en fonction d'une requête SQL passée en paramètre d'entrée
#retourne un tableau associatif contenant les résultats de la requête
#à utiliser pour les requêtes de type SELECT
function readDB($mysqli, $sql_input)
{
	//exécution de la requête $sql_input et récupération du résultat de type mysqli_result

	//vérification de la requête : 
		//si la requête est incorrect ou le nombre de ligne retourné égal à 0,
		//on retourne un tableau vide

	//Sinon, on retourne un tableau associatif
	$result = mysqli_query($mysqli, $sql_input);

    if (!$result || mysqli_num_rows($result) === 0) {
        return []; // retourne un tableau vide si aucune donnée
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data; // retourne un tableau associatif

}

#ecrit/modifie la base de données grâce à la requête SQL passée en paramètre d'entrée
#à utiliser pour les requêtes de type INSERT INTO, UPDATE, DELETE
function writeDB($mysqli, $sql_input)
{
	//exécution de la requête $sql_input

	//retourne le résultat de la requête
	return mysqli_query($mysqli, $sql_input); // retourne true ou false

}

?>

