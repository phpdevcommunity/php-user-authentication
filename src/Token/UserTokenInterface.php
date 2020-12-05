<?php


namespace DevCoder\Authentication\Token;


use DevCoder\Authentication\UserInterface;

/**
 * Class UserToken
 * @package Fad\Authentication\Token
 */
interface UserTokenInterface
{
    const DEFAULT_PREFIX_KEY = 'user_security';
    const DEFAULT_PROVIDER_KEY = 'main';

    public function getUser(): UserInterface;

    public function getProviderKey(): string;

    public function serialize(): string;
}
