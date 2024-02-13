<?php
class Charity {
    private $id;    // "class property" or "class attribute"
    private $name;  // "class property" or "class attribute"
    private $representativeEmail;   // "class property" or "class attribute"

    // Constructor
    public function __construct($id, $name, $representativeEmail) {  // Depednacy Injection
        $this->id = $id;
        $this->name = $name;
        $this->representativeEmail = $representativeEmail;
    }

    // Getters and setters
    // Implement as needed
}