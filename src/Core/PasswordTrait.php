<?php


namespace Fad\Authentication\Core;

/**
 * Trait PasswordTrait
 * @package Fad\Authentication\Core
 */
trait PasswordTrait {


    /**
     * @var int
     */
    private $cost = 10;

    /**
     * @param string $plainPassword
     * @return string
     */
    public function cryptPassword(string $plainPassword): string
    {
        return password_hash($plainPassword, PASSWORD_BCRYPT, ['cost' => $this->cost]);
    }

    /**
     * @param string $plainPassword
     * @param string $passwordEncoded
     * @return bool
     */
    public function isPasswordValid(string $plainPassword, string $passwordEncoded): bool
    {
        return password_verify($plainPassword, $passwordEncoded);
    }

    /**
     * @param int $cost
     * @return $this
     */
    public function setCost(int $cost)
    {
        if ($cost < 4 || $cost > 12) {
            throw new \InvalidArgumentException('Cost must be in the range of 4-31.');
        }
        $this->cost = $cost;

        return $this;
    }


}