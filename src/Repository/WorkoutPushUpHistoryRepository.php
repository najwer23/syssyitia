<?php

namespace App\Repository;

use App\Entity\WorkoutPushUpHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WorkoutPushUpHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkoutPushUpHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkoutPushUpHistory[]    findAll()
 * @method WorkoutPushUpHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkoutPushUpHistoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WorkoutPushUpHistory::class);
    }

//    /**
//     * @return WorkoutPushUpHistory[] Returns an array of WorkoutPushUpHistory objects
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
    public function findOneBySomeField($value): ?WorkoutPushUpHistory
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
