<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    // Fonction pour afficher tous les plats sauf Bepbox
    public function findAllDishes(){
        return $this->createQueryBuilder('p')
            ->where('p.type = :type')->setParameter('type', 'dishes')
            /*->andWhere('p.bepbox = false')*/
            ->orderBy('p.name')
            ->getQuery()
            ->getResult();
    }
    
    // fonction pour afficher les desserts actifs
    public function findAllDesserts() {
        return $this->createQueryBuilder('p')
            ->where('p.type = :type')->setParameter('type', 'dessert')
            /*->andWhere('p.status = active')*/
            ->getQuery()
            ->getResult();
        
    }
    
    // fonction pour afficher les boissons actives
    public function findAllDrinks() {
        return $this->createQueryBuilder('p')
            ->where('p.type = :type')->setParameter('type', 'drink')
            /*->andWhere('p.status = active')*/
            ->getQuery()
            ->getResult();
        
    }
        
    
        
}
