<?php
class linkManagement {
    private $conn;

    public function __CONSTRUCT() {
        $bdhost = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "rabbi_fortunewheeladmin";
        $this->conn = mysqli_connect( $bdhost, $dbuser, $dbpassword, $dbname );

        if ( !( $this->conn ) ) {
            die( "Database connection Error!!" );
        }
    }
###########################################################################################
//                                      AUTH
###########################################################################################
    // Checking Login Info
    public function getAdminData( $data ) {
        $admin_check = 0;
        $email = $data['admin_email'];
        $password = md5( $data['admin_password'] );
        $get_query = "SELECT * FROM admin_info";
        $all_admin_info = mysqli_query( $this->conn, $get_query );
        // checking query admin table
        while ( $match_data = mysqli_fetch_assoc( $all_admin_info ) ) {
            if ( $email == $match_data['admin_email'] && $password == $match_data['admin_password'] ) {
                $admin_check = 1;
                $_SESSION['admin_id'] = $match_data['admin_id'];
                $_SESSION['admin_name'] = $match_data['admin_name'];
                $_SESSION['admin_img'] = $match_data['admin_img'];
                header( "location:template" );
                break;
            }
        }
        if ( $admin_check == 0 ) {
            return "unsuccesfull";
            // echo "<script>alert('Email or Password is incorrect!!')</script>";
        }
    }

    // Logout Section
    public function logout_info() {
        unset( $_SESSION['admin_id'] );
        unset( $_SESSION['admin_name'] );
        unset( $_SESSION['admin_img'] );
        header( "location: index" );
    }
###########################################################################################
//                                      /AUTH
###########################################################################################

###########################################################################################
//                                      PUBLIC
###########################################################################################
// Display All Info
    public function findAll( $tableName ) {
        $display_query = "SELECT * FROM '$tableName' ORDER BY id ASC";
        $queryData = mysqli_query( $this->conn, $display_query );
        if ( isset( $queryData ) ) {
            return $queryData;
        } else {
            return null;
        }
    }
// Display Info By ID
    public function findById( $tableName, $id ) {

        $display_query = "SELECT * FROM '$tableName' WHERE id=$id";
        $queryData = mysqli_query( $this->conn, $display_query );
        if ( isset( $queryData ) ) {
            return $queryData;
        } else {
            return null;
        }
    }

###########################################################################################
//                                      PUBLIC
###########################################################################################

###########################################################################################
//                                      CUSTOMER
###########################################################################################
    // Display Customer Info
    public function display_customer_info() {
        $display_customer_query = "SELECT * FROM customer_info ORDER BY id ASC";
        $display_customer = mysqli_query( $this->conn, $display_customer_query );
        if ( isset( $display_customer ) ) {
            return $display_customer;
        }
    }

    // Display Customer Info by ID
    public function displayCustomerById( $id ) {
        $display_customer_query = "SELECT * FROM customer_info WHERE id=$id";
        $display_customer = mysqli_query( $this->conn, $display_customer_query );
        $display_customer_data = mysqli_fetch_array( $display_customer );
        if ( isset( $display_customer_data ) ) {
            return $display_customer_data;
        } else {
            return null;
        }
    }

    // Add Customer Info
    public function addCustomer( $data ) {
        $customer_id = $data['customer-id'];
        $customer_name = $data['customer-name'];
        $customer_email = $data['customer-email'];

        $add_customer_query = "INSERT INTO customer_info(customer_id,customer_name,customer_email) VALUES('$customer_id','$customer_name','$customer_email')";
        $return_mgs = mysqli_query( $this->conn, $add_customer_query );
        if ( $return_mgs ) {
            return "successful";
        } else {
            return "unsuccessful";
        }

    }

    // Update Customer
    public function updateCustomer( $data ) {
        $id = $data['update-id'];
        $customer_id = $data['u-customer-id'];
        $customer_name = $data['u-customer-name'];
        $customer_email = $data['u-customer-email'];
        $update_query = "UPDATE customer_info SET customer_id='$customer_id',customer_name='$customer_name',customer_email='$customer_email' WHERE id=$id";
        $return_update_mgs = mysqli_query( $this->conn, $update_query );
        if ( $return_update_mgs ) {
            return "successful";
        } else {
            return "unsuccessful";
        }

    }

    // Delete Customer by ID
    public function delete_customer( $id ) {
        $delete_customer_query = "DELETE FROM customer_info WHERE id=$id";
        $delete_customer = mysqli_query( $this->conn, $delete_customer_query );
        if ( isset( $delete_customer ) ) {
            return "successful";
        } else {
            return "unsuccessful";
        }
    }

###########################################################################################
//                                      /CUSTOMER
###########################################################################################

###########################################################################################
//                                      /TOKEN
###########################################################################################

    /**
     * Sign - Static method to generate token
     *
     * @param array $payload
     * @param string $key - The signature key
     * @param int $expire - (optional) Max age of token in seconds. Leave it blank for no expiration.
     *
     * @return string token
     */
    static function Sign( $payload ) {
        $payload_encoded = base64_encode( json_encode( $payload ) );
        return $payload_encoded;
    }

