<?php

/*
 * This file is part of the HWIOAuthBundle package.
 *
 * (c) Hardware.Info <opensource@hardware.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HWI\Bundle\OAuthBundle\OAuth\ResourceOwner;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * StripeResourceOwner
 *
 * @author Gabriel Moreira <gabriel.moreira@fotomerchant.com>
 */
class StripeResourceOwner extends GenericOAuth2ResourceOwner
{
    /**
     * {@inheritDoc}
     */
    protected $paths = array(
        'identifier' => 'id',
        'realname' => 'display_name',
        'nickname' => 'display_name',
        'email' => 'email'
    );

    /**
     * {@inheritDoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'authorization_url' => 'https://connect.stripe.com/oauth/authorize',
            'access_token_url' => 'https://connect.stripe.com/oauth/token',
            'revoke_token_url' => 'https://connect.stripe.com/oauth/deauthorize',
            'infos_url' => 'https://api.stripe.com/v1/account',

            'user_response_class' => '\HWI\Bundle\OAuthBundle\OAuth\Response\StripeConnectUserResponse',

            'scope' => 'read_write'
        ));
    }
}
