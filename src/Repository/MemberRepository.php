<?php

namespace App\Repository;

use App\Entity\Member;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class MemberRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Member::class);
    }
//
//    public function findByAdmin($admin){
//        return $this->createQueryBuilder('m')
//           ->where('m.status = :admin')
//           ->setParameter('admin', $admin)
//           ->getQuery()
//           ->getResult();
//    }
    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('m')
            ->where('m.something = :value')->setParameter('value', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
