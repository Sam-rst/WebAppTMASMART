<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Blog de Basketball</title>
    <script>
        function confirmDelete(postId) {
            const isConfirmed = confirm("Êtes-vous sûr de vouloir supprimer cet article ?");
            if (isConfirmed) {
                // Création d'un formulaire pour envoyer la demande de suppression
                var form = document.createElement('form');
                document.body.appendChild(form);
                form.method = 'post';
                form.action = 'delete_post.php';
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'id';
                input.value = postId;
                form.appendChild(input);
                form.submit();
            }
        }
    </script>
</head>