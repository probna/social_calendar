<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;

class EventEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', null, ['disabled' => true]);
        $builder->add('description');
        $builder->add('venue');
        $builder->add('eventTerm', DateTimeType::class, ['required' => false, 'label' => 'Propose a term for this event']);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hcsomot_socialcalendar_calendarbundle_event';
    }
}
