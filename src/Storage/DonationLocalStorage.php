<?php

namespace App\Storage;

use App\Entity\Donation;

class DonationLocalStorage
{
    private array $data = [];

    public function getAllByCharityId(int $charityId): array
    {
        $donationsByCharityId = [];

        foreach ($this->data as $donation) {
            if ($donation->getCharityId() === $charityId) {
                $donationsByCharityId[] = $donation;
            }
        }

        return $donationsByCharityId;
    }

    public function getNextId(): int
    {
        $totalNumberIrArray = count($this->data) + 1;

        return $totalNumberIrArray;
    }

    public function add(Donation $donation): void
    {
            if ($this->data < 0.1) {
                $donationsByCharityId[] = $donation;
            }

        $this->data[] = $donation;
    }
}