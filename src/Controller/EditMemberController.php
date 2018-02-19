<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class EditMemberController extends Controller
{
    // Pour ajouter un membre à la liste
    /**
     * @Route("/edit/member", name="edit_member")
     */
    public function addMember(ObjectManager $manager, Request $request)
    {
       $this->denyAccessUnlessGranted('member', null, 'Vous devez être connecté pour accéder à cette page');

       $member = new Member();

       // creation du formulaire
       $form = $this->createForm(MemberType::class, $member)
               // création du bouton submit)
               ->add('Enregistrer', SubmitType::class);

       $form->handleRequest($request);

       // validation du formulaire
       if ($form->isSubmitted() && $form->isValid()) {
           // enregistrement du produit
           $manager->persist($member);
           $manager->flush();
           return $this->redirectToRoute('member_list');
       }
        
        
        return $this->render('member_list.html.twig', [ 'form' => $form->createView() ]);
    }
}