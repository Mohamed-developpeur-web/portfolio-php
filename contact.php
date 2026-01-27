<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Ici tu pourrais envoyer un mail ou stocker dans une base de données
    echo "<p>Merci $name, ton message a été envoyé !</p>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
</head>
<body>
    <h1>Contactez-moi</h1>
    <form method="POST" action="">
        <label>Nom :</label>
        <input type="text" name="name" required><br>

        <label>Email :</label>
        <input type="email" name="email" required><br>

        <label>Message :</label>
        <textarea name="message" required></textarea><br>

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
