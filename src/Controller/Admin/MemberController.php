<?php

namespace App\Controller\Admin;

use App\Entity\Member;
use App\Form\MemberType;
use App\Repository\MemberRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class MemberController extends Controller
{
// Fonction pour ajouter ou modifier un membre
    /**
     * @Route("/admin/member", name="member_list")
     * @Route("/admin/member/{id}", name="member_edit")
     */
    public function getListMember(MemberRepository $memberRepo, ObjectManager $manager, Request $request, Member $member = null)
    {
        // SELECT * FROM member
        $membres = $memberRepo->findAll();
        
        // Si le membre n'est pas renseigné, on est en phase de création
        if( ! $member) { 
             $member = new Member();
        }
        
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
        
        return $this->render('admin/member_list.html.twig', [
            'membres' => $membres,
            'form' => $form->createView()
                
        ]);      
    }
    
// Fonction pour supprimer un membre
    /**
     * @Route("/admin/member/delete/{id}", name="member_delete")
     */
    public function deleteMember(ObjectManager $manager, Member $member)
    {
        $manager->remove($member); 
        $manager->flush(); 
        
        return $this->redirectToRoute('member_list');     
    }
    
    
}