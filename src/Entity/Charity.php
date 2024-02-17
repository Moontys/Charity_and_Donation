<?php

namespace App\Entity;

class Charity {
    private int $id;    // "class attribute" or "class property"
    private string $name;
    private string $representativeEmail;

    public function __construct(
        $id,
        $name,
        $representativeEmail
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->representativeEmail = $representativeEmail;
    }

    // Getters 
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

    // Setters
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