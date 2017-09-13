<?php

namespace HcsOmot\Webshop\Services;

use HcsOmot\Webshop\Entity\Customer;
use HcsOmot\Webshop\Entity\Order;

class VATCalculator
{
    /**
     * @var \HcsOmot\Webshop\Services\CountryVATLookup
     */
    private $countryVATLookup;

    public function __construct(CountryVATLookup $countryVATLookup)
    {
        $this->countryVATLookup = $countryVATLookup;
    }

    public function calculateVat(Order $order)
    {
        $orderAmount = $order->getOrderAmount();
        $customer    = $order->getCustomer();

        return ($orderAmount * $this->calculateVatRate($customer)) / 100;
    }

    private function calculateVatRate(Customer $customer)
    {
        $customerCountry = $customer->getCountry();

        if ($customerCountry->getCountryName() === 'Croatia') {
            return $this->countryVATLookup->getVATForCountry($customerCountry);
        }

        if (true === $customerCountry->isEU()) {
            if (true === $customer->isCorporation()) {
                return 0.0;
            }

            return $this->countryVATLookup->getVATForCountry($customerCountry);
        }

        return 0.0;
    }
}
