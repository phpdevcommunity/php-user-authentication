<?php


namespace Test\Fad\Authentication;


use Fad\Authentication\UserInterface;

class User implements UserInterface
{

    /**
     * @var string
     */
    private $userName;

    /**
     * @var string
     */
    private $password;

    /**
     * @var array
     */
    private $roles = [];

    /**
     * @var bool
     */
    private $enabled = true;


    /**
     * @return null|string
     */
    public function getUsername(): ?string
    {
        return $this->userName;
    }

    /**
     * @return null|string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param string $userName
     * @return User
     */
    public function setUserName(string $userName): User
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param array $roles
     * @return User
     */
    public function setRoles(array $roles): User
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @param bool $enabled
     * @return User
     */
    public function setEnabled(bool $enabled): User
    {
        $this->enabled = $enabled;
        return $this;
    }


}