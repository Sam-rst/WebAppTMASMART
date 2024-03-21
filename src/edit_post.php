<?php
include 'functions.php';
if (!isset($_GET['id'])) {
    echo "L'article n'est pas spécifié.";
    exit;
}
$post = getPostById($_GET['id']);
if (!$post) {
    echo "L'article demandé n'a pas été trouvé.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Éditer Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include '../includes/nav.php'; ?>
<div class="container">
    <h1>Éditer l'article</h1>
    <form action="update_post.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

        <label for="title">Titre de l'article :</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title'], ENT_QUOTES); ?>" required>

        <label for="content">Contenu :</label>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($post['content'], ENT_QUOTES); ?></textarea>

        <button type="submit">Mettre à jour</button>
    </form>
</div>
</body>
</html>
