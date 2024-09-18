<?php

namespace App\Controllers;

use App\Dao\LivreDAO;


class LivreController
{
    private LivreDAO $livreDAO; //Dépendance


    public function __construct(LivreDAO $dao)
    {
        $this->livreDAO = $dao;
    }

    //Lister l'ensemble des livres
    public function list(){
        //Fait appel au modèle afin de récupérer les données dans la BDD
        $livres = $this->livreDAO->selectAll();

        //Fait appel à la vue afin de renvoyer la page
        require __DIR__ . '/../../views/livre/list.php';
    }

    public function details(int $id_livre) {
        //Fait appel au modèle afin de récupérer les données dans la BDD
        $livre = $this->livreDAO->selectDetail($id_livre);
        if ($livre) {
            require __DIR__ . '/../../views/livre/details.php';
        }else{
            //header("HTTP/1.0 404 Not Found");
            echo "Livre non trouvé";
        }
    }

    public function creer_livre() {

        require __DIR__ . '/../../views/livre/formulaire_creation.php';
    }

}