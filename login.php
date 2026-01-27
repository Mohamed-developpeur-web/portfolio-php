<?php
session_start();
include("db.php");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier si l'utilisateur existe
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    // Vérification du mot de passe haché
    if($admin && password_verify($password, $admin['password'])){
        $_SESSION['admin'] = $admin['username']; // Stocker l'admin en session
        header("Location: admin.php"); // Rediriger vers admin
        exit;
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
</head>
<body>
    <h1>Connexion Admin</h1>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>Nom d’utilisateur :</label>
        <input type="text" name="username" required><br>

        <label>Mot de passe :</label>
        <input type="password" name="password" required><br>

        <button type="submit" name="login">Se connecter</button>
    </form>
</body>
</html>
