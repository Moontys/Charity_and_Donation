<?php

namespace App\Entity;

class Donation
{
    private int $id;
    private string $donorName;
    private float $amount;
    private int $charityId;
    private \DateTimeImmutable $dateTime;

    public function __construct(
        int $id,
        string $donorName,
        float $amount,
        int $charityId,
        \DateTimeImmutable $dateTime
    ) {
        $this->id = $id;
        $this->donorName = $donorName;
        $this->amount = $amount;
        $this->charityId = $charityId;
        $this->dateTime = $dateTime;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDonorName(): string
    {
        return $this->donorName;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCharityId(): int
    {
        return $this->charityId;
    }

    public function getDateTime(): \DateTimeImmutable
    {
        return $this->dateTime;
    }
    
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setDonorName(string $donorName): void
    {
        $this->donorName = $donorName;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function setCharityId(int $charityId): void
    {
        $this->charityId = $charityId;
    }

    public function setDateTime(\DateTimeImmutable $dateTime): void
    {
        $this->dateTime = $dateTime;
    }
}
