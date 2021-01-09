<?php

namespace DevCoder\Authentication\Core;

use DevCoder\Authentication\Token\UserTokenInterface;
use DevCoder\Authentication\UserInterface;

interface UserManagerInterface
{
    public function getUserToken(): ?UserTokenInterface;

    public function hasUserToken(): bool;

    public function createUserToken(UserInterface $user): UserTokenInterface;

    public function logout(): void;

    public function cryptPassword(string $plainPassword): string;

    public function isPasswordValid(UserInterface $user, string $plainPassword): bool;
}
