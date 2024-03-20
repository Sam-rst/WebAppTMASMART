<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = (int)$_POST['id'];

    // Supprimer l'article
    deletePost($id);

    // Rediriger vers la page d'accueil
    header("Location: index.php");
    exit;
} else {
    echo "Requête invalide.";
    exit;
}
?>