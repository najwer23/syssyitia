<?php

namespace App\Repository;

use App\Entity\WorkoutPushUp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WorkoutPushUp|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkoutPushUp|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkoutPushUp[]    findAll()
 * @method WorkoutPushUp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkoutPushUpRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WorkoutPushUp::class);
    }

//    /**
//     * @return WorkoutPushUp[] Returns an array of WorkoutPushUp objects
//     */
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
    public function findOneBySomeField($value): ?WorkoutPushUp
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
