<?php
// Démarrer la session
session_start();

// Vérifier si l'admin est connecté
if(!isset($_SESSION['admin'])){
    // Si non connecté, rediriger vers la page de login
    header("Location: login.php");
    exit;
}
?>

<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Ajouter Projet</title>
</head>
<body>
    <h1>Ajouter un projet</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Titre :</label>
        <input type="text" name="title" required><br>

        <label>Description :</label>
        <textarea name="description" required></textarea><br>

        <label>Image :</label>
        <input type="file" name="image"><br>

        <button type="submit" name="submit">Ajouter</button>
    </form>

    <?php
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $desc = $_POST['description'];

        // Upload image
        $img = null;
        if(!empty($_FILES['image']['name'])){
            $img = basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], "images/".$img);
        }

        $stmt = $pdo->prepare("INSERT INTO projects (title, description, image) VALUES (?, ?, ?)");
        $stmt->execute([$title, $desc, $img]);

        echo "<p>Projet ajouté avec succès !</p>";
    }
    <a href="delete.php?id=<?= $p['id'] ?>">Supprimer</a>
    ?>
    
</body>
</html>
