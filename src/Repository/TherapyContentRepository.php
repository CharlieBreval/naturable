<?php

namespace App\Repository;

use App\Entity\TherapyContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TherapyContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method TherapyContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method TherapyContent[]    findAll()
 * @method TherapyContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TherapyContentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TherapyContent::class);
    }

//    /**
//     * @return TherapyContent[] Returns an array of TherapyContent objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TherapyContent
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
