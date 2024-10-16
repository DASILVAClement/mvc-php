<?php

//Configuration de l'EntityManager

use Doctrine\DBAL\DriverManager;

require_once __DIR__ . '/../vendor/autoload.php';

//définir l'emplacement des entités
$path = [__DIR__ . '/../src/Entity'];
$isDevMode = true;

//Définir la configuration des entités
$configuration = \Doctrine\ORM\ORMSetup::createAttributeMetadataConfiguration($path, $isDevMode);

//Définir les éléments de connexion à la base de données
$configurationBD = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'db_livres',
    'host' => 'localhost'
];

//Création de la connexion à la base de données
$connexionBD = DriverManager::getConnection($configurationBD, $configuration);

//Créer l'EntityManager
$entityManager = new \Doctrine\ORM\EntityManager($connexionBD, $configuration);
return $entityManager;