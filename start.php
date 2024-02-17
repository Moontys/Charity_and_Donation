<?php

require 'vendor/autoload.php';

use App\Storage\DonationLocalStorage;
use App\Storage\CharityLocalStorage;
use App\Validator\DonationValidator;
use App\Validator\CharityValidator;
use App\Application\CLIApplication;

$donationLocalStorage = new DonationLocalStorage();
$charityLocalStorage  = new CharityLocalStorage();
$donationValidator = new DonationValidator($charityLocalStorage);
$charityValidator = new CharityValidator($charityLocalStorage);

$cliApplication = new CLIApplication($donationLocalStorage, $charityLocalStorage, $donationValidator, $charityValidator);

while(true) {
    echo "0: Exit\n";
    echo "1: View charities\n";
    echo "2: Add charity\n";
    echo "3: Edit charity\n";
    echo "4: Delete charity\n";
    echo "5: Add donation\n";
    echo "6: Import Charities from CSV file\n";

    $handle = fopen ("php://stdin","r");
    $line = fgets($handle);
    $inputValue = trim($line);
    
    if ($inputValue === '0') {
        echo "Exiting Application";
        break;
    }

    if ($inputValue === '1') {
        $cliApplication->viewCharities();
    }

    if ($inputValue === '2') {
        echo "Enter Charity Name:\n";
        $line = fgets($handle);
        $inputValueForCharityName = trim($line);
        echo "Enter Charity Representative Email:\n";
        $line = fgets($handle);
        $inputValueForRepresentativeEmail = trim($line);
        $cliApplication->addCharity($inputValueForCharityName, $inputValueForRepresentativeEmail);
    }

    if ($inputValue === '3') {
        echo "update! Charity id:\n";
        $line = fgets($handle);
        $inputValueForCharityId = trim($line);
        echo "update! Charity Name:\n";
        $line = fgets($handle);
        $inputValueForCharityName = trim($line);
        echo "update! Charity Representative Email:\n";
        $line = fgets($handle);
        $inputValueForCharityRepresentativeEmail = trim($line);
        $cliApplication->editCharity($inputValueForCharityId, $inputValueForCharityName, $inputValueForCharityRepresentativeEmail);
    }

    if ($inputValue === '4') {
        echo "enter! Charity id:\n";
        $line = fgets($handle);
        $inputValueForCharityId = trim($line);
        $cliApplication->deleteCharity($inputValueForCharityId);
    }

    if ($inputValue === '5') {
        echo "Enter Charity id\n";
        $line = fgets($handle);
        $inputValueForCharityId = trim($line);
        echo "Enter Donor Name id\n";
        $line = fgets($handle);
        $inputValueDonorName = trim($line);
        echo "Enter Amount\n";
        $line = fgets($handle);
        $inputValueAmount = trim($line);
        $cliApplication->addDonation($inputValueDonorName, $inputValueAmount, $inputValueForCharityId);
    }
    
    if ($inputValue === '6') {
        echo "Enter file Location\n";
        $line = fgets($handle);
        $inputValueCSVlocation = trim($line);
        if (($CSVHandle = fopen($inputValueCSVlocation, "r")) !== false) {
            while (($data = fgetcsv($CSVHandle, 1000, ",")) !== false) {
                $cliApplication->addCharity($data[0], $data[1]);
            }
            fclose($CSVHandle);
        }
    }
}
