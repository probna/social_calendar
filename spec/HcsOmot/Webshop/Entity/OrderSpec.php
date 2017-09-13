<?php

namespace spec\HcsOmot\Webshop\Entity;

use HcsOmot\Webshop\Entity\Customer;
use HcsOmot\Webshop\Entity\Order;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OrderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Order::class);
    }

    public function let(Customer $customer)
    {
        $this->beConstructedWith($orderAmount = 100.0, $customer);
    }

    public function it_should_return_customer(Customer $customer)
    {
        $this->getCustomer()->shouldReturn($customer);
    }

    public function it_should_return_order_amount()
    {
        $this->getOrderAmount()->shouldReturn(100.0);
    }
}
