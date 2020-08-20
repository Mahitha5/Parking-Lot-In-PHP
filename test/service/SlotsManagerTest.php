<?php
use PHPUnit\Framework\TestCase;

class SlotsManagerTest extends TestCase {
    public function testCreationOfSlotsWithTheGivenSize() {
        $slotManager = new SlotsManager();
        $slotManager->createSlots(6);
        $this->expectOutputString("Created a parking lot with 6 slots\n");
    }

    public function testNothingShouldCreateIfAlreadyExist() {
        $slotManager = new SlotsManager();

        $slotManager->createSlots(6);
        $this->assertEmpty($slotManager->createSlots(3));
        $this->expectOutputString("Created a parking lot with 6 slots\nParking lot has created already. Please enter another command\n");
    }

    public function testParkingCarIfSlotsAreFree() {
        $slotManager = new SlotsManager();

        $slotManager->createSlots(2);
        $slotManager->parkCar("KA-1", "White");
        $this->expectOutputString("Created a parking lot with 2 slots\nAllocated slot number: 1\n");
    }

    public function testShouldNotParkCarIfThereIsNoSpace() {
        $slotManager = new SlotsManager();

        $slotManager->createSlots(1);
        $slotManager->parkCar("KA-1", "White");
        $slotManager->parkCar("KA-2", "Red");
        $this->expectOutputString("Created a parking lot with 1 slots\nAllocated slot number: 1\nSorry, parking lot is full\n");
    }

    public function testShouldLeaveCarFromTheGivenIndex() {
        $slotManager = new SlotsManager();

        $slotManager->createSlots(1);
        $slotManager->parkCar("KA-1", "White");
        $slotManager->leaveCar(1);
        $this->expectOutputString("Created a parking lot with 1 slots\nAllocated slot number: 1\nSlot number 1 is free\n");
    }

    public function testShouldPrintValidMessageIfLeaveCarIsCalledWithEmptySlotIndex() {
        $slotManager = new SlotsManager();

        $slotManager->createSlots(1);
        $slotManager->leaveCar(1);
        $this->expectOutputString("Created a parking lot with 1 slots\nSlot number 1 is already empty\n");
    }

    public function testCanLeaveCarWithoutParkingLotHasCreated() {
        $slotManager = new SlotsManager();

        $slotManager->leaveCar(1);
        $this->expectOutputString("Parking has not created yet\n");
    }
}