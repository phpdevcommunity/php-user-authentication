<?php


namespace DevCoder\Authentication\Token;


use DevCoder\Authentication\UserInterface;

/**
 * Class UserToken
 * @package DevCoder\Authentication\Token
 */
class UserToken implements UserTokenInterface
{
    /**
     * @var UserInterface
     */
    private $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function getUser(): UserInterface
    {
        return $this->user;
    }

    public function serialize(): string
    {
        return serialize($this);
    }
}
