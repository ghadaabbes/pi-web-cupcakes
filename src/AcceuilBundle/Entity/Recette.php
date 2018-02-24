<?php

namespace AcceuilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Recette
 *
 * @ORM\Table(name="recette", indexes={@ORM\Index(name="FK5", columns={"iduser"})})
 * @ORM\Entity(repositoryClass="RecetteBundle\Repository\RecetteRepository")
 */
class Recette
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;


    /**
     * @var string
     * @Assert\NotBlank(message="Please, enter un image.")
     * @Assert\Image()
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    public $nomImage;

    /**
     * @var string
     *
     * @ORM\Column(name="cout", type="string", length=255, nullable=true)
     */
    private $cout;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps_preparation", type="time", nullable=false)
     */
    private $tempsPreparation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps_repos", type="time", nullable=false)
     */
    private $tempsRepos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps_cuisson", type="time", nullable=false)
     */
    private $tempsCuisson;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_personne", type="integer", nullable=false)
     */
    private $nbPersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="difficulte", type="string", length=255, nullable=false)
     */
    private $difficulte;

    /**
     * @var string
     *
     * @ORM\Column(name="astuces", type="string", length=255, nullable=true)
     */
    private $astuces;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     * })
     */
    private $iduser;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $ingredients;

    /**
     * @ORM\Column(type="text",nullable=false)
     */
    private $etapes;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getNomImage()
    {
        return $this->nomImage;
    }

    /**
     * @param mixed $nomImage
     */
    public function setNomImage($nomImage)
    {
        $this->nomImage = $nomImage;
    }


    /**
     * @return string
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * @param string $cout
     */
    public function setCout($cout)
    {
        $this->cout = $cout;
    }

    /**
     * @return \DateTime
     */
    public function getTempsPreparation()
    {  // $this->tempsPreparation= new \DateTime();
        return $this->tempsPreparation;
    }

    /**
     * @param \DateTime $tempsPreparation
     */
    public function setTempsPreparation($tempsPreparation)
    {
        $this->tempsPreparation = $tempsPreparation;
    }

    /**
     * @return \DateTime
     */
    public function getTempsRepos()
    { // $this->tempsRepos= new \DateTime();
        return $this->tempsRepos;
    }

    /**
     * @param \DateTime $tempsRepos
     */
    public function setTempsRepos($tempsRepos)
    {
        $this->tempsRepos = $tempsRepos;
    }

    /**
     * @return \DateTime
     */
    public function getTempsCuisson()
    { //  $this->tempsCuisson= new \DateTime();
        return $this->tempsCuisson;
    }

    /**
     * @param \DateTime $tempsCuisson
     */
    public function setTempsCuisson($tempsCuisson)
    {
        $this->tempsCuisson = $tempsCuisson;
    }

    /**
     * @return int
     */
    public function getNbPersonne()
    {
        return $this->nbPersonne;
    }

    /**
     * @param int $nbPersonne
     */
    public function setNbPersonne($nbPersonne)
    {
        $this->nbPersonne = $nbPersonne;
    }

    /**
     * @return string
     */
    public function getDifficulte()
    {
        return $this->difficulte;
    }

    /**
     * @param string $difficulte
     */
    public function setDifficulte($difficulte)
    {
        $this->difficulte = $difficulte;
    }

    /**
     * @return string
     */
    public function getAstuces()
    {
        return $this->astuces;
    }

    /**
     * @param string $astuces
     */
    public function setAstuces($astuces)
    {
        $this->astuces = $astuces;
    }

    /**
     * @return \User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param \User $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    /**
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param mixed $ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return mixed
     */
    public function getEtapes()
    {
        return $this->etapes;
    }

    /**
     * @param mixed $etapes
     */
    public function setEtapes($etapes)
    {
        $this->etapes = $etapes;
    }


}