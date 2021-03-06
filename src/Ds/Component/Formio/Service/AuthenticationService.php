<?php

namespace Ds\Component\Formio\Service;

use Ds\Component\Formio\Model\User;

/**
 * Class AuthenticationService
 *
 * @package Ds\Component\Formio
 */
class AuthenticationService extends AbstractService
{
    /**
     * @const
     */
    const RESOURCE_LOGIN = '/user/login';
    const RESOURCE_LOGOUT = '/logout';

    /**
     * Login
     *
     * @param \Ds\Component\Formio\Model\User $user
     * @return string
     */
    public function login(User $user)
    {
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'data' => [
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword()
                ]
            ]
        ];
        $token = $this->execute('POST', static::RESOURCE_LOGIN, $options);

        return $token;
    }

    /**
     * Logout
     */
    public function logout()
    {
        $this->execute('GET', static::RESOURCE_LOGOUT);
    }
}
