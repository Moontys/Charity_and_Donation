<?php

namespace App\Entity;

class Charity
{
    private int $id;
    private string $name;
    private string $representativeEmail;

    public function __construct(
        int $id,
        string $name,
        string $representativeEmail
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->representativeEmail = $representativeEmail;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRepresentativeEmail(): string
    {
        return $this->representativeEmail;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setRepresentative($representativeEmail): void
    {
        $this->representativeEmail = $representativeEmail;
    }
}