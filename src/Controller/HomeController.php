<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        // replace this line with your own code!
        return $this->render('home.html.twig');
    }
    
    /**
     * 
     * @Route("/menu", name="menu")
     */
   public function menu()
    {
        // replace this line with your own code!
        return $this->render('menu.html.twig');
    } 
    
}
