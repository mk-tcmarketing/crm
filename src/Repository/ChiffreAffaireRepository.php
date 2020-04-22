<?php

namespace App\Repository;

use App\Entity\ChiffreAffaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChiffreAffaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChiffreAffaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChiffreAffaire[]    findAll()
 * @method ChiffreAffaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChiffreAffaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChiffreAffaire::class);
    }

    // /**
    //  * @return ChiffreAffaire[] Returns an array of ChiffreAffaire objects
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
    public function findOneBySomeField($value): ?ChiffreAffaire
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
