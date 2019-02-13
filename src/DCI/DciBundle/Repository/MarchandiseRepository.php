<?php

namespace DCI\DciBundle\Repository;

/**
 * MarchandiseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MarchandiseRepository extends \Doctrine\ORM\EntityRepository {
    
       public function marchtDunProduit($idproSer) {
        $qb = $this->createQueryBuilder('march')
                ->select('march')
                ->leftJoin('march.produitService', 'proSer')
                ->andWhere('proSer.id =:id')
                ->setParameter('id', $idproSer);

        return $qb->getQuery()->getResult();
    }
    
}