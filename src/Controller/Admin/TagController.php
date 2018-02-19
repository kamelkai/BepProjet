<?php

namespace App\Controller\Admin;

use App\Repository\TagRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TagController extends Controller
{
    /**
     * @Route("admin/tag", name="tag_list")
     */
    public function getList(TagRepository $tagRepo)
    {
      
           $tags = $tagRepo->findAll();
        
        return $this->render('admin/tag_list.html.twig', [
            'tags' => $tags
        ]);
       
    }
}
