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

    public function selectDetail(int $id_livre) : ?Livre {
        $requete = $this->db->query("SELECT * FROM livre WHERE id_livre = $id_livre");
        $livreBD = $requete->fetch(\PDO::FETCH_ASSOC);
        if (!$livreBD){
            return null;
        }

        $livre = new Livre(); //Constructeur par défaut
        $livre->setId($livreBD['id_livre']);
        $livre->setTitre($livreBD['titre_livre']);
        $livre->setNbPages($livreBD['nombre_pages_livre']);
        $livre->setAuteur($livreBD['auteur_livre']);

        return $livre;
    }

    public function creer_livre($titre_livre, $nombre_pages_livre, $auteur_livre) : void {
        $requete = $this->db->query("INSERT INTO livre (titre_livre, nombre_pages, auteur_livre) VALUES (?, ?, ?)");
        $requete->bindParam(1, $titre_livre);
        $requete->bindParam(2, $nombre_pages_livre);
        $requete->bindParam(3, $auteur_livre);

        $requete->execute();
    }
}