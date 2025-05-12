<?php
//affichage des erreurs côté PHP et côté MYSQLI
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//Import du site - A completer
require_once("./includes/constantes.php");      //constantes du site
require_once("./php/functions-DB.php"); //configuration de la base de données
require_once("./php/functions-querry.php"); //requêtes SQL
require_once("./php/functions-structure.php"); //fonctions HTML

$mysqli = connectionDB(); //connexion à la base de données

/*
$sql = "SELECT numero, nom FROM pokemon";
$resultats = readDB($mysqli, $sql);

echo "<pre>";
print_r($resultats);
echo "</pre>";

foreach ($resultats as $ligne) {
    echo "Numéro : " . $ligne["numero"] . " - Nom : " . $ligne["nom"] . "<br>";}
*/

?>
<!DOCTYPE html>
<html lang='fr'>
<?php include ("static/head.php"); ?>
<body>
    
<?php include ("static/header.php"); ?>
<?php include ("static/nav.php"); ?>
<main>
<?php $pokedex = getpokedex($mysqli);
displayPokedex($pokedex); 
?>
</main>



<?php include ("static/footer.php"); ?>

</body>
<?php closeDB($mysqli); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</html>
