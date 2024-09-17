<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details Livre</title>
</head>
<body>
<h1>Liste des détails</h1>
<ul>

    <?php foreach ($details as $detail) : ?>
        <li><?= $detail->getTitre() ?></li>
    <?php endforeach;?>

</ul>
<a href="index.php">Accueil</a>
</body>
</html>