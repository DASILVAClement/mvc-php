<?php

//Composeur Frontal => Routeur
//Toutes les requêtes des utilisateurs passent par ce fichier

require_once __DIR__ . '/../vendor/autoload.php';

//Chargement des variables d'environnements
$dotEnv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotEnv->load(); //Charger les variables d'environnements de .env dans un tableau $_ENV

//Configurer la connexion à la base de données
$db = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);

//Mise en place du rooting
$route = $_GET['route'] ?? 'accueil';
//Tester la valeur de $route
switch ($route){
    case 'accueil' :
        $accueilController = new \App\Controllers\AccueilController();
        $accueilController->accueil();
        break;
    case 'livre-list' :
        //$livreDAO est une dépendance de LivreControllers
        $livreDAO = new \App\Dao\LivreDAO($db);
        //Injecter la dépendance $livreDAO dans l'objet LivreController
        $livreController = new \App\Controllers\LivreController($livreDAO);
        $livreController->list();
        break;
    case 'details-livre' :
        $id_livre = $_GET['id_livre'] ?? null;
        if ($id_livre) {
            $livreDAO = new \App\Dao\LivreDAO($db);
            $livreController = new \App\Controllers\LivreController($livreDAO);
            $livreController->details($id_livre);
        }else{
            echo "La requête n'est pas valide";
        }
        break;
    case 'creer_livre' :
        $livreDAO = new \App\Dao\LivreDAO($db);
        $livreController = new \App\Controllers\LivreController($livreDAO);
        $livreController->creer_livre();
    default :
        //Erreur 404
        echo "Page non trouvée";
        break;
}

//if ($route === "accueil"){
//    //Créer un objet AccueilController
//    $accueilController = new \App\Controllers\AcceuilController();
//    $accueilController->accueil();
//}else{
//    echo "Page non trouvée";
//}