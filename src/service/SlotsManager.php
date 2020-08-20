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

    function leaveCar($index) {
        if($this->slots === null) {
            print "Parking has not created yet\n";
        } else if($this->slots[$index - 1] !== null) {
            unset($this->slots[$index - 1]);
            print "Slot number {$index} is free\n";
        } else {
            print "Slot number {$index} is already empty\n";
        }
    }

    function status() {
        print "Slot No.\tRegistration No.\tColour\n";
        foreach ($this->slots as $index => $value) {
            print $index + 1 . "\t";
            if($value) {
                print $value->getRegistrationNumber();
            }
            print "\t";
            if($value) {
                print $value->getColor();
            }
            print "\n";
        }
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