<?php

namespace AcceuilBundle\Entity;
use AcceuilBundle\Entity\Patisserie;
use User\UserBundle\Entity\User;


use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="Reclamation")
 * @ORM\Entity
 */
class Reclamation
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
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Patisserie" )
     * @ORM\JoinColumn(name="Patisserie", referencedColumnName="id_Patisserie")
     */
    private $Patisserie;



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
     * Set description
     *
     * @param string $description
     *
     * @return Reclamation
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
     * @return \AcceuilBundle\Entity\Patisserie
     */
    public function getIdPat()
    {
        return $this->idPat;
    }

    /**
     * @param \AcceuilBundle\Entity\Patisserie $idPat
     */
    public function setIdPat($idPat)
    {
        $this->idPat = $idPat;
    }

    /**
     * @return \User\UserBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->id_User;
    }

    /**
     * @param \User\UserBundle\Entity\User $id_User
     */
    public function setIdUser($id_User)
    {
        $this->id_User = $id_User;
    }





    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPat = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Reclamation
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Add idPat
     *
     * @param \AcceuilBundle\Entity\Patisserie $idPat
     *
     * @return Reclamation
     */
    public function addIdPat(\AcceuilBundle\Entity\Patisserie $idPat)
    {
        $this->idPat[] = $idPat;

        return $this;
    }

    /**
     * Remove idPat
     *
     * @param \AcceuilBundle\Entity\Patisserie $idPat
     */
    public function removeIdPat(\AcceuilBundle\Entity\Patisserie $idPat)
    {
        $this->idPat->removeElement($idPat);
    }

    /**
     * Add patisserie
     *
     * @param \AcceuilBundle\Entity\Patisserie $patisserie
     *
     * @return Reclamation
     */
    public function addPatisserie(\AcceuilBundle\Entity\Patisserie $patisserie)
    {
        $this->Patisserie[] = $patisserie;

        return $this;
    }

    /**
     * Remove patisserie
     *
     * @param \AcceuilBundle\Entity\Patisserie $patisserie
     */
    public function removePatisserie(\AcceuilBundle\Entity\Patisserie $patisserie)
    {
        $this->Patisserie->removeElement($patisserie);
    }

    /**
     * Get patisserie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatisserie()
    {
        return $this->Patisserie;
    }
}
