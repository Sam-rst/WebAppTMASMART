<?php include 'functions.php'; ?>
<?php include 'includes/header.php'; ?>
<body>
<?php include 'includes/nav.php'; ?>
<div class="container">
    <h1>Ajouter un nouvel article</h1>
    <form action="save_post.php" method="POST">
        <label for="title">Titre de l'article :</label>
        <input type="text" id="title" name="title" required>

        <label for="content">Contenu :</label>
        <textarea id="content" name="content" required></textarea>

        <button type="submit">Publier</button>
    </form>
</div>
</body>
</html>
