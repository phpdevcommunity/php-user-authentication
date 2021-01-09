<?php

namespace DevCoder\Authentication\Token;

use DevCoder\Authentication\UserInterface;

/**
 * Interface UserTokenInterface
 * @package DevCoder\Authentication\Token
 */
interface UserTokenInterface
{
    const DEFAULT_PREFIX_KEY = 'user_security';

    public function getUser(): UserInterface;

    public function serialize(): string;
}
