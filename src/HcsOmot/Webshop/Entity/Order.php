<?php

namespace HcsOmot\Webshop\Entity;

class Order
{
    /**
     * @var float
     */
    private $orderAmount;
    /**
     * @var \HcsOmot\Webshop\Entity\Customer
     */
    private $customer;

    public function __construct(float $orderAmount, Customer $customer)
    {
        $this->orderAmount = $orderAmount;
        $this->customer    = $customer;
    }

    /**
     * @return float
     */
    public function getOrderAmount(): float
    {
        return $this->orderAmount;
    }

    /**
     * @return \HcsOmot\Webshop\Entity\Customer
     */
    public function getCustomer(): \HcsOmot\Webshop\Entity\Customer
    {
        return $this->customer;
    }
}
