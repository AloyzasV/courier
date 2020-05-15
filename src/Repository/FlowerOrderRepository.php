<?php

namespace App\Repository;

use App\Entity\FlowerOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FlowerOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method FlowerOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method FlowerOrder[]    findAll()
 * @method FlowerOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FlowerOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FlowerOrder::class);
    }

    // /**
    //  * @return FlowerOrder[] Returns an array of FlowerOrder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FlowerOrder
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
