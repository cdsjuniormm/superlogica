<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Validator as AcmeAssert;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @AcmeAssert\ContainsCorrectLength(mode="loose", min=3, max=255)
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Assert\NotBlank
     * @AcmeAssert\ContainsCorrectLength(mode="loose", min=3, max=50)
     * @AcmeAssert\ContainsSpace(mode="loose")
     * @ORM\Column(type="string", length=255)
     */
    private $userName;

    /**
     * @Assert\NotBlank
     * @AcmeAssert\ContainsCorrectLength(mode="loose", min=9, max=9)
     * @AcmeAssert\ContainsCorrectFormatZipCode(mode="loose")
     * @ORM\Column(type="string", length=9)
     */
    private $zipCode;

    /**
     * @Assert\NotBlank
     * @AcmeAssert\ContainsCorrectLength(mode="loose", min=7, max=255)
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @Assert\NotBlank
     * @AcmeAssert\ContainsAlphanumeric(mode="loose")
     * @AcmeAssert\ContainsCorrectLength(mode="loose", min=8, max=255)
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
