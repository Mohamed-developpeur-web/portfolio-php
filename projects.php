<?php
// Connexion à la base de données
// Assure-toi que db.php contient bien la variable $pdo (connexion PDO à MySQL)
include("db.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Projets</title>
    <link rel="stylesheet" href="style.css"> <!-- Feuille de style -->
</head>
<body>
    <!-- En-tête -->
    <header>
        <h1>Mes Projets</h1>
        <p>Voici une sélection de mes réalisations en développement web, mobile et infographie.</p>
    </header>

    <!-- Navigation -->
    <nav>
        <a href="index.php">Accueil</a>
        <a href="projects.php">Projets</a>
        <a href="contact.php">Contact</a>
        <a href="login.php">Admin</a>
    </nav>

    <!-- Conteneur global -->
    <div class="container">
        <div class="projects">
            <?php
            // 1️⃣ Récupération des projets depuis la table "projects"
            $stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC");

            // 2️⃣ Boucle sur chaque projet
            while($p = $stmt->fetch()){
                echo "<div class='card'>";

                // 🔹 Titre et description du projet
                echo "<h2>".$p['title']."</h2>";
                echo "<p>".$p['description']."</p>";

                // 🔹 Récupération des images liées au projet (table project_images)
                $images = $pdo->prepare("SELECT image FROM project_images WHERE project_id = ?");
                $images->execute([$p['id']]);
                foreach($images as $img){
                    // Affichage des images (dossier "images/")
                    echo "<img src='images/".$img['image']."' alt='".$p['title']."' style='width:100%;margin-top:10px;'>";
                }

                // 🔹 Affichage de la vidéo (locale ou externe)
                if(!empty($p['video_url'])){
                    if(strpos($p['video_url'], 'http') !== false){
                        // Cas 1 : Vidéo externe (YouTube/Vimeo)
                        echo "<iframe width='100%' height='315' src='".$p['video_url']."' frameborder='0' allowfullscreen></iframe>";
                    } else {
                        // Cas 2 : Vidéo locale (dans dossier "videos/")
                        echo "<video width='100%' height='315' controls>
                                <source src='".$p['video_url']."' type='video/mp4'>
                                Votre navigateur ne supporte pas la vidéo.
                              </video>";
                    }
                }

                echo "</div>"; // fin de la carte projet
            }
            ?>
        </div>
    </div>

    <!-- Pied de page -->
    <footer>
        © 2026 - Mon Portfolio
    </footer>
</body>
</html>
