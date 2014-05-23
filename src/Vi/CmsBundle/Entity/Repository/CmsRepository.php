<?php

namespace Vi\CmsBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of CmsRepository
 *
 * @author Hardik Patel <hardikpatel1644@gmail.com>
 */
class CmsRepository extends EntityRepository {

    /**
     * Function to find all data order by name
     * @return type
     */
    public function findAllOrderedByName() {

        $queryBuilder = $this->createQueryBuilder('c')
                ->where('c.status = 1')
                ->orderBy('c.cmsTitle', 'DESC');
        return $result = $queryBuilder->getQuery()->getArrayResult();
    }

    /**
     * Function to find data by slug
     * @param type $slug
     * @return type
     */
    public function findBySlug($slug) {

        if ($slug != "") {

            $queryBuilder = $this->createQueryBuilder('c')
                    ->where('c.status = 1')
                    ->andWhere('c.slug =:slug')
                    ->setParameter('slug', $slug)
                    ->orderBy('c.cmsTitle', 'DESC');
            return $result = $queryBuilder->getQuery()->getSingleResult();
        }
        return array();
    }

}
