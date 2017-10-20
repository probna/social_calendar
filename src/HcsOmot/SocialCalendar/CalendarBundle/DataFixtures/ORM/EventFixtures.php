<?php

declare(strict_types=1);

namespace HcsOmot\SocialCalendar\CalendarBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;

class EventFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $id          = time();
        $name        = 'Gothic Raid';
        $description = '„Gather all the Ostrogoths
        And Visigoths!
        Ride like an arctic storm
        Across the world!“';
        $venue = 'Across the World!';
        $owner = $this->getReference('event_owner');

        $gothicRaid = new Event($id, $name, $description, $venue, $owner);

        $this->addReference('gothic_raid', $gothicRaid);

        $manager->persist($gothicRaid);
        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 20;
    }
}
