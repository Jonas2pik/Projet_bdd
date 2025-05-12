<nav>
    <ul class="nav-links">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="recherche.php">Recherche</a></li>
        <li><a href="ajouter_article.php">Rédiger un article</a></li>
        <?php if (isset($_SESSION['connected']) && $_SESSION['connected']): ?>
            <li><a href="profil.php">Mon profil</a></li>
            <li><a href="php/logout.php">Déconnexion</a></li>
        <?php else: ?>
            <li><a href="login.php">Connexion</a></li>
            <li><a href="inscription.php">Inscription</a></li>
        <?php endif; ?>
    </ul>
</nav>