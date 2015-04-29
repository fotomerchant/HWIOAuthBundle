<?php

/*
 * This file is part of the HWIOAuthBundle package.
 *
 * (c) Hardware.Info <opensource@hardware.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HWI\Bundle\OAuthBundle\OAuth\Response;

/**
 * StripeConnectUserResponse
 *
 * @author Gabriel Moreira <gabriel.moreira@fotomerchant.com>
 */
class StripeConnectUserResponse extends PathUserResponse
{
    /**
     * @return string The Stripe Publishable Key that is required for Stripe Payments
     */
    public function getPublishableKey() {
        $rawToken = $this->oAuthToken->getRawToken();

        if (isset($rawToken['stripe_publishable_key'])) {
            return $rawToken['stripe_publishable_key'];
        }

        return null;
    }
}
