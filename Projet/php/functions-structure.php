<?php


function displayPokedex($pokedex) {
    echo '<div class="pokedex">';

    foreach ($pokedex as $pokemon) {

        $imagepath = "images/pokemon/". intval($pokemon['numero']) . ".png";
        echo '<div class="pokemon-card">';        
        // Image
        echo '<a href="pokemon.php?id=' . urlencode($pokemon['id_pokemon']) . '">';

        echo '<img src="' . htmlspecialchars($imagepath) . '" alt="' . htmlspecialchars($pokemon['nom']) . '">';
        echo '</a><br>';
        // Numéro
        echo '<div class="pokemon-number">#' . htmlspecialchars($pokemon['numero']) . '</div>';
        
        // Nom
        echo '<div class="pokemon-name">' . htmlspecialchars($pokemon['nom']) . '</div>';

        echo '</div>';
    }

    echo '</div>';
}


function displayOnePokemon($pokemon, $types, $images, $attacks, $evolution) {
    echo "<h2>#". str_pad($pokemon['numero'], 3, '0', STR_PAD_LEFT) ." - " . htmlspecialchars($pokemon['nom']) . "</h2>";
    echo "<p>" . htmlspecialchars($pokemon['description']) . "</p>";

    echo "<h4>Types</h4><ul>";
    foreach ($types as $type) {
        echo "<li>" . htmlspecialchars($type['libelle']) . "</li>";
    }
    echo "</ul>";

    echo "<h4>Images</h4>";
    foreach ($images as $img) {
        echo "<img src='" . $img['chemin'] . "' alt='' style='width:100px; margin:10px;'>";
    }

    echo "<h4>Attaques</h4><ul>";
    foreach ($attacks as $atk) {
        echo "<li><strong>" . htmlspecialchars($atk['libelle_capacite']) . "</strong> (" . $atk['puissance_capacite'] . ")<br>" . htmlspecialchars($atk['pp_capacite']) . "</li>";
    }
    echo "</ul>";

    if (!empty($evolution)) {
        echo "<h4>Évolution(s)</h4><ul>";
        foreach ($evolution as $evo) {
            echo "<li><a href='pokemon.php?id=" . $evo['numero'] . "'>" . htmlspecialchars($evo['nom']) . "</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p><em>Ce Pokémon n'a pas d'évolution connue.</em></p>";
    }
}

?>
