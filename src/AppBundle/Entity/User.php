<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\ManyToOne(targetEntity="HcsOmot\SocialCalendar\CalendarBundle\Entity\EventTerm", inversedBy="termVoters")
     * @ORM\JoinColumn(name="id")
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="HcsOmot\SocialCalendar\CalendarBundle\Entity\Event", mappedBy="owner")
     */
    private $events;

    public function __construct()
    {
        parent::__construct();

        $this->events = new ArrayCollection();
    }
}
