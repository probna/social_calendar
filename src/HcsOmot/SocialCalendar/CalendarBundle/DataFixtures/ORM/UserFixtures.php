<?php

declare(strict_types=1);

namespace HcsOmot\SocialCalendar\CalendarBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UserFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->getUserManager();

        //        create an event owner user
        $eventOwner = $userManager->createUser();
        $eventOwner->setUsername('BerigKing');
        $eventOwner->setEmail('berig@king.is');
        $eventOwner->setPlainPassword('1234');
        $eventOwner->setEnabled(true);

        //        create an event invitee user
        $eventAttendee = $userManager->createUser();
        $eventAttendee->setUsername('hcs.omot');
        $eventAttendee->setEmail('hcs@omot.com');
        $eventAttendee->setPlainPassword('1234');
        $eventAttendee->setEnabled(true);

        $userManager->updateUser($eventOwner);
        $userManager->updateUser($eventAttendee);

        $this->addReference('event_owner', $eventOwner);
        $this->addReference('event_attendee', $eventAttendee);
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 10;
    }

    /**
     * @return UserManagerInterface
     */
    private function getUserManager(): UserManagerInterface
    {
        return $this->container->get('fos_user.user_manager');
    }
}
