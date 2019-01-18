<?php

namespace App\Repository;

use App\Entity\WashingType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WashingType|null find($id, $lockMode = null, $lockVersion = null)
 * @method WashingType|null findOneBy(array $criteria, array $orderBy = null)
 * @method WashingType[]    findAll()
 * @method WashingType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WashingTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WashingType::class);
    }

    // /**
    //  * @return WashingType[] Returns an array of WashingType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WashingType
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
