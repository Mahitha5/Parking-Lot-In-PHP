<?php
class Car {
    private $registrationNumber;
    private $color;

    function __construct($registrationNumber, $color)
    {
        $this->registrationNumber = $registrationNumber;
        $this->color = $color;
    }

    public function getRegistrationNumber()
    {
        return $this->registrationNumber;
    }

    public function getColor()
    {
        return $this->color;
    }
}