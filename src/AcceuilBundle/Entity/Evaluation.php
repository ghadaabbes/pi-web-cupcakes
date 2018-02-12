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
     * @ORM\Column(name="id_Evaluation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id_Evaluation;


    /**
     * @var \AcceuilBundle\Entity\Patisserie
     *
     * @ORM\OneToMany(targetEntity="Patisserie" , mappedBy="Evaluation")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_Patisserie", referencedColumnName="idPatisserie")
     * })
     */

    private $id_Patisserie;
    /**
     * @var \User\UserBundle\Entity\User
     *
     * @ORM\OneToMany(targetEntity="User" , mappedBy="Evaluation")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_User", referencedColumnName="idUser")
     * })
     */

    private $id_User;

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
     * Get idEvaluation
     *
     * @return integer
     */
    public function getIdEvaluation()
    {
        return $this->id_Evaluation;
    }

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






}
