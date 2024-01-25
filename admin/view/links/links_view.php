<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
<style>
table.table-bordered.dataTable tbody th {
    border-bottom-width: 3px;
}

table.table-bordered.dataTable tbody td {
    border-bottom-width: 1px;
}

table.table-bordered.dataTable th,
table.table-bordered.dataTable td {
    border-left-width: 1px;
}
</style>
<?php

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

// Display Customer
$customer_info = $obj->display_customer_info();

?>
<!-- DELETE POP UP FORM (Bootstrap MODAL) -->
<?php include "./include/delete_modal.php";?>

<!-- Add customer  -->
<?php include "modal/add_customer.php";?>

<!-- Update customer  -->
<?php include "modal/update_customer.php";?>
<br>
<div class="card mb-4" style="border:3px solid #dee2e6;">
    <div class="card-header"
        style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
        <h4> <i class="fa fa-link mr-1"></i> Links</h4>
        <!-- <h6 style="color:red;"> -->
        <?php
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
        include './include/error_modal.php';
    }
}if ( isset( $update_mgs ) ) {
    if ( $update_mgs == "successful" ) {
        $s_mgs = "SUCCESSFULLY UPDATED";
        include './include/success_modal.php';

    } else {
        include './include/error_modal.php';
    }
}
?>
        <!-- </h6> -->

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
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">Link</th>
                        <th scope="col">Result</th>
                        <th scope="col">Action</th>
                </tfoot>
                <tbody>
                    <?php $count = 1;while ( $info = mysqli_fetch_assoc( $customer_info ) ) {?>

                    <tr>
                        <td style="display:none;">
                            <?php echo $info['id']; ?>
                        </td>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $info['customer_id']; ?></td>
                        <td class="text-left"><?php echo $info['customer_name']; ?></td>
                        <?php
$token = $obj->Sign( array( 'id' => $info['id'], 'customer_id' => $info['customer_id'], 'customer_name' => $info['customer_name'] ) );
    $token_parts = explode( '.', $token );
    ?>
                        <td style="display:none;">
                            <?php echo $token; ?>
                        </td>
                        <td class="text-left">
                            <?php

    echo ( str_split( $token_parts[2], 20 )[0] ) . "...";

    ?>


                        </td>

                        <td>
                            <?php
$whileId = $info["wheel_hems_id"];
    ( $whileId == 0 ) ? printf( "No" ) : printf( $obj->displayWheelHemsrById( $info["wheel_hems_id"] )['name'] );
    ?>
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
<!-- For DataTabe  -->
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
<!-- For DataTabe  -->

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


        navigator.clipboard.writeText('http://localhost/rabbi/FortuneWheelAdmin/game.php?token='+data[4]);

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