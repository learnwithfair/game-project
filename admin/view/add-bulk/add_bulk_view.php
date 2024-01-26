<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../../css/custom.css">

<?php

// Display Customer
$customer_info = $obj->display_customer_info();

// Modal For Success Response
if ( isset( $add_mgs ) ) {
    if ( $add_mgs == "successful" ) {
        $s_mgs = "SUCCESSFULLY ADDED";
        include './include/success_modal.php';
    } else {
        include './include/error_modal.php';
    }
}
?>

<br>
<div class="card mb-4" style="border:3px solid #dee2e6;">
    <div class="card-header"
        style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
        <h4> <i class="fa fa-link mr-1"></i> Links</h4>
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
                        <th scope="col">S/N</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Email</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Email</th>
                </tfoot>
                <tbody>
                    <?php $count = 1;while ( $info = mysqli_fetch_assoc( $customer_info ) ) {?>


                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
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