<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{
    // Fonction pour ajouter ou modifier un plat    
    /**
     * @Route("/admin/product", name="product_list")
     * @Route("/admin/product/{id}", name="product_edit")
     */
    public function getListProduct(ProductRepository $productRepo, ObjectManager $manager, Request $request, Product $product = null) {
        
        // SELECT * FROM product
        $products = $productRepo->findAll();
        
        if(! $product){
          $product = new Product();  
        }
        
        // creation du formulaire
        $form = $this->createForm(ProductType::class, $product)
        // création du bouton submit)
        ->add('Envoyer', SubmitType::class);

        $form->handleRequest($request);
        
        // validation du formulaire
        if ($form->isSubmitted() && $form->isValid()) {
            if ($product->getImage()) {
                // upload du fichier image
                $image = $product->getImage();
                // uniqid() génère une chaine de caractère aléatoire
                $fileName = md5(uniqid()) . '.' . $image->guessExtension();
                $image->move('uploads/product', $fileName);
                $product->setImage($fileName);
            }

            $manager->persist($product);
            $manager->flush();
            return $this->redirectToRoute('product_list');
        }
        return $this->render('admin/product_list.html.twig', [
            'products' => $products,
            'form' => $form->createView()
        ]);
    }
    
    // Fonction pour supprimer un plat
     /**
     * @Route("/admin/product/delete/{id}", name="product_delete")
     */
    public function deleteProduct (ObjectManager $manager, Product $product)
    {
        $manager->remove($product); 
        $manager->flush(); 
        
        return $this->redirectToRoute('product_list');     
    }


}