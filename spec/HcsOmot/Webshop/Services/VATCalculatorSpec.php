<?php

namespace spec\HcsOmot\Webshop\Services;

use HcsOmot\Webshop\Country;
use HcsOmot\Webshop\Entity\Customer;
use HcsOmot\Webshop\Entity\Order;
use HcsOmot\Webshop\Services\CountryVATLookup;
use HcsOmot\Webshop\Services\VATCalculator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VATCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(VATCalculator::class);
    }

    public function let(CountryVATLookup $countryVATLookup)
    {
        $this->beConstructedWith($countryVATLookup);
    }


//    TODO: consider naming conventions - it should return 25 percent tax rate for Croatian customer
//    TODO: don't C/P methods - implement them all by hand until you get some exp
    public function it_should_return_25_for_Croatian_customer_with_order_of_100(Order $order, Customer $customer, Country $country, CountryVATLookup $countryVATLookup)
    {
        $order->getOrderAmount()->shouldBeCalled()->willReturn(100);

        $order->getCustomer()->shouldBeCalled()->willReturn($customer);

        $customer->getCountry()->shouldBeCalled()->willReturn($country);

        $countryVATLookup->getVATForCountry($country)->shouldBeCalled()->willReturn(25.0);

        $country->getCountryName()->shouldBeCalled()->willReturn('Croatia');

        $this->calculateVat($order)->shouldReturn(25.0);

    }

    public function it_should_return_0_for_EU_corporate_customer_with_order_of_100(Order $order, Customer $customer, Country $country)
    {
        $order->getOrderAmount()->shouldBeCalled()->willReturn(100);

        $order->getCustomer()->shouldBeCalled()->willReturn($customer);

        $customer->isCorporation()->shouldBeCalled()->willReturn(true);

        $customer->getCountry()->shouldBeCalled()->willReturn($country);

        $country->getCountryName()->shouldBeCalled()->willReturn('Deutschland');

        $country->isEU()->shouldBeCalled()->willReturn(true);

        $this->calculateVat($order)->shouldReturn(0.0);

    }

    public function it_should_return_38_for_EU_private_customer_with_order_of_200(Order $order, Customer $customer, Country $country, CountryVATLookup $countryVATLookup)
    {
        $order->getOrderAmount()->shouldBeCalled()->willReturn(200);

        $order->getCustomer()->shouldBeCalled()->willReturn($customer);

        $customer->isCorporation()->shouldBeCalled()->willReturn(false);

        $customer->getCountry()->shouldBeCalled()->willReturn($country);

        $countryVATLookup->getVATForCountry($country)->shouldBeCalled()->willReturn(19.0);

        $country->getCountryName()->shouldBeCalled()->willReturn('Deutschland');

        $country->isEU()->shouldBeCalled()->willReturn(true);

        $this->calculateVat($order)->shouldReturn(38.0);

    }

    public function it_should_return_0_for_Non_EU_customers_with_order_of_100(Order $order, Customer $customer, Country $country)
    {
        $order->getOrderAmount()->shouldBeCalled()->willReturn(100);

        $order->getCustomer()->shouldBeCalled()->willReturn($customer);

        $customer->getCountry()->shouldBeCalled()->willReturn($country);

        $country->getCountryName()->shouldBeCalled()->willReturn('Tailand');

        $country->isEU()->shouldBeCalled()->willReturn(false);

        $this->calculateVat($order)->shouldReturn(0.0);

    }
}
