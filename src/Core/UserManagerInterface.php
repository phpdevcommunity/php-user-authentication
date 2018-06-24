<?php

namespace Webby\Authentication\Core;

use Webby\Authentication\Token\UserTokenInterface;
use Webby\Authentication\UserInterface;

interface UserManagerInterface {


    const MAX_PASSWORD_LENGTH = 72;

    /**
     * @return null|UserInterface
     */
    public function getUserToken() : ?UserTokenInterface;

    /**
     * @return bool
     */
    public function hasUserToken() : bool;

    /**
     * @param UserInterface $user
     * @return UserTokenInterface
     */
    public function createUserToken(UserInterface $user) : UserTokenInterface;

    /**
     * @return void
     */
    public function logout(): void;

    /**
     * @param string $plainPassword
     * @return string
     */
    public function cryptPassword(string $plainPassword) : string;

    /**
     * @param string $plainPassword
     * @param string $passwordEncoded
     * @return bool
     */
    public function isPasswordValid(string $plainPassword, string $passwordEncoded): bool;


}