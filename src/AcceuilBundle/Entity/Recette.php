<?php

namespace AcceuilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Recette
 *
 * @ORM\Table(name="recette", indexes={@ORM\Index(name="FK5", columns={"iduser"})})
 * @ORM\Entity
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $nomImage;
    /**
     * @Assert\File(maxSize="500k")
     */
    public $file;
    /**
     * @var string
     *
     * @ORM\Column(name="cout", type="string", length=255, nullable=false)
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
     * @var \User\UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="User")
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
    public function getWebPath(){
        return null===$this->nomImage ? null : $this->getUploaDir.'/'.$this->nomImage;
    }
    protected function getUploadRootDir(){
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir(){
        return 'images';
    }
    public function UploadProfilePicture(){
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        $this->nomImage=$this->file->getClientOriginalName();
        $this->file=null;
    }

    /**
     * Set nomImage
     * @param string $nomImage
     * @return Categorie
     */
    public function setNomImage($nomImage){
        $this->nomImage==$nomImage;
        return $this;

    }

    /**
     * Get nomimage
     *
     * @return string
     */
    public function getNomImage()
    {
        return $this->nomImage;
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
    {
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
    {
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
    {
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
     * @return \User\UserBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param \User\UserBundle\Entity\User $iduser
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

