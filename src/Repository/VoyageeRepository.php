<?php

namespace App\Repository;

use App\Entity\Voyagee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Voyagee>
 *
 * @method Voyagee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Voyagee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Voyagee[]    findAll()
 * @method Voyagee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoyageeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Voyagee::class);
    }

//    /**
//     * @return Voyagee[] Returns an array of Voyagee objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Voyagee
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
