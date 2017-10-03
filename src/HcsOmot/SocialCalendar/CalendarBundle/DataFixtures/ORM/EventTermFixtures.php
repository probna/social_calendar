<?php

declare(strict_types=1);

namespace HcsOmot\SocialCalendar\CalendarBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\EventTerm;

class EventTermFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $id           = time();
        $event        = $this->getReference('gothic_raid');
        $term         = new \DateTime('06/06/566 16:20');
        $termProposer = $this->getReference('event_owner');

        $gothicRaidTerm = new EventTerm($id, $event, $term, $termProposer);

        $manager->persist($gothicRaidTerm);
        $manager->flush();

        $this->addReference('gothic_raid_term', $gothicRaidTerm);
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 30;
    }
}
