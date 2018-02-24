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
{      public function findByiduser($user){
         $query=$this->getEntityManager()->createQuery("select r from AcceuilBundle:Recette r WHERE r.iduser=:iduser ")
          ->setParameter('iduser',$user);
         return $query->getResult();

}
    public function findByidrecette($id){
        $query=$this->getEntityManager()->createQuery("select com from AcceuilBundle:Commentaire com WHERE com.idrecette=:idrecette ")
            ->setParameter('idrecette',$id);
        return $query->getResult();

    }


}