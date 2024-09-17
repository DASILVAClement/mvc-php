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

    public function details(){
        //Fait appel au modèle afin de récupérer les données dans la BDD
        $detail = $this->livreDAO->selectDetail();

        //Fait appel à la vue afin de renvoyer la page
        require __DIR__ . '/../../views/livre/details.php';
    }
}