<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Entity\Product;
use App\Repository\EventRepository;
use App\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller {

    // Fonction pour afficher la page Home
    /**
     * @Route("/home", name="home")
     */
    public function index(EventRepository $eventRepo) {
        
        $currentEvent = $eventRepo->findOneBy([
            'status' => 'actif'
        ]);
                   
        return $this->render('home.html.twig', ['event' => $currentEvent]);
    }
    
    // Fonction pour afficher la page A propos
    /**
     * @Route("/about", name="about")
     */
    public function about() {
       
        return $this->render('about.html.twig');
    }

    // Fonction pour afficher la page Contact
    /**
     * @Route("/contact", name="contact")
     */
    public function contact() {
       
        return $this->render('contact.html.twig');
    }

    // Fonction pour afficher la page Boutique
    /**
     * @Route("/menu", name="menu")
     */
    public function menu(ProductRepository $productRepo) {
        
        // afficher la liste des plats
        $dishes= $productRepo->findAllDishes();
        
        // afficher la liste des desserts
        $desserts= $productRepo->findAllDesserts();
        
        // afficher la liste des boissons
        $drinks= $productRepo->findAllDrinks();
        
        
        return $this->render('menu.html.twig', [
            'dishes' => $dishes,
            'desserts' => $desserts,
            'drinks' => $drinks,
        ]);
    }
    
    // Fonction pour afficher la page des détails d'un menu    
    /**
     * @Route("/menu/{menuName}", name="menu_details")
     * 
     */
    public function menuDetails(Menu $menu) {
              
        return $this->render('nos_menus.html.twig', [
            'menu' => $menu 
        ]);
        
    }
    
    // Fonction pour afficher la page des détails d'un produit
    /**
     * @Route("/product/{name}", name="product_details")
     * 
     */
    public function productDetails(Product $product) {
              
        return $this->render('product.html.twig', [
            'product' => $product 
        ]);
        
    }
    
    // Fonction pour afficher la page Profil
    /**
     *
     * @Route("/profil", name="profil")
     */
    public function profil() {
        return $this->render('profil.html.twig');
    }

}
