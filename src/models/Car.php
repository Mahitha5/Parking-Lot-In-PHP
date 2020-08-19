<?php
class Car {
    private $registrationNumber;
    private $color;

    function __construct($registrationNumber, $color)
    {
        $this->registrationNumber = $registrationNumber;
        $this->color = $color;
    }
}