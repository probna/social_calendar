<?php

namespace HcsOmot\Webshop\Services;

use HcsOmot\Webshop\Country;

class CountryVATLookup
{
    public function getVATForCountry(Country $country)
    {
        switch ($country->getCountryName()) {
            case 'Croatia':
                return 25.0;
                break;
            case 'Deutschland':
                return 19.0;
                break;
        }
    }
}
