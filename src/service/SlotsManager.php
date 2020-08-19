<?php
include(__DIR__. "/../models/Car.php");

class SlotsManager {
    private $slots = null;

    function createSlots($size) {
        if($this->slots != null) {
            print "Parking lot has created already. Please enter another command\n";
            return;
        }
        $this->slots = new SplFixedArray($size);
        print "Created a parking lot with {$size} slots\n";
    }

    function parkCar($registrationNum, $color) {
        $index = $this->getIndexToPark();
        if($index === null) {
            print "Sorry, parking lot is full\n";
            return;
        }
        $car = new Car($registrationNum, $color);
        $this->slots[$index] = $car;
        print "Allocated slot number: ";
        print $index + 1 . "\n";
    }

    private function getIndexToPark() {
        foreach ($this->slots as $index => $value) {
            if($value === null) {
                return $index;
            }
        }

        return null;
    }
}