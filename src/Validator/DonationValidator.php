<?php

namespace App\Validator;

use App\Entity\Donation;
use App\Storage\CharityLocalStorage;

class DonationValidator
{   
    private CharityLocalStorage $charityLocalStorage;

    public function __construct(CharityLocalStorage $charityLocalStorage)
    {
        $this->charityLocalStorage = $charityLocalStorage;
    }

    public function validate(Donation $donation): bool
    {
        if ($donation->getAmount() <= 0.0) {
            echo 'It is not a donation. Please donate some!';

            return false;
        }
        if (!$this->charityLocalStorage->doesExistsCharityId($donation->getCharityId())) {
            echo 'There is not ID like this!';

            return false;
        }
        
        return true;
    }
}