<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $titre_livre = $_POST['titre_livre'];
    $nombre_pages_livre = $_POST['nombre_pages_livre'];
    $auteur_livre = $_POST['auteur_livre'];

    //Validation des données
    if (empty($titre_livre)) {
        $erreurs['titre_livre'] = "Le titre est obligatoire";
    }
    if (empty($nombre_pages_livre)) {
        $erreurs['nombre_pages_livre'] = "Le nombre de page est obligatoire";
    }
    if (empty($auteur_livre)) {
        $erreurs['auteur_livre'] = "Le résumé est obligatoire";
    }


    // Traiter les données
    if (empty($erreurs)) {
        creer_livre($titre_livre, $nombre_pages_livre, $auteur_livre);
        header("Location: /index.php");
        exit();
    }
}


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création d'un livre</title>
</head>
<body>
<h1>Création d'un livre</h1>

<form action="" method="post" novalidate>
    <ul>
        <li>
            <label for="titre_livre">Nom du livre&nbsp;:</label>
            <input type="text" id="titre_livre" name="titre_livre" />

            <?php if (isset($erreurs['titre_livre'])) : ?>
                <p><?= $erreurs['titre_livre'] ?></p>
            <?php endif; ?>
        </li>
        <li>
            <label for="nombre_pages_livre">Nombre pages du livre&nbsp;:</label>
            <input type="number" id="nombre_pages_livre" name="nombre_pages_livre" />

            <?php if (isset($erreurs['nombre_pages_livre'])) : ?>
                <p><?= $erreurs['nombre_pages_livre'] ?></p>
            <?php endif; ?>
        </li>
        <li>
            <label for="auteur_livre">Auteur du livre&nbsp;:</label>
            <input type="text" id="auteur_livre" name="auteur_livre" />

            <?php if (isset($erreurs['auteur_livre'])) : ?>
                <p><?= $erreurs['auteur_livre'] ?></p>
            <?php endif; ?>
        </li>
    </ul>

    <div class="button">
        <button type="submit">Envoyer le livre</button>
    </div>

</form>



</body>
</html>