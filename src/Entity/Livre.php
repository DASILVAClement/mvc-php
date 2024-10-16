<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
//Cette clase représente une entité (table liée dans la BDD)
#[ORM\Entity]
#[ORM\Table(name: "livre")]
class Livre
{
    #[ORM\Id]
    #[ORM\Column(name: 'id_livre', type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(name: 'titre_livre', type: 'string', length: 100, nullable: false)]
    private string $titre;
    #[ORM\Column(name: 'nombre_pages_livre', type: 'integer', nullable: false)]
    private int $nbPages;
    #[ORM\Column(name: 'auteur_livre', type: 'string', length: 100, nullable: false)]
    private string $auteur;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return int
     */
    public function getNbPages(): int
    {
        return $this->nbPages;
    }

    /**
     * @param int $nbPages
     */
    public function setNbPages(int $nbPages): void
    {
        $this->nbPages = $nbPages;
    }

    /**
     * @return string
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }

    /**
     * @param string $auteur
     */
    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }


}