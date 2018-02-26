<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


class EventController extends Controller
{
    // Fonction pour afficher ou modifier un évènement
    /**
     * @Route("/admin/event", name="event_list")
     * @Route("/admin/event/{id}", name="event_edit")
     */
    public function getList(EventRepository $eventRepo, ObjectManager $manager, Request $request, Event $event = null)
    {
        // SELECT * FROM event
        $events = $eventRepo->findAll();
        
        // Si $event n'est pas renseigné = phase de création => création d'un new Event pour enregistrer les données du formulaire
        // Si $event est déjà renseigné = phase de modification => les données de $event, dont l'id a été renseigné, seront insérées dans le formulaire pour modification
        if( ! $event) { 
            $event = new Event();
        }
        
        // creation du formulaire
        $form = $this->createForm(EventType::class, $event)
                // création du bouton submit)
                ->add('Enregistrer', SubmitType::class);

        $form->handleRequest($request);

       // validation du formulaire
       if ($form->isSubmitted() && $form->isValid()) {
           // enregistrement du produit
           $manager->persist($event);
           $manager->flush();
           return $this->redirectToRoute('event_list');
       }
       
        return $this->render('admin/event_list.html.twig', [
            'events' => $events,
            'form' => $form->createView()
        ]);
    }
    
    // Fonction pour supprimer un évènement
    /**
     * @Route("/admin/event/delete/{id}", name="event_delete")
     */
    public function deleteElement (ObjectManager $manager, Event $event)
    {
        $manager->remove($event); // c'est l'inverse de $manager->persist
        $manager->flush(); // ça effectue les changements demandés
        
        return $this->redirectToRoute('event_list');     
    }
        
    
} 