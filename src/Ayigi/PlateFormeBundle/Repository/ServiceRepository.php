<?php

namespace Ayigi\PlateFormeBundle\Repository;

/**
 * ServiceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ServiceRepository extends \Doctrine\ORM\EntityRepository
{
	public function ServiceEtablissement($idEtablissement)    
	{
		$qb = $this->createQueryBuilder('s')
					->leftJoin('s.etablissements', 'e')
	            	->where('e.id = :idEtablissement')
	            	->setParameter('idEtablissement', $idEtablissement);
	 
			return $qb->getQuery()->getResult();
	}
}
