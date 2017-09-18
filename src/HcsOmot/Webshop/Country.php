<?php

namespace HcsOmot\Webshop;

class Country
{
    /**
     * @var string
     */
    private $countryName;
    /**
     * @var bool
     */
    private $isEU;

    public function __construct(string $countryName, bool $isEU)
    {
        $this->countryName = $countryName;
        $this->isEU        = $isEU;
    }

    /**
     * @return string
     */
    public function getCountryName(): string
    {
        return $this->countryName;
    }

    /**
     * @return bool
     */
    public function isEU(): bool
    {
        return $this->isEU;
    }
}
