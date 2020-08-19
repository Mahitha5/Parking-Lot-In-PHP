<?php
class ParkingLot
{
    private $slots = null;

    function run() {
        print "Welcome\n";
        while(true) {
            $input = $this->getInput();
            if($input == "exit") {
                exit("Thank you");
            }
            $this->processInput($input);
        }
    }

    function getInput ()
    {
        return trim(fgets(STDIN));
    }

    function processInput($input) {
        $inputArray = explode(" ", $input);
        if($inputArray[0] == "create_parking_lot") {
            if($this->slots != null) {
                print "Parking lot has created already. Please enter another command\n";
                return;
            }
            $this->slots = $this->createSlots($inputArray[1]);
            print "Created a parking lot with {$inputArray[1]} slots\n";
        }
    }

    function createSlots($size) {
        return new SplFixedArray($size);
    }
}
