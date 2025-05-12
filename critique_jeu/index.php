<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once("./includes/constantes.php");
require_once("./includes/config-bdd.php");
require_once("./php/functions-DB.php");
require_once("./php/functions_query.php");
require_once("./php/functions_structure.php");

$mysqli = connectionDB();

// Pagination
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit = 5;
$offset = ($page - 1) * $limit;

$articles = getArticles($mysqli, $offset, $limit);
$total_articles = countAllArticles($mysqli);
$total_pages = ceil($total_articles / $limit);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critiques de jeux vidéo</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php include("static/header.php"); ?>
<?php include("static/nav.php"); ?>

<main class="container">
    <h1>Dernières critiques</h1>
    <?php displayArticles($articles); ?>
    
    <!-- Pagination -->
    <nav class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>">Page <?= $i ?></a>
        <?php endfor; ?>
    </nav>
</main>

<?php include("static/footer.php"); ?>
</body>
</html>