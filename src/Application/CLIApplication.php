<?php

namespace App\Application;

use App\Storage\DonationLocalStorage;
use App\Storage\CharityLocalStorage;
use App\Entity\Donation;
use App\Entity\Charity;
use App\Validator\DonationValidator;
use App\Validator\CharityValidator;

class CLIApplication
{
    private DonationLocalStorage $donationLocalStorage;
    private CharityLocalStorage $charityLocalStorage;
    private DonationValidator $donationValidator;
    private CharityValidator $charityValidator;

    public function __construct(
        DonationLocalStorage $donationLocalStorage,
        CharityLocalStorage $charityLocalStorage,
        DonationValidator $donationValidator,
        CharityValidator $charityValidator
    ) {
        $this->donationLocalStorage = $donationLocalStorage;
        $this->charityLocalStorage = $charityLocalStorage;
        $this->donationValidator = $donationValidator;
        $this->charityValidator = $charityValidator;
    }

    public function viewCharities(): void
    {
        $charities = $this->charityLocalStorage->getAll();
        
        foreach ($charities as $charity) {
            echo "--- Start of Charity View ---\n";
            echo $charity->getId() . "\n";
            echo $charity->getName() . "\n";
            echo $charity->getRepresentativeEmail() . "\n";

            $allAmounts = 0;

            foreach($this->donationLocalStorage->getAllByCharityId($charity->getId()) as $donation) {
                
                $allAmounts  += $donation->getAmount();
            }
            echo $allAmounts . "\n";
            echo "--- End of Charity View ---\n";
        }
    }

    public function addCharity(string $charityName, string $charityRepresentativeEmail): void
    {
        $charity = new Charity($this->charityLocalStorage->getNextId(), $charityName, $charityRepresentativeEmail);

        if ($this->charityValidator->validate($charity) === true) {
            $this->charityLocalStorage->add($charity);
        }
    }

    public function editCharity(int $charityId, string $charityName, string $charityRepresentativeEmail): void
    {
        $charity = new Charity($charityId, $charityName, $charityRepresentativeEmail);

        if ($this->charityValidator->validate($charity, true) === true) {
            $this->charityLocalStorage->update($charity);
        }
    }

    public function deleteCharity(int $id): void
    {
        $this->charityLocalStorage->delete($id);
    }

    public function addDonation(string $donorName, float $amount, int $charityId)
    {
        $donation = new Donation($this->donationLocalStorage->getNextId(), $donorName,  $amount, $charityId, new \DateTimeImmutable());

        if ($this->donationValidator->validate($donation) === true) {
            $this->donationLocalStorage->add($donation);
        }
    }
}