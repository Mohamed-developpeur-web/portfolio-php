<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Bonjour <?php echo $_SESSION['admin']; ?>, vous êtes connecté ✅</h1>
    </header>
    <nav>
        <a href="projects.php">Voir les projets</a>
        <a href="logout.php" class="logout">Déconnexion</a>
    </nav>

    <div class="admin-content">
        <h2>Ajouter un projet</h2>
        <!-- Ton formulaire d’ajout de projet ici -->
    </div>
</body>
</html>
