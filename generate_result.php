<?php

include "admin/class/function.php";
$obj = new linkManagement();

if ( isset( $_GET['token'] ) ) {
    $tokenData = $obj->Verify( $_GET['token'] );
    if ( $tokenData == "Invalid Token" ) {
        echo "Invalid Token";
    } else {
        $result = $obj->generateResult( $tokenData['id'] );
        echo "<h2>Wheel Hems Info :</h2>";
        if ( $result != null ) {
            echo "<b>ID: </b>" . $result['id'] . "<br>";
            echo "<b>Whell Hems Name: </b>" . $result['name'] . "<br>";
            echo "<b>Wheel Hems Percentage: </b>" . $result['percent'];
        }
        echo "</br></br> <h2>Customer Info :</h2>";
        echo "<b>Customer ID: </b>" . $tokenData['customer_id'] . "<br>";
        echo "<b>Customer Name: </b>" . $tokenData['customer_name'];
    }

} else {
    echo "Please Privide a Token";
}