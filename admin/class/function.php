<?php
class linkManagement {
    private $conn;

    public function __CONSTRUCT() {
        $bdhost = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "link_management";
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

    // // Display Customer Info by ID
    // public function displayCustomerById( $id ) {
    //     $display_customer_query = "SELECT * FROM customer_info WHERE id=$id";
    //     $display_customer = mysqli_query( $this->conn, $display_customer_query );
    //     $display_customer_data = mysqli_fetch_array( $display_customer );
    //     if ( isset( $display_customer_data ) ) {
    //         return $display_customer_data;
    //     } else {
    //         return null;
    //     }
    // }

    // Add Customer Info
    public function addCustomer( $data ) {
        $customer_id = $data['customer-id'];
        $customer_name = $data['customer-name'];

        $add_customer_query = "INSERT INTO customer_info(customer_id,customer_name) VALUES('$customer_id','$customer_name')";
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
        $update_query = "UPDATE customer_info SET customer_id='$customer_id',customer_name='$customer_name' WHERE id=$id";
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
        $key = "JSONWEBTOKEN";
        // Header
        $headers = array( 'algo' => 'HS256', 'type' => 'JWT' );

        $headers_encoded = base64_encode( json_encode( $headers ) );

        $payload_encoded = base64_encode( json_encode( $payload ) );

        // Signature
        $signature = hash_hmac( 'SHA256', $headers_encoded . $payload_encoded, $key );
        $signature_encoded = base64_encode( $signature );

        // Token
        $token = $headers_encoded . '.' . $payload_encoded . '.' . $signature_encoded;

        return $token;
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
        $key = "JSONWEBTOKEN";
        // Break token parts
        $token_parts = explode( '.', $token );
        if ( count( $token_parts ) > 1 ) {
// Verigy Signature
            $signature = base64_encode( hash_hmac( 'SHA256', $token_parts[0] . $token_parts[1], $key ) );
            if ( $signature != $token_parts[2] ) {
                return "Invalid Token";

            }

// Decode headers & payload
            $headers = json_decode( base64_decode( $token_parts[0] ), true );
            $payload = json_decode( base64_decode( $token_parts[1] ), true );

// If token successfully verified
            return $payload;
        } else {
            return "Invalid Token";
        }

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
    // Display  Wheel Hems Info Info by Name
    public function displayWheelHemsrByName( $name ) {
        $display_wheel_hems_query = "SELECT * FROM wheel_hems_info WHERE name='$name'";
        $display_wheel_hems = mysqli_query( $this->conn, $display_wheel_hems_query );
        $display_wheel_hems_data = mysqli_fetch_array( $display_wheel_hems );
        if ( isset( $display_wheel_hems_data ) ) {
            return $display_wheel_hems_data;
        } else {
            return null;
        }
    }
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
    public function updateCustomerResultbyId( $id, $wheelHemsName ) {
        $update_query = "UPDATE customer_info SET wheel_hems_name='$wheelHemsName' WHERE id=$id";
        $return_update_mgs = mysqli_query( $this->conn, $update_query );
        if ( $return_update_mgs ) {
            return true;
        } else {
            return false;
        }

    }

// echo "Selected Item: $selectedItem\n";

    public function generateResult( $id ) {

        $wheelHems_info = $this->displayWheelHems();
        $items = array();
        while ( $info = mysqli_fetch_assoc( $wheelHems_info ) ) {
            $items[$info['name']] = $info['percent'];
        }
        $weelHemsName = $this->getRandomItem( $items );
        $updateResult = $this->updateCustomerResultbyId( $id, $weelHemsName );
        if ( $updateResult ) {
            return $this->displayWheelHemsrByName( $weelHemsName );
        } else {
            return null;
        }

    }

###########################################################################################
//                                      /GENERATE RESULT
###########################################################################################

}