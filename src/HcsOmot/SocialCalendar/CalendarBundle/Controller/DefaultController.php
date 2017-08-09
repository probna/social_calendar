<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('HcsOmotSocialCalendarCalendarBundle:Default:index.html.twig');
    }
}
