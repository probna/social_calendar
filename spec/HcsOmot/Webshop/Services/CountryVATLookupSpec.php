<?php

namespace spec\HcsOmot\Webshop\Services;

use HcsOmot\Webshop\Country;
use HcsOmot\Webshop\Services\CountryVATLookup;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CountryVATLookupSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CountryVATLookup::class);
    }

    public function it_should_return_VAT_value_of_25_for_Croatia(Country $country)
    {
        $country->getCountryName()->shouldBeCalled()->willReturn('Croatia');
        $this->getVATForCountry($country)->shouldReturn(25.0);
    }

    public function it_should_return_VAT_value_of_19_for_Deutschland(Country $country)
    {
        $country->getCountryName()->shouldBeCalled()->willReturn('Deutschland');
        $this->getVATForCountry($country)->shouldReturn(19.0);
    }
}
