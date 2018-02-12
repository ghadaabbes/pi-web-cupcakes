<?php

namespace AcceuilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patisserie
 *
 * @ORM\Table(name="patisserie")
 * @ORM\Entity
 */
class Patisserie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_Patisserie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPatisserie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToMany(targetEntity="Categorie", mappedBy="Patisserie")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_Categorie", referencedColumnName="idCategorie")
     * })
     */
    private $idCategorie;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCategorie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idPatisserie
     *
     * @return integer
     */
    public function getIdPatisserie()
    {
        return $this->idPatisserie;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Patisserie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Patisserie
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Patisserie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add idCategorie
     *
     * @param \PromotionBundle\Entity\Categorie $idCategorie
     *
     * @return Patisserie
     */
    public function addIdCategorie(\PromotionBundle\Entity\Categorie $idCategorie)
    {
        $this->idCategorie[] = $idCategorie;

        return $this;
    }

    /**
     * Remove idCategorie
     *
     * @param \PromotionBundle\Entity\Categorie $idCategorie
     */
    public function removeIdCategorie(\PromotionBundle\Entity\Categorie $idCategorie)
    {
        $this->idCategorie->removeElement($idCategorie);
    }

    /**
     * Get idCategorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }
}

