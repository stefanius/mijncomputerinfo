<?php

namespace Stef\UserAgentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('StefUserAgentBundle:Default:index.html.twig', array('name' => $name));
    }
}
