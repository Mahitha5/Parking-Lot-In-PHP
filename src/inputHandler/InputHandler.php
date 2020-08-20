<?php
class InputHandler {
    private $slotsManager;

    function __construct($slotsManager) {
        $this->slotsManager = $slotsManager;
    }

    function getInput ()
    {
        return trim(fgets(STDIN));
    }

    function processInput($input) {
        $inputArray = explode(" ", $input);
        $command = $inputArray[0];
        if($command === "create_parking_lot") {
            $this->slotsManager->createSlots($inputArray[1]);
        } else if($command === "park") {
            $this->slotsManager->parkCar($inputArray[1], $inputArray[2]);
        } else if($command === "leave") {
            $this->slotsManager->leaveCar($inputArray[1]);
        }
    }
}
