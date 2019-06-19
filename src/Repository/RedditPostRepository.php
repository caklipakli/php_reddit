<?php

namespace App\Repository;

use App\Entity\RedditPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RedditPost|null find($id, $lockMode = null, $lockVersion = null)
 * @method RedditPost|null findOneBy(array $criteria, array $orderBy = null)
 * @method RedditPost[]    findAll()
 * @method RedditPost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RedditPostRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RedditPost::class);
    }

    // /**
    //  * @return RedditPost[] Returns an array of RedditPost objects
    //  */
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
    public function findOneBySomeField($value): ?RedditPost
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
