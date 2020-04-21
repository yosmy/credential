<?php

namespace Yosmy;

use JsonSerializable;

class Credential implements JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $prefix;

    /**
     * @var string
     */
    private $number;

    /**
     * @var string[]
     */
    private $roles;

    /**
     * @param string   $id
     * @param string   $token
     * @param string   $country
     * @param string   $prefix
     * @param string   $number
     * @param string[] $roles
     */
    public function __construct(
        string $id,
        string $token,
        string $country,
        string $prefix,
        string $number,
        array $roles
    ) {
        $this->id = $id;
        $this->token = $token;
        $this->country = $country;
        $this->prefix = $prefix;
        $this->number = $number;
        $this->roles = $roles;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'token' => $this->getToken(),
            'country' => $this->getCountry(),
            'prefix' => $this->getPrefix(),
            'number' => $this->getNumber(),
            'roles' => $this->getRoles(),
        ];
    }
}
