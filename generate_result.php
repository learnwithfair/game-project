<?php

include "admin/class/function.php";
$obj = new linkManagement();

if ( isset( $_GET['token'] ) ) {
    $tokenData = $obj->Verify( $_GET['token'] );
    if ( $tokenData ) {
        $wheelHemsResult = $obj->generateResult( $tokenData['customer_id'] );
        echo "<h2>Wheel Hems Info :</h2>";
        if ( $wheelHemsResult != null ) {
            echo "<b>ID: </b>" . $wheelHemsResult['id'] . "<br>";
            echo "<b>Whell Hems Name: </b>" . $wheelHemsResult['name'] . "<br>";
            echo "<b>Wheel Hems Percentage: </b>" . $wheelHemsResult['percent'];

        }
        echo "</br></br> <h2>Customer Info :</h2>";
        $customerData = $obj->displayCustomerById( $tokenData['customer_id'] );
        if ( $customerData ) {
            print_r( $customerData );
        } else {
            echo "Not Found";
        }
    } else {
        echo "Invalid Token";
    }

}