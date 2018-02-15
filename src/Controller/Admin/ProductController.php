<?php

namespace App\Controller\Admin;

use App\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("/admin/product", name="product")
     */
    public function getList(ProductRepository $productRepo)
    {
        return $this->render('admin/product_list.html.twig');
        
    }
}
