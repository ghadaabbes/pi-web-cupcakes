<?php
/**
 * Created by PhpStorm.
 * User: Siala
 * Date: 22/02/2018
 * Time: 20:50
 */

namespace RecetteBundle\Repository;

use Doctrine\ORM\EntityRepository;

class VoteRepository extends EntityRepository
{  public function topRecette(){

    $query=$this->getEntityManager()
        ->createQuery( 'SELECT v FROM AcceuilBundle:Vote v 
                            WHERE v.rating = :ok
                            GROUP BY v.idrecette
                            
                            ORDER BY v.idrecette ASC')->setParameter('ok',5);


    return $query->setMaxResults(10)->getResult();
}

}