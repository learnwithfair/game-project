<?php

include "admin/class/function.php";
$obj = new linkManagement();

echo "<h2>Wheel Hems Active Items</h2>";
print_r( $obj->displayActiveWheelItems() );