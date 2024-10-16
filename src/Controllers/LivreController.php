<?php
namespace App\Controllers;
use Doctrine\ORM\EntityManager;

class LivreController
{
    private EntityManager $entityManager; //Dépendance

    //Lister l'ensemble des livres
    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function list(){
        $livreRepository = $this->entityManager->getRepository(\App\Entity\Livre::class);
        $livres = $livreRepository->findAll();

        //Fait appel à la vue afin de renvoyer la page
        require __DIR__ . '/../../views/livre/list.php';
    }

    public function details(int $id_livre) {
        //Fait appel au modèle afin de récupérer les données dans la BDD
        $livreRepository = $this->entityManager->getRepository(\App\Entity\Livre::class);
        $livres = $livreRepository->find($id_livre);

        if ($livres) {
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