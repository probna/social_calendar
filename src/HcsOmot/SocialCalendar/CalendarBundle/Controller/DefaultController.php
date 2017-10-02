<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Controller;

use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\mirko;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {

        mirko::increment();

        new Event(1, 'bla', 'blabla', 'blablabla', $this->getUser());
        var_dump(mirko::getValue());
        die();
        return $this->render('HcsOmotSocialCalendarCalendarBundle:Default:index.html.twig');
    }


}
