<?php
require_once("functions-DB.php");

// Récupère les articles avec jeu + jaquette + note moyenne
function getArticles($mysqli, $offset, $limit) {
    $sql = "SELECT 
                a.id_article,
                a.titre AS titre_article,
                j.nom AS nom_jeu,
                j.jaquette,
                a.date_creation,
                a.note_redacteur,
                ROUND(AVG(av.note), 1) AS note_moyenne
            FROM article a
            INNER JOIN jeu j ON a.id_jeu = j.id_jeu
            LEFT JOIN avis av ON av.id_article = a.id_article
            GROUP BY a.id_article
            ORDER BY a.date_creation DESC
            LIMIT $limit OFFSET $offset";

    return readDB($mysqli, $sql);
}

// Compte le total d'articles pour pagination
function countAllArticles($mysqli) {
    $sql = "SELECT COUNT(*) AS total FROM article";
    $result = readDB($mysqli, $sql);
    return $result[0]['total'] ?? 0;
}

// Récupère la moyenne des notes utilisateurs pour un article donné
function getMoyenneAvis($mysqli, $id_article) {
    $sql = "SELECT ROUND(AVG(note), 1) AS moyenne FROM avis WHERE id_article = $id_article";
    $result = readDB($mysqli, $sql);
    return $result[0]['moyenne'] ?? null;
}