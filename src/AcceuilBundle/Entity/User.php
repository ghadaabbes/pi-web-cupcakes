<?php

namespace AcceuilBundle\Entity;
use FOS\UserBundle\Model\User as FosUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table (name="fos_user")
 */
class User extends FosUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="user", mappedBy="recette")
     */
    protected $id;

    /**
     * User constructor.
     * @param $id
     */
    public function __construct()
    {
        parent:: __construct();
    }


}

