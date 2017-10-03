<?php

declare(strict_types=1);

namespace HcsOmot\SocialCalendar\CalendarBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\EventTerm;

class EventTermVotersFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /** @var EventTerm $eventTerm */
        $eventTerm = $this->getReference('gothic_raid_term');

        $attendee_voter     = $this->getReference('event_attendee');

        $eventTerm->addTermVoter($attendee_voter);

        $manager->persist($eventTerm);
        $manager->flush();
    }

    /**
     * Get the order of this fixture.
     *
     * @return int
     */
    public function getOrder()
    {
        return 35;
    }
}
