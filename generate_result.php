<?php
header('Content-Type: application/json');

include "admin/class/function.php";
$obj = new linkManagement();

if ( isset( $_GET['token'] ) ) {
    $tokenData = $obj->Verify( $_GET['token'] );
    if ( $tokenData ) {
        $wheelHemsResult = $obj->generateResult( $tokenData['customer_id'] );
        if ( $wheelHemsResult != null ) {
            $jsonResponse = json_encode($wheelHemsResult);
            echo $jsonResponse;
        }
    } else {
        $error['msg'] = "Invalid Token";
        echo json_encode($error);
    }

}