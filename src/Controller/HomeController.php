<?php

namespace App\Controller;

use App\Stripe\StripeClient;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
    
    /**
     * 
     * @Route("/contact", name="contact")
     */
   public function contact()
    {
        // replace this line with your own code!
        return $this->render('contact.html.twig');
    } 
   
     /**
     * 
     * @Route("/about", name="about")
     */
   public function about()
    {
        // replace this line with your own code!
        return $this->render('about.html.twig');
    } 
    
  
     /**
     * 
     * @Route("/product", name="product")
     */
   public function product()
    {
        // replace this line with your own code!
        return $this->render('product.html.twig');
    } 
 
    /**
    *
    * @Route("/profil", name="profil")
    */
    public function profil()
    {
        return $this->render('profil.html.twig');
    }
    
    /**
    *
    * @Route("/payment", name="payment")
    */
    public function payment(Request $request, StripeClient $stripeClient)
    {
        if($request->isMethod("POST")) {
            $tokenStripe = $request->request->get('stripeToken');
            try {
                $charge = $stripeClient->createCharge(900, 'eur', $tokenStripe);
                
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }
        return $this->render('payment.html.twig');
    }
 }
