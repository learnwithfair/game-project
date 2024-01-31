<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../../css/custom.css">
<style>
.table>:not(caption)>*>* {
    padding: .4rem .5rem;

}
</style>
<?php
###########################################################################
// CALLING FUNCTION AFTER CLICK SUBMIT BUTTON
###########################################################################
// Delete Customer
if ( isset( $_POST['deletedata'] ) ) {
    $dlt_id = $_POST['delete_id'];
    $dlt_mgs = $obj->delete_customer( $dlt_id );
}
// Add customer
if ( isset( $_POST['add-customer-btn'] ) ) {
    $add_mgs = $obj->addCustomer( $_POST );
}
// Update customer by id
if ( isset( $_POST['update-customer-btn'] ) ) {
    $update_mgs = $obj->updateCustomer( $_POST );
}

// send Email
if ( isset( $_POST['send-email-btn'] ) ) {
    echo $obj->sendEmail( $_POST );
}

###########################################################################
// DISPLAY PAGE DATA
###########################################################################
// Display Customer
$customer_info = $obj->display_customer_info();
###########################################################################
// IMPORT MODAL
###########################################################################

// <!-- ACTIVE POP UP FORM (Bootstrap MODAL) -->
include "./include/active_modal.php";
// <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
include "./include/delete_modal.php";

// <!-- Add customer  -->
include "modal/add_customer.php";

// <!-- Update customer  -->
include "modal/update_customer.php";

###########################################################################
// MODAL FOR RESPONSE
###########################################################################

if ( isset( $dlt_mgs ) ) {
    if ( $dlt_mgs == "successful" ) {
        $s_mgs = "SUCCESSFULLY DELETED";
        include './include/success_modal.php';

    } else {
        include './include/error_modal.php';
    }
}
if ( isset( $add_mgs ) ) {
    if ( $add_mgs == "successful" ) {
        $s_mgs = "SUCCESSFULLY ADDED";
        include './include/success_modal.php';

    } else {
        if ( $add_mgs != "unsuccessful" ) {
            echo "<h3 class='text-danger mt-2'>This customer is already exits!!</h3>";
        }
        include './include/error_modal.php';
    }
}if ( isset( $update_mgs ) ) {
    if ( $update_mgs == "successful" ) {
        $s_mgs = "SUCCESSFULLY UPDATED";
        include './include/success_modal.php';

    } else {
        if ( $update_mgs != "unsuccessful" ) {
            echo "<h3 class='text-danger mt-2'>This customer is already exits!!</h3>";
        }
        include './include/error_modal.php';
    }
}
###########################################################################
// HTML START
###########################################################################
?>
<br>
<div class="card mb-4" style="border:3px solid #dee2e6;">
    <div class="card-header"
        style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
        <h4> <i class="fa fa-link mr-1"></i> Links</h4>
        <!-- <a href="add_bulk" type="button" class="btn btn-info "
            style="margin-top: -35px;padding:8px 20px">
            Add Bulk
        </a> -->
        <button type="button" class="btn btn-info add-customer float-right" style="margin-top: -35px;padding:8px 20px">
            Add
        </button>
        <div></div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered vertical_align" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">S/N</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Created On</th>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">Link</th>
                        <th scope="col">Result</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">S/N</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Created On</th>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">Link</th>
                        <th scope="col">Result</th>
                        <th scope="col">Action</th>
                </tfoot>
                <tbody>
                    <?php
$count = 1;
while ( $info = mysqli_fetch_assoc( $customer_info ) ) {

    $whileId = $info["wheel_hems_id"];
    $token = $obj->Sign( array( 'customer_id' => $info['id'], 'wheel_hems_id' => $whileId ) );
    ?>
                    <tr>
                        <td style="display:none;">
                            <?php echo $info['id']; ?>
                        </td>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $info['customer_id']; ?></td>
                        <td class="text-left"><?php echo $info['customer_name']; ?></td>
                        <td>
                        <?php echo $info['created']; ?> 
                        </td>
                        <td style="display:none;"><?php echo $info['customer_email']; ?>
                        <td style="display:none;">
                            <?php echo substr( $token, 17 ); ?>
                        </td>
                        <td class="text-left">
                            <?php echo ( str_split( $token, 15 )[2] . "..." ); ?>
                        </td>
                        <td>
                            <?php ( $whileId == 0 ) ? printf( "No" ) : printf( $obj->displayWheelHemsrById( $info["wheel_hems_id"] )['name'] );?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm copybtn m-1"> <i class="fa fa-copy"></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm update-customer m-1"> <i
                                    class="fa fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm deletebtn m-1"> <i
                                    class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ########################################################################### -->
<!-- // FOOTER JS FOR DATATABLE -->
<!-- ########################################################################### -->
<!-- For DataTable  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        order: [
            [1, 'asc']
        ]
    });
});
</script>
<!-- For DataTable  -->
<!-- ########################################################################### -->
<!-- // FOR COPY TOKEN -->
<!-- ########################################################################### -->
<!-- For Copy  -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>

<script>
$(document).ready(function() {

    $('.copybtn').on('click', function() {

        // For copy clipboard
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        navigator.clipboard.writeText('http://localhost/rabbi/FortuneWheelAdmin/?token=' +
            data[
                6]);

        // For copied Toast
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            width: 150,
            height: 60,
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: false,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            title: 'Copied',
            background: '#D4EDDA',
        })
    });
});
</script>
<!-- /For Copy  -->