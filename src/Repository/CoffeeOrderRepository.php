<?php

namespace App\Repository;

use App\Entity\Order\CoffeeOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CoffeeOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoffeeOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoffeeOrder[]    findAll()
 * @method CoffeeOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoffeeOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoffeeOrder::class);
    }

    // /**
    //  * @return CoffeeOrder[] Returns an array of CoffeeOrder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CoffeeOrder
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
