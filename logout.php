<?php
session_start(); // Démarrer la session
session_destroy(); // Détruire toutes les données de session
header("Location: login.php"); // Rediriger vers la page de login
exit;
?>
