<?php
use PHPUnit\Framework\TestCase;

class InputHandlerTest extends TestCase
{
    public function testCallToCreateSlotsIfTheInputHasCreate_Parking_Lot() {
        $slotManagerMock = $this->getMockBuilder('SlotsManager')->getMock('createSlots');
        $inputHandler = new InputHandler($slotManagerMock);

        $slotManagerMock->expects($this->once())
            ->method('createSlots');
        $inputHandler->processInput("create_parking_lot 2");
    }

    public function testCallToParkCarIfTheInputHasPark() {
        $slotManagerMock = $this->getMockBuilder('SlotsManager')->getMock('parkCar');
        $inputHandler = new InputHandler($slotManagerMock);

        $slotManagerMock->expects($this->once())
            ->method('parkCar');
        $inputHandler->processInput("park KA-1 White");
    }

    public function testCallToLeaveCarIfTheInputHasLeave() {
        $slotManagerMock = $this->getMockBuilder('SlotsManager')->getMock('leaveCar');
        $inputHandler = new InputHandler($slotManagerMock);

        $slotManagerMock->expects($this->once())->method('leaveCar');
        $inputHandler->processInput("leave 2");
    }

    public function testCallToStatusIfTheInputHasStatus() {
        $slotManagerMock = $this->getMockBuilder('SlotsManager')->getMock('status');
        $inputHandler = new InputHandler($slotManagerMock);

        $slotManagerMock->expects($this->once())->method('status');
        $inputHandler->processInput("status");
    }
}