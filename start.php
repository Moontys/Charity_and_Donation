<?php
    require 'vendor/autoload.php';

    use App\Storage\DonationLocalStorage;
    use App\Storage\CharityLocalStorage;
    use App\Application\CLIApplication;

    // echo "Are you sure you want to do this?  Type 'yes' to continue: ";
    // $handle = fopen ("php://stdin","r");
    // $line = fgets($handle);
    // if(trim($line) != 'yes'){
    //     echo "ABORTING!View charities";
    //     exit;
    // }
    // echo "\n";
    // echo "Thank you, continuing...\n";

    // 1. CLI Application object
    // 2. echo posible option (while loop)
    // 3. read input
    // 4. Call apllication methods

    $donationLocalStorage = new DonationLocalStorage();
    $charityLocalStorage  = new CharityLocalStorage();

    $cliApplication = new CLIApplication($donationLocalStorage, $charityLocalStorage);

    while(true) {
        echo "0: Exit\n";
        echo "1: View charities\n";
        echo "2: Add charity\n";
        echo "3: Edit charity\n";
        echo "4: Delete charity\n";
        echo "5: Add donation\n";

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
            $cliApplication->addCharity();
        }


        if ($inputValue === '3') {
            echo "Update Charity id";
            $line = fgets($handle);
            $inputValueForCharityId = trim($line);
            echo "Update Charity Name";
            $line = fgets($handle);
            $inputValueForCharityId = trim($line);
            echo "Update Charity Representative Email";
            $line = fgets($handle);
            $inputValueForCharityId = trim($line);
        }


        if ($inputValue === '4') {
            echo "Enter Charity id";
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
    }
