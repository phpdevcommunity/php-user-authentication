<?php

namespace Webby\Authentication\Core;

use Webby\Authentication\Token\UserToken;
use Webby\Authentication\Token\UserTokenInterface;
use Webby\Authentication\UserInterface;

/**
 * Class UserManager
 * @package Webby\Authentication\Core
 */
class UserManager implements UserManagerInterface
{

    use PasswordTrait;

    /**
     * @return null|UserTokenInterface
     */
    public function getUserToken(): ?UserTokenInterface
    {

        $userToken = null;
        if ($this->hasUserToken()) {
            $userToken = unserialize($_SESSION[UserTokenInterface::DEFAULT_PREFIX_KEY]);
        }

        return $userToken;
    }


    /**
     * @return bool
     */
    public function hasUserToken() :bool
    {
        $this->initSession();
        $key = UserTokenInterface::DEFAULT_PREFIX_KEY;
        return (array_key_exists($key, $_SESSION) && unserialize($_SESSION[$key]) !== false);
    }

    /***
     * @param array $roles
     * @return bool
     */
    public function isGranted(array $roles)
    {

        if (!is_null($userToken = $this->getUserToken())) {

            if ($userToken->getUser() instanceof UserInterface) {
                return (
                    !empty(array_intersect(
                        $roles,
                        $userToken->getUser()->getRoles()
                    ))
                );
            }

        }


        return false;
    }

    /**
     * @param UserInterface $user
     * @return UserTokenInterface
     */
    public function createUserToken(UserInterface $user): UserTokenInterface
    {
        $this->initSession();
        $userToken = new UserToken($user);
        $_SESSION[UserTokenInterface::DEFAULT_PREFIX_KEY] = $userToken->serialize();

        return $userToken;
    }


    /**
     * @return void
     */
    public function logout(): void
    {
        if ($this->hasUserToken()) {
            unset($_SESSION[UserTokenInterface::DEFAULT_PREFIX_KEY]);
        }

    }


    /**
     * @return void
     */
    private function initSession() :void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

}