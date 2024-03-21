<?php
include 'functions.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assainir les entrées
    $title = sanitizeInput($_POST['title']);
    $content = sanitizeInput($_POST['content']);

    // Valider les données (Exemple basique)
    if (empty($title) || empty($content)) {
        echo "Le titre et le contenu sont requis.";
    } else {
        // Ajouter l'article
        addPost($title, $content);

        // Rediriger vers la page d'accueil
        header("Location: index.php");
        exit;
    }
} else {
    // Rediriger vers le formulaire d'ajout si la méthode n'est pas POST
    header("Location: add_post.php");
    exit;
}

// Fonction pour assainir les entrées utilisateur
/*function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}*/
