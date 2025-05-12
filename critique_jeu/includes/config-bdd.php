<?php
//Paramètres de connexion à la base de données
define('SERVEUR', 'localhost');         //hote
define('USER', 'root');                 //login, par exemple "root" ou ""
define('PWD', 'root');                  //mot de passe, par exemple "root" ou ""
define('DB_NAME', 'critique_jeu'); //nom de la base de données


function connectionDB() {
    $mysqli = mysqli_connect(SERVEUR, USER, PWD, DB_NAME);
    if (!$mysqli) {
        die("Erreur de connexion à la base de données : " . mysqli_connect_error());
    }
    return $mysqli;
}
?>