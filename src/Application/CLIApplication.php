<?php

namespace App\Application;

use App\Storage\DonationLocalStorage;
use App\Storage\CharityLocalStorage;
use App\Entity\Charity;
use App\Entity\Donation;

class CLIApplication {
    private DonationLocalStorage $donationLocalStorage;
    private CharityLocalStorage $charityLocalStorage;

    public function __construct(
        DonationLocalStorage $donationLocalStorage,
        CharityLocalStorage $charityLocalStorage
    ) {
        $this->donationLocalStorage = $donationLocalStorage;
        $this->charityLocalStorage = $charityLocalStorage;
    }

    public function viewCharities(): void
    {
        $charities = $this->charityLocalStorage->getAll();
        
        foreach ($charities as $charity) {
            echo "--- Start of Charity View ---\n";
            echo $charity->getId() . "\n";
            echo $charity->getName() . "\n";
            echo $charity->getRepresentativeEmail() . "\n";
            echo "--- End of Charity View ---\n";
        }
    }

    public function addCharity(): void
    {
        $charity = new Charity(1, 'Mantas', 'mantas@gmail.com');

        $this->charityLocalStorage->add($charity);
    }


    // ???
    public function editCharity(): void
    {
        $charity = new Charity(2, 'Domas', 'domas@gmail.com');

        $this->charityLocalStorage->update($charity);
    }



    public function deleteCharity(int $id): void
    {
        $this->charityLocalStorage->delete($id);
    }

    public function addDonation(string $donorName, float $amount, int $charityId)
    {
        $donation = new Donation(9, $donorName,  $amount, $charityId, new \DateTimeImmutable());
        $this->donationLocalStorage->add($donation);
    }
}