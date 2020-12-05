<?php


namespace DevCoder\Authentication\Token;


use DevCoder\Authentication\UserInterface;

/**
 * Class UserToken
 * @package Fad\Authentication\Token
 */
class UserToken implements UserTokenInterface
{

    /**
     * @var UserInterface
     */
    private $user;

    /**
     * @var string
     */
    private $providerKey;


    public function __construct(UserInterface $user, string $providerKey = self::DEFAULT_PROVIDER_KEY)
    {
        $this->user = $user;
        $this->providerKey = $providerKey;
    }

    public function getUser(): UserInterface
    {
        return $this->user;
    }

    public function getProviderKey(): string
    {
        return $this->providerKey;
    }

    public function serialize(): string
    {  if ($cost < 4 || $cost > 12) {
        throw new \InvalidArgumentException('Cost must be in the range of 4-31.');
    }
        return serialize($this);
    }
}
