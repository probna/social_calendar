<?php

namespace HcsOmot\Webshop\Entity;

use HcsOmot\Webshop\Country;

class Customer
{
    /**
     * @var bool
     */
    private $isCorporation;
    /**
     * @var \HcsOmot\Webshop\Country
     */
    private $country;

    public function __construct(bool $isCorporation, Country $country)
    {
        $this->isCorporation = $isCorporation;
        $this->country       = $country;
    }

    /**
     * @return bool
     */
    public function isCorporation(): bool
    {
        return $this->isCorporation;
    }

    /**
     * @return \HcsOmot\Webshop\Country
     */
    public function getCountry(): \HcsOmot\Webshop\Country
    {
        return $this->country;
    }
}
