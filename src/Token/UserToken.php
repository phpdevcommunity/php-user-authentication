<?php


namespace Webby\Authentication\Token;


use Webby\Authentication\UserInterface;

/**
 * Class UserToken
 * @package Webby\Authentication\Token
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


    /**
     * UserToken constructor.
     * @param UserInterface $user
     * @param string $providerKey
     */
    public function __construct(UserInterface $user, string $providerKey = self::DEFAULT_PROVIDER_KEY)
    {
        $this
            ->setUser($user)
            ->setProviderKey($providerKey);
    }

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }

    /**
     * @param UserInterface $user
     * @return UserToken
     */
    public function setUser(UserInterface $user): UserTokenInterface
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderKey(): string
    {
        return $this->providerKey;
    }

    /**
     * @param string $providerKey
     * @return UserToken
     */
    public function setProviderKey(string $providerKey): UserTokenInterface
    {
        $this->providerKey = $providerKey;
        return $this;
    }


    /**
     * @return string
     */
    public function serialize(): string
    {
        return serialize($this);
    }


}