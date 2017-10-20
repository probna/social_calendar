<?php

declare(strict_types=1);

namespace HcsOmot\SocialCalendar\CalendarBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;

class EventAttendeesFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /** @var Event $event */
        $event = $this->getReference('gothic_raid');

        $event_attendee = $this->getReference('event_attendee');
        $event_owner    = $this->getReference('event_owner');

        $event->addAttendee($event_attendee);
        $event->addAttendee($event_owner);

        $manager->persist($event);
        $manager->flush();
    }

    /**
     * Get the order of this fixture.
     *
     * @return int
     */
    public function getOrder()
    {
        return 32;
    }
}
