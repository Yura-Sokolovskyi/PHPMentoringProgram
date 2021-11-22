<?php

namespace App\DatabasesBasics\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 **/
class User
{
    /**
     * @ORM\id @ORM\Column(type="integer") @ORM\GeneratedValue
     */
    protected int $id;
    /**
     * @ORM\Column(type="string")
     */
    protected string $firstName;
    /**
     * @ORM\Column(type="string")
     */
    protected string $lastName;
    /**
     * @ORM\Column(type="string")
     */
    protected string $email;
    /**
     * @ORM\Column(type="string")
     */
    protected string $phone;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param  string  $firstName
     * @return User
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param  string  $lastName
     * @return User
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param  string  $email
     * @return User
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param  string  $phone
     * @return User
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}
