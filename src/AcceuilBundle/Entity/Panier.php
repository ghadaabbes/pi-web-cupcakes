<?php

namespace AcceuilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity
 */
class Panier
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_total", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixTotal;

    /**
     * @var \AcceuilBundle\Entity\Produit
     *
     * @ORM\OneToMany(targetEntity="Produit", mappedBy="Panier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idprod", referencedColumnName="id_produit")
     * })
     */
    private $idprod;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idprod = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prixTotal
     *
     * @param float $prixTotal
     *
     * @return Panier
     */
    public function setPrixTotal($prixTotal)
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    /**
     * Get prixTotal
     *
     * @return float
     */
    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    /**
     * Add idprod
     *
     * @param \AcceuilBundle\Entity\Produit $idprod
     *
     * @return Panier
     */
    public function addIdprod(\AcceuilBundle\Entity\Produit $idprod)
    {
        $this->idprod[] = $idprod;

        return $this;
    }

    /**
     * Remove idprod
     *
     * @param \AcceuilBundle\Entity\Produit $idprod
     */
    public function removeIdprod(\AcceuilBundle\Entity\Produit $idprod)
    {
        $this->idprod->removeElement($idprod);
    }

    /**
     * Get idprod
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdprod()
    {
        return $this->idprod;
    }
}
