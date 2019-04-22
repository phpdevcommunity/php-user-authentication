<?php


namespace Fad\Authentication\Token;


use Fad\Authentication\UserInterface;

/**
 * Class UserToken
 * @package Fad\Authentication\Token
 */
interface UserTokenInterface
{

    const DEFAULT_PREFIX_KEY = 'user_security';
    const DEFAULT_PROVIDER_KEY = 'main';


    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface;

    /**
     * @param UserInterface $user
     * @return UserToken
     */
    public function setUser(UserInterface $user): UserTokenInterface;
    /**
     * @return string
     */
    public function getProviderKey(): string;

    /**
     * @param string $providerKey
     * @return UserToken
     */
    public function setProviderKey(string $providerKey): UserTokenInterface;

    /**
     * @return string
     */
    public function serialize(): string;

}