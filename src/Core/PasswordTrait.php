<?php


namespace DevCoder\Authentication\Core;

use DevCoder\Authentication\UserInterface;

/**
 * Trait PasswordTrait
 * @package DevCoder\Authentication\Core
 */
trait PasswordTrait
{
    private $cost = 10;

    public function cryptPassword(string $plainPassword): string
    {
        return password_hash($plainPassword, PASSWORD_BCRYPT, ['cost' => $this->cost]);
    }

    public function isPasswordValid(UserInterface $user, string $plainPassword): bool
    {
        return password_verify($plainPassword, $user->getPassword());
    }

    public function setCost(int $cost): void
    {
        if ($cost < 4 || $cost > 12) {
            throw new \InvalidArgumentException('Cost must be in the range of 4-31.');
        }
        $this->cost = $cost;
    }
}
