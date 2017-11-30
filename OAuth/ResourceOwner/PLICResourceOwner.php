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
        'identifier' => 'user.id',
        'nickname' => 'user.name',
        'realname' => 'user.name',
        'email' => 'user.email',
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
            'infos_url' => 'https://plic.io/api/users/me',

            'use_bearer_authorization' => true,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getUserInformation(array $accessToken, array $extraParameters = array())
    {
        $extraParameters = [
            'include_licenses[active]' => true
        ];

        return parent::getUserInformation($accessToken, $extraParameters);
    }

    /**
     * {@inheritdoc}
     */
    protected function httpRequest($url, $content = null, $headers = array(), $method = null)
    {
        $headers['Accept'] = 'application/vnd.plic.io.v2+json';
        return parent::httpRequest($url, $content, $headers, $method);
    }
}
