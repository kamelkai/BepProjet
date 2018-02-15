<?php

namespace App\Controller\Admin;

use App\Entity\Member;
use App\Repository\MemberRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MemberController extends Controller
{
    /**
     * @Route("/admin/member", name="member_list")
     */
    public function getList(MemberRepository $memberRepo)
    {
        return $this->render('admin/member_list.html.twig');
    }
}
