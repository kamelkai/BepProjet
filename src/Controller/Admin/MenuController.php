<?php

namespace App\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends Controller
{
    /**
     * @Route("/admin/menu", name="menu")
     */
    public function index()
    {
               return $this->render('admin/menu_list.html.twig');
    }
}
