<?php

namespace Uzbek\Svgate\Exceptions;

class CheckoutRequiredFields extends Exception
{
    public function checkoutRequiredFields(): CheckoutRequiredFields
    {
        return new CheckoutRequiredFields('Checkout required fields', -103);
    }
}
