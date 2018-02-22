<?php

namespace App\Controller\Admin;

use App\Repository\MenuRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    /**
     * @Route("/admin/menu", name="menu_list")
     */
    public function getList(MenuRepository $menuRepo)
    {
                $menus = $menuRepo->findAll();
        
        return $this->render('admin/menu_list.html.twig', [
            'menus' => $menus
        ]);
    }
}
