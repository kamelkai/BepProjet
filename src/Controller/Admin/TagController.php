<?php

namespace App\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TagController extends Controller
{
    /**
     * @Route("admin/tag", name="tag")
     */
    public function index()
    {
      
        return $this->render('admin/tag_list.html.twig');
    }
}
