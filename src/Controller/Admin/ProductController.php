<?php

namespace App\Controller\Admin;

use App\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("/admin/product", name="product_list")
     */
    public function getList(ProductRepository $productRepo)
    {
                $dishes = $productRepo->findBy([
                    'type' => 'dishes'
                ]);
                $desserts = $productRepo->findBy([
                    'type' => 'dessert'
                ]);
                $drinks = $productRepo->findBy([
                    'type' => 'drink'
                ]);
        
        return $this->render('admin/product_list.html.twig', [
            'dishes' => $dishes,
            'desserts' => $desserts,
            'drinks' => $drinks
        ]);

    }
}
