<?php

namespace spec\HcsOmot\Webshop;

use HcsOmot\Webshop\Country;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CountrySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Country::class);

    }

    public function let()
    {
        $this->beConstructedWith($countryName = 'Croatia', $isEU = true);
    }

    public function it_should_return_country_name()
    {
        $this->getCountryName()->shouldReturn('Croatia');
    }

    public function it_should_return_if_country_is_in_EU()
    {
        $this->isEU()->shouldReturn(true);
    }


}
