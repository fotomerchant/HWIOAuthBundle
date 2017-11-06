<?php

namespace HWI\Bundle\OAuthBundle\OAuth\ResourceOwner;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * PLICResourceOwner
 */
class PLICResourceOwner extends GenericOAuth2ResourceOwner
{
    /**
     * {@inheritDoc}
     */
    protected $paths = array(
        'identifier' => 'id',
        'nickname' => 'name',
        'realname' => 'name',
        'email' => 'email',
    );

    /**
     * {@inheritDoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'authorization_url' => 'https://plic.io/oauth/authorize',
            'access_token_url' => 'https://plic.io/oauth/token',
            'infos_url' => 'https://plic.io/api/users/me.json',

            'use_bearer_authorization' => true,
        ));
    }

    /**
     * {@inheritdoc}
     */
    protected function httpRequest($url, $content = null, $headers = array(), $method = null)
    {
        $headers['Accept'] = 'application/vnd.plic.io.v2+json';

        parent::httpRequest($url, $content, $headers, $method);
    }
}
