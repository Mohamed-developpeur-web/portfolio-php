<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Projets</title>
</head>
<body>
    <h1>Mes Projets</h1>
    <div class="projects">
        <?php
        $stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC");
        while($p = $stmt->fetch()){
            echo "<div class='card'>";
            echo "<img src='images/".$p['image']."' alt='".$p['title']."'>";
            echo "<h2>".$p['title']."</h2>";
            echo "<p>".$p['description']."</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
