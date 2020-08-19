<?php
include "./inputHandler/InputHandler.php";
include "./service/SlotsManager.php";

class ParkingLot
{
    function run() {
        $slotsManager = new SlotsManager();
        $inputHandler = new InputHandler($slotsManager);
        print "Welcome\n";
        while(true) {
            $input = $inputHandler->getInput();
            if($input == "exit") {
                exit("Thank you");
            }
            $inputHandler->processInput($input);
        }
    }
}
