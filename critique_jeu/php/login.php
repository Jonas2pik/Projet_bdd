<?php
session_start();
require_once(__DIR__ . '/functions-DB.php');
require_once(__DIR__ . '/functions_query.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    $mysqli = connectionDB();
    $dresseur = checkDresseur($mysqli, $login, $password);
    closeDB($mysqli);

    if (empty($dresseur)) {
        header("Location: ../connection.php?error=1");
        exit();
    } else {
        $_SESSION['connected'] = true;
        $_SESSION['id_dresseur'] = $dresseur['id_dresseur'];
        $_SESSION['login'] = $dresseur['nom_dresseur'];
        header("Location: ../index.php");
        exit();
    }
} else {
    header("Location: ../connection.php");
    exit();
}