<?php

include "admin/class/function.php";
$obj = new linkManagement();

if ( isset( $_GET['token'] ) ) {
    $tokenData = $obj->Verify( $_GET['token'] );
    if ( $tokenData == "Invalid Token" ) {
        echo "Invalid Token";
    } else {
        echo "<b>Customer ID: </b>" . $tokenData['customer_id'] . "<br>";
        echo "<b>Customer Name: </b>" . $tokenData['customer_name'];
    }
    // echo $tokenData;

}