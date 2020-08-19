<?php
include './ParkingLot.php';

$parkingLot = new ParkingLot();
call_user_func(array($parkingLot, "run"));
?>