<?php

namespace App\Validator;

use App\Entity\Charity;
use App\Storage\CharityLocalStorage;

class CharityValidator
{
    private CharityLocalStorage $charityLocalStorage;

    public function __construct(
        CharityLocalStorage $charityLocalStorage,
    ) {
        $this->charityLocalStorage = $charityLocalStorage;
    }

    public function validate(Charity $charity, bool $isUpdate = false): bool
    {
        if (!filter_var($charity->getRepresentativeEmail(), FILTER_VALIDATE_EMAIL)) {
            echo 'Email address ' . $charity->getRepresentativeEmail() . ' is not VALIDE!.\n';

            return false;
        }
        
        if ($isUpdate === true && !$this->charityLocalStorage->doesExistsCharityId($charity->getId())) {
            echo 'There is not Charity ID\n';

            return false;
        } 
        
        return true;
    }
}