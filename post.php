<?php
include 'functions.php';
$post = null;
if (isset($_GET['id'])) {
    $post = getPostById($_GET['id']);
}
?>
<?php include 'includes/header.php'; ?>
<body>
<?php include 'includes/nav.php'; ?>
<div class="container">
    <?php if ($post): ?>
        <h1><?php echo $post['title']; ?></h1>
        <p><?php echo $post['content']; ?></p>
        <a href="edit_post.php?id=<?php echo $post['id']; ?>">Éditer</a> |
        <a href="#" onclick="confirmDelete(<?php echo $post['id']; ?>)">Supprimer</a>
    <?php else: ?>
        <p>Article non trouvé.</p>
    <?php endif; ?>
</div>
</body>
</html>
