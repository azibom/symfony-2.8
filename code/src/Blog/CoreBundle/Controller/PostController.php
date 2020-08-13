<?php

namespace Blog\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PostController extends Controller
{
    /**
     * indexAction
     * 
     * @return array
     * 
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

}
