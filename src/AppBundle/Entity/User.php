<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="HcsOmot\SocialCalendar\CalendarBundle\Entity\Event", mappedBy="owner")
     */
    private $ownedEvents;

    /**
     * @ORM\ManyToMany(targetEntity="HcsOmot\SocialCalendar\CalendarBundle\Entity\Event", inversedBy="attendees")
     */
    private $attends;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="HcsOmot\SocialCalendar\CalendarBundle\Entity\EventTerm", mappedBy="termVoters")
     */
    private $votedTerms;

    public function __construct()
    {
        parent::__construct();

        $this->ownedEvents = new ArrayCollection();
    }
}
