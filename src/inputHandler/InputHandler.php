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
        if($inputArray[0] == "create_parking_lot") {
            $this->slotsManager->createSlots($inputArray[1]);
        }
    }
}
