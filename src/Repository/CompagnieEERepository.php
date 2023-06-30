<?php

namespace App\Repository;

use App\Entity\CompagnieEE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CompagnieEE>
 *
 * @method CompagnieEE|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompagnieEE|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompagnieEE[]    findAll()
 * @method CompagnieEE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompagnieEERepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompagnieEE::class);
    }

    public function save(CompagnieEE $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CompagnieEE $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CompagnieEE[] Returns an array of CompagnieEE objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CompagnieEE
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
