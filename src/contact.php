<?php include '../includes/header.php'; ?>
<body>
<?php include '../includes/nav.php'; ?>
<div class="container">
    <h1>Contactez-nous</h1>
    <form action="" method="POST">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <label for="message">Message :</label>
        <textarea id="message" name="message" required></textarea>
        <button type="submit">Envoyer</button>
    </form>
</div>
</body>
</html>
