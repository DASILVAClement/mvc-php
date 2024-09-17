<?php

namespace App\Dao;

use App\Entity\Livre;

class LivreDAO
{
    private \PDO $db;


    //Renvoyer la requête "SELECT * FROM LIVRE"
    //Retourner les enregistrements sous la forme d'un tableau d'objets de la classe Livre
    /**
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function selectAll() : array {
        $requete = $this->db->query("SELECT * FROM livre");
        $livresBD = $requete->fetchAll(\PDO::FETCH_ASSOC);
        //Mapping relationnel vers objet
        $livres = [];
        foreach ($livresBD as $livreBD){
            $livre = new Livre(); //Constructeur par défaut
            $livre->setId($livreBD['id_livre']);
            $livre->setTitre($livreBD['titre_livre']);
            $livre->setNbPages($livreBD['nombre_pages_livre']);
            $livre->setAuteur($livreBD['auteur_livre']);
            $livres[] = $livre;
        }
        return $livres;
    }

    public function selectDetail() : array {
        $requete = $this->db->query("SELECT * FROM livre");
        $details_livre = $requete->fetchAll(\PDO::FETCH_ASSOC);
        $details = [];
        foreach ($details_livre as $detail_livre){
            $detail = new Livre(); //Constructeur par défaut
            $detail->setId($detail_livre['id_livre']);
            $detail->setTitre($detail_livre['titre_livre']);
            $detail->setNbPages($detail_livre['nombre_pages_livre']);
            $detail->setAuteur($detail_livre['auteur_livre']);
            $details[] = $detail;
        }
        return $details;
    }
}