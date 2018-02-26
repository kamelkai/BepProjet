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

    // Fonction pour afficher tous les produits par type sauf Bepbox
    public function findAllDishes(){
        return $this->createQueryBuilder('p')
            ->where('p.type = :type')->setParameter('type', 'dishes')
            /*->andWhere('p.bepbox = false')*/
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
        
    
        
}
