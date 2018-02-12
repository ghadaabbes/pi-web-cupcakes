<?php

namespace AcceuilBundle\Entity;
use AcceuilBundle\Entity\Promotion;
use AcceuilBundle\Entity\Patisserie;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="categorie")
 */
class Categorie
{
    /**
     * @return int
     */
    public function getIdCategorie()
    {
        return $this->id_Categorie;
    }

    /**
     * @param int $id_Categorie
     */
    public function setIdCategorie($id_Categorie)
    {
        $this->id_Categorie = $id_Categorie;
    }

    /**
     * @return int
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param int $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id_Categorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */

    private $id_Categorie;

    /**
     * @var integer
     *
     * @ORM\Column(name="nom", type="integer", nullable=false)
     */
    private $nom;



    /**
     * @var \AcceuilBundle\Entity\Patisserie
     *
     * @ORM\OneToMany(targetEntity="Patisserie",mappedBy="Categorie")
     */
    private $id_patisserie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id_patisserie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add idPatisserie
     *
     * @param \AcceuilBundle\Entity\Patisserie $idPatisserie
     *
     * @return Categorie
     */
    public function addIdPatisserie(\AcceuilBundle\Entity\Patisserie $idPatisserie)
    {
        $this->id_patisserie[] = $idPatisserie;

        return $this;
    }

    /**
     * Remove idPatisserie
     *
     * @param \AcceuilBundle\Entity\Patisserie $idPatisserie
     */
    public function removeIdPatisserie(\AcceuilBundle\Entity\Patisserie $idPatisserie)
    {
        $this->id_patisserie->removeElement($idPatisserie);
    }

    /**
     * Get idPatisserie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdPatisserie()
    {
        return $this->id_patisserie;
    }
}

