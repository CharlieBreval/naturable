<?php

namespace App\Repository;

use App\Entity\Admin\Editable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Editable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Editable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Editable[]    findAll()
 * @method Editable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EditableRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Editable::class);
    }

//    /**
//     * @return Editable[] Returns an array of Editable objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Editable
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
