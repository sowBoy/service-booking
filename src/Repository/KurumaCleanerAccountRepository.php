<?php

namespace App\Repository;

use App\Entity\KurumaCleanerAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method KurumaCleanerAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method KurumaCleanerAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method KurumaCleanerAccount[]    findAll()
 * @method KurumaCleanerAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KurumaCleanerAccountRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, KurumaCleanerAccount::class);
    }

    // /**
    //  * @return KurumaCleanerAccount[] Returns an array of KurumaCleanerAccount objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KurumaCleanerAccount
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
