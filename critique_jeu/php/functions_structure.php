<?php

// Affiche la liste des articles avec image, titre, jeu, notes
function displayArticles($articles) {
    if (empty($articles)) {
        echo "<p>Aucun article disponible pour le moment.</p>";
        return;
    }

    echo '<div class="articles-list">';

    foreach ($articles as $article) {
        $id = $article['id_article'];
        $titre = $article['titre_article'];
        $nom_jeu = $article['nom_jeu'];
        $image = $article['image'];
        $note_redacteur = $article['note_redacteur'];
        $note_moyenne = isset($article['note_moyenne']) ? $article['note_moyenne'] : 'N/A';
        $date = date("d/m/Y", strtotime($article['date_article']));
        echo "<p><strong>Date :</strong> $date</p>";
        echo "
        <div class='article-card'>
            <a href='article.php?id=$id'>
                <img src='$image' alt='Jaquette de $nom_jeu' class='jaquette'>
                <div class='article-info'>
                    <h2>$titre</h2>
                    <p><strong>Jeu :</strong> $nom_jeu</p>
                    <p><strong>Date :</strong> $date</p>
                    <p><strong>Note du rédacteur :</strong> $note_redacteur / 10</p>
                    <p><strong>Note des joueurs :</strong> $note_moyenne / 10</p>
                </div>
            </a>
        </div>
        ";
    }

    echo '</div>';
}
?>
