<?php

namespace App\Stripe;

use Flosch\Bundle\StripeBundle\Stripe\StripeClient as BaseStripeClient;

class StripeClient extends BaseStripeClient {
    public function __construct($stripeApiKey = '')
    {
        parent::__construct($stripeApiKey);

        return $this;
    }
}
