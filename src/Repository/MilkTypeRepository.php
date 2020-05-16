<?php

namespace App\Repository;

use App\Entity\MilkType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MilkType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MilkType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MilkType[]    findAll()
 * @method MilkType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MilkTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MilkType::class);
    }

    // /**
    //  * @return MilkType[] Returns an array of MilkType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MilkType
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
