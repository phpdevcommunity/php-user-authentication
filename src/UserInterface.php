<?php


namespace Webby\Authentication;

/**
 * Interface UserInterface
 * @package Webby\Authentication
 */
interface UserInterface
{

    /**
     * @return null|string
     */
    public function getUsername() :?string;

    /**
     * @return null|string
     */
    public function getPassword() :?string;

    /**
     * @return array
     */
    public function getRoles() : array;

    /**
     * @return bool
     */
    public function isEnabled(): bool;
}
