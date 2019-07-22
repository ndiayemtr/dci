<?php

namespace DCI\DciBundle\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * IndicaMarchaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class IndicaMarchaRepository extends \Doctrine\ORM\EntityRepository {
    
      public function allIndicaMarcha($page, $nbrAffichPage) {
        $qb = $this->createQueryBuilder('IndicaMarcha')
                ->select('IndicaMarcha')
                ->getQuery();
        $qb
                // On définit l'annonce à partir de laquelle commencer la liste
                ->setFirstResult(($page - 1) * $nbrAffichPage)
                // Ainsi que le nombre d'annonce à afficher sur une page
                ->setMaxResults($nbrAffichPage);

        return new Paginator($qb, true);
    }
    
      public function indicatD1Marcha($id, $page, $nbrAffichPage) {
        $qb = $this->createQueryBuilder('IndicaMarcha')
                ->select('IndicaMarcha')
                ->leftJoin('IndicaMarcha.marchandise', 'marchandise')
                ->andWhere('marchandise.id =:id')
                ->setParameter('id', $id)
                ->getQuery();
        $qb
                // On définit l'annonce à partir de laquelle commencer la liste
                ->setFirstResult(($page - 1) * $nbrAffichPage)
                // Ainsi que le nombre d'annonce à afficher sur une page
                ->setMaxResults($nbrAffichPage);

        return new Paginator($qb, true);
    }
    
}