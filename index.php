<?php include 'functions.php'; ?>
<?php include 'includes/header.php'; ?>

<body>
<?php include 'includes/nav.php'; ?>
<div class="container">
    <h1>Blog de Basketball</h1>
    <?php
    $posts = getPosts();
    foreach ($posts as $post) {
        echo "<h2><a href='post.php?id=" . $post['id'] . "'>" . $post['title'] . "</a></h2>";
        echo "<p>" . substr($post['content'], 0, 150) . "...</p>";
    }
    ?>
    <a href="add_post.php">Ajouter un article</a>
</div>
</body>
</html>
