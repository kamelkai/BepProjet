<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use App\Form\MenuType;
use App\Repository\MenuRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class MenuController extends Controller
{
    /**
     * @Route("/admin/menu", name="menu_list")
     * @Route("/admin/menu/{id}", name="menu_edit")
     */
    public function getList(MenuRepository $menuRepo, ObjectManager $manager, Request $request, Menu $menu = null)
    {  
        // SELECT * FROM menu
        $menus = $menuRepo->findAll();
        
       if(! $menu){
           $menu = new Menu();
       }
        
        
         // creation du formulaire
       $form = $this->createForm(MenuType::class, $menu)
               // création du bouton submit)
               ->add('Enregistrer', SubmitType::class);

       $form->handleRequest($request);

       // validation du formulaire
       if ($form->isSubmitted() && $form->isValid()) {
           // enregistrement du produit
           $manager->persist($menu);
           $manager->flush();
           return $this->redirectToRoute('menu_list');
       }
        
        return $this->render('admin/menu_list.html.twig', [
            'menus' => $menus,
            'form' => $form->createView()   
        ]);
    }
    /**
     * @Route("/admin/menu/delete/{id}", name="menu_delete")
     */
    public function deleteElement (ObjectManager $manager, Menu $menu)
    {
        $manager->remove($menu); 
        $manager->flush(); 
        
        return $this->redirectToRoute('menu_list');     
    }
}

