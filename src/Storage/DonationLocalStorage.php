<?php

namespace App\Storage;

use App\Entity\Donation;

class DonationLocalStorage {
    private array $data = [];    // "class property" or "class attribute"

    public function getAllByCharityId(int $charityId)  // View charities
    {
        $donationsByCharityId = [];

        foreach($this->data as $donation) {
            if ($donation->getCharityId() === $charityId) {
                $donationsByCharityId[] = $donation;
            }

        }

        return $donationsByCharityId;
    }

    public function add(Donation $donation): void
    {
        $this->data[] = $donation;
    }
     


}

// Pakurti DonationLocalStorage su metodais: 
// getAllByCharityId(int $charityId), deleteByCharityId(int $charityId), add - Why? 

// The application should have the following functionality:
// View charities
// Add charity
// Edit (Update) charity
// Delete charity
// Add donation