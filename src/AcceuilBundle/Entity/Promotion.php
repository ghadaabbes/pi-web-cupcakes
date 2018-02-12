<?php

namespace AcceuilBundle\Entity;
use AcceuilBundle\Entity\Produit;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promotion
 *
 * @ORM\Table(name="promotion")
 * @ORM\Entity
 */
class Promotion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_promotion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPromotion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut_promotion", type="date", nullable=false)
     */
    private $dateDebutPromotion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin_promotion", type="date", nullable=false)
     */
    private $dateFinPromotion;

    /**
     * @var integer
     *
     * @ORM\Column(name="pourcentage", type="integer", nullable=false)
     */
    private $pourcentage;

    /**
     * @var \AcceuilBundle\Entity\Produit
     *
     * @ORM\OneToOne(targetEntity="Produit",inversedBy="prix")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Produit", referencedColumnName="idProduit")
     * })
     */
    private $produit;



    /**
     * Get idPromotion
     *
     * @return integer
     */
    public function getIdPromotion()
    {
        return $this->idPromotion;
    }

    /**
     * Set dateDebutPromotion
     *
     * @param \DateTime $dateDebutPromotion
     *
     * @return Promotion
     */
    public function setDateDebutPromotion($dateDebutPromotion)
    {
        $this->dateDebutPromotion = $dateDebutPromotion;

        return $this;
    }

    /**
     * Get dateDebutPromotion
     *
     * @return \DateTime
     */
    public function getDateDebutPromotion()
    {
        return $this->dateDebutPromotion;
    }

    /**
     * Set dateFinPromotion
     *
     * @param \DateTime $dateFinPromotion
     *
     * @return Promotion
     */
    public function setDateFinPromotion($dateFinPromotion)
    {
        $this->dateFinPromotion = $dateFinPromotion;

        return $this;
    }

    /**
     * Get dateFinPromotion
     *
     * @return \DateTime
     */
    public function getDateFinPromotion()
    {
        return $this->dateFinPromotion;
    }

    /**
     * Set pourcentage
     *
     * @param integer $pourcentage
     *
     * @return Promotion
     */
    public function setPourcentage($pourcentage)
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    /**
     * Get pourcentage
     *
     * @return integer
     */
    public function getPourcentage()
    {
        return $this->pourcentage;
    }

    /**
     * @return \AcceuilBundle\Entity\Produit
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param \AcceuilBundle\Entity\Produit $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }


}

