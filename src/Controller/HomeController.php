<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Repository\MenuRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller {

    /**
     * @Route("/home", name="home")
     */
    public function index() {
       
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function about() {
       
        return $this->render('about.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact() {
       
        return $this->render('contact.html.twig');
    }

    /**
     * @Route("/menu", name="menu")
     */
    public function menu() {
      
        return $this->render('menu.html.twig');
    }

    /**
     * @Route("/menu/{name}", name="menu_details")
     */
    public function menuDetails(Menu $menu, MenuRepository $menuRepo) {
        
        if('name' == 'Bepbox'){
            return $this->render('menu_bepbox.html.twig', [
            'menu' => $menu]);
        }
        else{
            return $this->render('nos_menus.html.twig', [
            'menu' => $menu]);
        }
        
        
    }

    /**
     * @Route("/product", name="product")
     */
    public function product() {

        return $this->render('product.html.twig');
    }

    /**
     * 
     * @Route("/nos_menus", name="nos_menus")
     */
    public function nosMenus() {
        // replace this line with your own code!
        return $this->render('nos_menus.html.twig');
    }

    /**
     *
     * @Route("/profil", name="profil")
     */
    public function profil() {
        return $this->render('profil.html.twig');
    }

}