    /**
     * Verify - Static method verify token
     *
     * @param string $token
     * @param string $key - The signature key
     *
     * @return boolean false if token is invalid or expired
     * @return array payload
     */
    static function Verify( $token ) {
        $payload = json_decode( base64_decode( "eyJjdXN0b21lcl9pZ" . $token ), true );
        return $payload;
    }

###########################################################################################
//                                      /TOKEN
###########################################################################################

###########################################################################################
//                                      WHEEL HEMS
###########################################################################################

// Display Wheel Hems Info
    public function displayWheelHems() {
        $display_WheelHems_query = "SELECT * FROM wheel_hems_info ORDER BY id ASC";
        $display_WheelHems = mysqli_query( $this->conn, $display_WheelHems_query );
        if ( isset( $display_WheelHems ) ) {
            return $display_WheelHems;
        }
    }
    // Display Active Wheel Hems Info
    public function displayActiveWheelItems() {
        $json_array = array();

        $display_WheelHems_query = "SELECT * FROM wheel_hems_info WHERE status=1 ORDER BY id ASC";
        $display_WheelHems = mysqli_query( $this->conn, $display_WheelHems_query );

        if ( isset( $display_WheelHems ) ) {
            while ( $row = mysqli_fetch_assoc( $display_WheelHems ) ) {
                $json_array[] = $row;
            }
        }
        if ( isset( $json_array ) ) {
            return json_encode( $json_array );
        } else {
            return null;
        }

    }
    // Display  Wheel Hems Info by ID
    public function displayWheelHemsrById( $id ) {
        $display_wheel_hems_query = "SELECT * FROM wheel_hems_info WHERE id=$id";
        $display_wheel_hems = mysqli_query( $this->conn, $display_wheel_hems_query );
        $display_wheel_hems_data = mysqli_fetch_array( $display_wheel_hems );
        if ( isset( $display_wheel_hems_data ) ) {
            return $display_wheel_hems_data;
        } else {
            return null;
        }
    }
    // Update  Wheel Hems active status by ID
    public function updateActiveStatus( $id ) {
        $u_status = 0;
        $u_mgs = "DEACTIVATED";

        $display_wheel_hems_query = "SELECT status FROM wheel_hems_info WHERE id=$id";
        $display_wheel_hems = mysqli_query( $this->conn, $display_wheel_hems_query );
        $display_wheel_hems_status = mysqli_fetch_array( $display_wheel_hems );

        if ( $display_wheel_hems_status['status'] == 0 ) {
            $u_status = 1;
            $u_mgs = "ACTIVATED";
        }

        $update_query = "UPDATE wheel_hems_info SET status=$u_status WHERE id=$id";
        $return_update_mgs = mysqli_query( $this->conn, $update_query );

        if ( isset( $return_update_mgs ) ) {
            return $u_mgs;
        } else {
            return null;
        }
    }
    // Update  Wheel Hems Info
    public function updateWheelHemsInfo( $data ) {
        $id = $data['update-id'];
        $name = $data['u-wheel-hems-name'];
        $details = $data['u-wheel-hems-details'];
        $percent = $data['u-wheel-hems-percent'];
        $color_code = $data['u-wheel-hems-color-code'];
        $multiplier = $data['u-wheel-hems-multiplier'];

        $update_query = "UPDATE wheel_hems_info SET name='$name', details='$details', percent=$percent, color_code='$color_code', multiplier=$multiplier WHERE id=$id";
        $return_update_mgs = mysqli_query( $this->conn, $update_query );

        if ( isset( $return_update_mgs ) ) {
            return "successful";
        } else {
            return null;
        }
    }
    // // CountWheelHemsrByName by ID
    // public function countWheelHemsrByName( $name ) {

    //     $display_wheel_hems_query = "SELECT * FROM wheel_hems_info WHERE name='$name'";
    //     $wheel_hems = mysqli_query( $this->conn, $display_wheel_hems_query );
    //     $wheel_hems_count = mysqli_num_rows( $wheel_hems );
    //     if ( isset( $wheel_hems_count ) ) {
    //         return $wheel_hems_count;
    //     } else {
    //         return 1;
    //     }
    // }
###########################################################################################
//                                      /WHEEL HEMS
###########################################################################################

###########################################################################################
//                                      GENERATE RESULT
###########################################################################################
    function getRandomItem( array $items ) {
        // Calculate total probability
        $totalProbability = array_sum( $items );

        // Generate a random number between 0 and the total probability
        $randomNumber = mt_rand( 0, $totalProbability );

        // Iterate through the items and find the selected item
        $currentProbability = 0;
        foreach ( $items as $item => $probability ) {
            $currentProbability += $probability;
            if ( $randomNumber <= $currentProbability ) {
                return $item;
            }
        }

        // In case of an issue, return null
        return null;
    }
// Update customer Result by ID
    public function updateCustomerResultbyId( $id, $wheelHemsId ) {
        $update_query = "UPDATE customer_info SET wheel_hems_id=$wheelHemsId WHERE id=$id";
        $return_update_mgs = mysqli_query( $this->conn, $update_query );
        if ( $return_update_mgs ) {
            return true;
        } else {
            return false;
        }

    }

// echo "Selected Item: $selectedItem\n";

    public function generateResult( $id ) {

        $wheelHems_info = json_decode( $this->displayActiveWheelItems() );
        $items = array();

        foreach ( $wheelHems_info as $info ) {
            $items[$info->id] = $info->percent;
        }
        $weelHemsId = $this->getRandomItem( $items );
        $updateResult = $this->updateCustomerResultbyId( $id, $weelHemsId );
        if ( $updateResult ) {
            return $this->displayWheelHemsrById( $weelHemsId );
        } else {
            return null;
        }

    }

###########################################################################################
//                                      /GENERATE RESULT
###########################################################################################

}