<?php

namespace spec\HcsOmot\Webshop\Entity;

use HcsOmot\Webshop\Country;
use HcsOmot\Webshop\Entity\Customer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CustomerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Customer::class);
    }

    public function let(Country $country)
    {
        $this->beConstructedWith($isCorporation = false, $country);
    }

    public function it_should_return_customer_country(Country $country)
    {
        $this->getCountry()->shouldReturn($country);
    }

    public function it_should_return_false_if_customer_is_not_a_corporation()
    {
        $this->isCorporation()->shouldReturn(false);
    }
}
