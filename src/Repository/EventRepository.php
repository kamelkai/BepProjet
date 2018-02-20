<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class EventRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Event::class);
    }

    
    public function findByTitle()
    {
        return $this->createQueryBuilder('e')
            ->orderBy('e.title', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
}
