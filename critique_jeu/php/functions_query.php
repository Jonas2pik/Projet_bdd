<?php
require_once("functions-DB.php");

function getArticles($mysqli, $offset, $limit) {
    $sql = "SELECT 
                a.id_article,
                a.titre AS titre_article,
                j.nom AS nom_jeu,
                i.chemin_image AS image,
                er.date_modif AS date_article,
                a.note_redacteur,
                (
                    SELECT ROUND(AVG(av.note), 1)
                    FROM avis av
                    WHERE av.id_jeu = j.id_jeu
                ) AS note_moyenne
            FROM article a
            JOIN jeu j ON a.id_jeu = j.id_jeu
            JOIN est_image ei ON ei.id_article = a.id_article
            JOIN image i ON i.id_image = ei.id_image
            JOIN est_redacteur er ON er.id_article = a.id_article
            WHERE i.est_jaquette = 1
            ORDER BY er.date_modif DESC
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
