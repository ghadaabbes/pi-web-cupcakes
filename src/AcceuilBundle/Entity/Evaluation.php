<?php

namespace AcceuilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation")
 * @ORM\Entity
 */
class Evaluation
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
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Patisserie" )
     * @ORM\JoinColumn(name="Patisserie", referencedColumnName="id_Patisserie")
     */

    private $Patisserie;



    /**
     * @var integer
     *
     * @ORM\Column(name="local", type="integer", nullable=false)
     */
    private $local;

    /**
     * @var integer
     *
     * @ORM\Column(name="service", type="integer", nullable=false)
     */
    private $service;

    /**
     * @var integer
     *
     * @ORM\Column(name="noteprix", type="integer", nullable=false)
     */
    private $noteprix;

    /**
     * @var integer
     *
     * @ORM\Column(name="noteproduit", type="integer", length=255, nullable=false)
     */
    private $noteproduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="decor", type="integer", length=255, nullable=false)
     */
    private $decor;



    /**
     * Set local
     *
     * @param integer $local
     *
     * @return Evaluation
     */
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Get local
     *
     * @return integer
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Set service
     *
     * @param integer $service
     *
     * @return Evaluation
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return integer
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set noteprix
     *
     * @param integer $noteprix
     *
     * @return Evaluation
     */
    public function setNoteprix($noteprix)
    {
        $this->noteprix = $noteprix;

        return $this;
    }

    /**
     * Get noteprix
     *
     * @return integer
     */
    public function getNoteprix()
    {
        return $this->noteprix;
    }

    /**
     * Set noteproduit
     *
     * @param integer $noteproduit
     *
     * @return Evaluation
     */
    public function setNoteproduit($noteproduit)
    {
        $this->noteproduit = $noteproduit;

        return $this;
    }

    /**
     * Get noteproduit
     *
     * @return integer
     */
    public function getNoteproduit()
    {
        return $this->noteproduit;
    }

    /**
     * Set decor
     *
     * @param integer $decor
     *
     * @return Evaluation
     */
    public function setDecor($decor)
    {
        $this->decor = $decor;

        return $this;
    }

    /**
     * Get decor
     *
     * @return integer
     */
    public function getDecor()
    {
        return $this->decor;
    }

    /**
     * @return \AcceuilBundle\Entity\Patisserie
     */
    public function getIdPatisserie()
    {
        return $this->id_Patisserie;
    }

    /**
     * @param \Acceuilbundle\Entity\Patisserie $id_Patisserie
     */
    public function setIdPatisserie($id_Patisserie)
    {
        $this->id_Patisserie = $id_Patisserie;
    }






    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id_Patisserie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->id_User = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add idPatisserie
     *
     * @param \AcceuilBundle\Entity\Patisserie $idPatisserie
     *
     * @return Evaluation
     */
    public function addIdPatisserie(\AcceuilBundle\Entity\Patisserie $idPatisserie)
    {
        $this->id_Patisserie[] = $idPatisserie;

        return $this;
    }

    /**
     * Remove idPatisserie
     *
     * @param \AcceuilBundle\Entity\Patisserie $idPatisserie
     */
    public function removeIdPatisserie(\AcceuilBundle\Entity\Patisserie $idPatisserie)
    {
        $this->id_Patisserie->removeElement($idPatisserie);
    }

    /**
     * Add idUser
     *
     * @param \AcceuilBundle\Entity\User $idUser
     *
     * @return Evaluation
     */
    public function addIdUser(\AcceuilBundle\Entity\User $idUser)
    {
        $this->id_User[] = $idUser;

        return $this;
    }

    /**
     * Remove idUser
     *
     * @param \AcceuilBundle\Entity\User $idUser
     */
    public function removeIdUser(\AcceuilBundle\Entity\User $idUser)
    {
        $this->id_User->removeElement($idUser);
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Evaluation
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
     * Add patisserie
     *
     * @param \AcceuilBundle\Entity\Patisserie $patisserie
     *
     * @return Evaluation
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
