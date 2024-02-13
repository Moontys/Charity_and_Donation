<?php
// Define Donation class
class Donation {
    private $id;    // "class property" or "class attribute"
    private $donorName;    // "class property" or "class attribute"
    private $amount;    // "class property" or "class attribute"
    private $charityId;    // "class property" or "class attribute"
    private $dateTime;    // "class property" or "class attribute"

    // Constructor
    public function __construct($id, $donorName, $amount, $charityId, $dateTime) {  // Depednacy Injection
        $this->id = $id;
        $this->donorName = $donorName;
        $this->amount = $amount;
        $this->charityId = $charityId;
        $this->dateTime = $dateTime;
    }

    // Getters and setters
    // Implement as needed
}