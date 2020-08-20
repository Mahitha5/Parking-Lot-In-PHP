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
}