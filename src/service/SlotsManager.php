<?php
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
}