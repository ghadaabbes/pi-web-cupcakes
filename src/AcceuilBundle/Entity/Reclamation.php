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
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \AcceuilBundle\Entity\Patisserie
     *
     * @ORM\OneToMany(targetEntity="Patisserie",mappedBy="Reclamation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPat", referencedColumnName="idPatisserie")
     * })
     */
    private $idPat;

    /**
     * @var \User\UserBundle\Entity\User
     *
     * @ORM\OneToMany(targetEntity="User" , mappedBy="Reclamation")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_User", referencedColumnName="idUser")
     * })
     */

    private $id_User;


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





}
