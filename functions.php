<?php
// Charge les articles du fichier JSON
function getPosts() {
    $jsonData = file_get_contents(__DIR__ . '/data/posts.json');
    return json_decode($jsonData, true);
}

// Récupère un article par son ID
function getPostById($id) {
    $posts = getPosts();
    foreach ($posts as $post) {
        if ($post['id'] == $id) {
            return $post;
        }
    }
    return null;
}

// Valide les données du formulaire de contact
function validateContactForm($data) {
    // Exemple de validation simple
    return isset($data['email']) && filter_var($data['email'], FILTER_VALIDATE_EMAIL) &&
        isset($data['message']) && !empty($data['message']);
}

// Nettoie l'entrée pour éviter les injections SQL/XSS
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags($input));
}

// Ajoute un nouvel article au blog
function addPost($title, $content) {
    $posts = getPosts();
    $newId = max(array_column($posts, 'id')) + 1; // Trouver l'ID le plus élevé et ajouter 1
    $posts[] = ['id' => $newId, 'title' => $title, 'content' => $content];
    file_put_contents(__DIR__ . '/data/posts.json', json_encode($posts, JSON_PRETTY_PRINT));
}

// Édite un article existant dans le blog
function editPost($id, $title, $content) {
    $posts = getPosts();
    foreach ($posts as &$post) {
        if ($post['id'] == $id) {
            $post['title'] = $title;
            $post['content'] = $content;
            file_put_contents(__DIR__ . '/data/posts.json', json_encode($posts, JSON_PRETTY_PRINT));
            break;
        }
    }
}

// Supprime un article du blog par son identifiant
function deletePost($id) {
    $posts = getPosts();
    foreach ($posts as $i => $post) {
        if ($post['id'] == $id) {
            array_splice($posts, $i, 1);
            file_put_contents(__DIR__ . '/data/posts.json', json_encode($posts));
            return;
        }
    }
}
?>
