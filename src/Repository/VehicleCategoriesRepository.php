<?php

namespace App\Repository;

use App\Entity\VehicleCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VehicleCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehicleCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehicleCategories[]    findAll()
 * @method VehicleCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VehicleCategories::class);
    }

    // /**
    //  * @return VehicleCategories[] Returns an array of VehicleCategories objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VehicleCategories
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
