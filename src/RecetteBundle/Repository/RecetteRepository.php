<?php
/**
 * Created by PhpStorm.
 * User: Siala
 * Date: 12/02/2018
 * Time: 22:41
 */

namespace RecetteBundle\Repository;

use Doctrine\ORM\EntityRepository;
class RecetteRepository extends EntityRepository
{  public function RNom($nom){
    $query=$this->getEntityManager()->createQuery("select r from AcceuilBundle:Recette r
                                                       WHERE r.nom LIKE :nom 
                                                       ")
        ->setParameter('nom','%'.$nom.'%');
    return $query->getResult();
}

}