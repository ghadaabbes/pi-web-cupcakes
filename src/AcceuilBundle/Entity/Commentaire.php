<?php

namespace AcceuilBundle\Entity;
use User\UserBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="idrecette", columns={"idrecette"}), @ORM\Index(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Commentaire
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
     * @ORM\Column(name="comment", type="string", length=255, nullable=false)
     */
    private $comment;

    /**
     * @var \AcceuilBundle\Entity\Recette
     *
     * @ORM\ManyToOne(targetEntity="Recette")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idrecette", referencedColumnName="id")
     * })
     */
    private $idrecette;

    /**
     * @var \User\UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $iduser;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return \AcceuilBundle\Entity\Recette
     */
    public function getIdrecette()
    {
        return $this->idrecette;
    }

    /**
     * @param \AcceuilBundle\Entity\Recette $idrecette
     */
    public function setIdrecette($idrecette)
    {
        $this->idrecette = $idrecette;
    }

    /**
     * @return \User\UserBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param \User\UserBundle\Entity\User $id
     */
    public function setIduser($id)
    {
        $this->iduser = $id;
    }


}

