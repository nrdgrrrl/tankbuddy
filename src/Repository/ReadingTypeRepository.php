<?php

namespace App\Repository;

use App\Entity\ReadingType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReadingType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReadingType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReadingType[]    findAll()
 * @method ReadingType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReadingTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReadingType::class);
    }

//    /**
//     * @return ReadingType[] Returns an array of ReadingType objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReadingType
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
