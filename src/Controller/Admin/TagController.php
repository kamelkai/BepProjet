<?php

namespace App\Controller\Admin;

use App\Entity\Tag;
use App\Form\TagType;
use App\Repository\TagRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{
    // Fonction pour ajouter ou modifier un ingrédient
    /**
     * @Route("admin/tag", name="tag_list")
     * @Route("/admin/tag/{id}", name="tag_edit")
     */
    public function getList(TagRepository $tagRepo, ObjectManager $manager, Request $request, Tag $tag = null)
    {
        // SELECT * FROM tag
           $tags = $tagRepo->findAll();
        
           if(! $tag){
               $tag = new Tag();
           }
           

       // creation du formulaire
       $form = $this->createForm(TagType::class, $tag)
               // création du bouton submit)
               ->add('Enregistrer', SubmitType::class);

       $form->handleRequest($request);

       // validation du formulaire
       if ($form->isSubmitted() && $form->isValid()) {
           // enregistrement du produit
           $manager->persist($tag);
           $manager->flush();
           return $this->redirectToRoute('tag_list');
       }
       
        return $this->render('admin/tag_list.html.twig', [
            'tags' => $tags,
            'form' => $form->createView()
        ]);
       
    }
    
    // Fonction pour supprimer un ingrédient
    /**
     * @Route("/admin/tag/delete/{id}", name="tag_delete")
     */
    public function deleteElement (ObjectManager $manager, Tag $tag)
    {
        $manager->remove($tag); 
        $manager->flush(); 
        
        return $this->redirectToRoute('tag_list');     
    }
}

