<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Assainir les entrées
    $id = (int)$_POST['id'];
    $title = sanitizeInput($_POST['title']);
    $content = sanitizeInput($_POST['content']);

    // Vérifier que le titre et le contenu ne sont pas vides
    if (empty($title) || empty($content)) {
        echo "Le titre et le contenu sont requis.";
    } else {
        // Mettre à jour l'article
        editPost($id, $title, $content);

        // Rediriger vers la page d'accueil
        header("Location: index.php");
        exit;
    }
} else {
    echo "Requête invalide.";
    exit;
}

// Réutiliser la fonction sanitizeInput() définie dans save_post.php
