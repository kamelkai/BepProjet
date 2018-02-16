<?php

namespace App\Controller\Admin;

use App\Repository\EventRepository;
use App\Repository\MemberRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller
{
    /**
     * @Route("/admin/event", name="event_list")
     */
    public function getList(EventRepository $eventRepo)
    {
        $events = $eventRepo->findAll();
        
        return $this->render('admin/event_list.html.twig', [
            'events' => $events
        ]);
    }
    
    
//      public function getList(MemberRepository $memberRepo)
//    {
//        $admins = $memberRepo->findby([
//            'status' => 'admin'
//        ]);
//        
//        $membres = $memberRepo->findby([
//            'status' => 'member'
//        ]);
//        
//        return $this->render('admin/member_list.html.twig', [
//            'admins' => $admins,
//            'membres' => $membres
//        ]);
    }
    
    
    
    
    
    
    
