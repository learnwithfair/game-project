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

/* Datatable select box  */
div.dataTables_wrapper div.dataTables_length select {
    width: 55px;
    display: inline-block;
}
</style>

<?php

// Update Activated Status
if ( isset( $_POST['activedata'] ) ) {
    $active_mgs = $obj->updateActiveStatus( $_POST['active_id'] );
}

// Update Wheel Hems  by id
if ( isset( $_POST['update-wheel-hems-btn'] ) ) {
    $update_mgs = $obj->updateWheelHemsInfo( $_POST );
}
// Update Wheel Hems Image by ID
if ( isset( $_POST['u-wheel-img-btn'] ) ) {
    $update_mgs = $obj->updateWheelHemsImg( $_POST );
}

$wheelHems_info = $obj->displayWheelHems();
?>

<!-- Update Wheel hems  -->
<?php include "modal/update_wheel_hems.php";?>

<!-- ACTIVE POP UP FORM (Bootstrap MODAL) -->
<?php include "./include/active_modal.php";?>
<br>
<div class="card mb-4" style="border:3px solid #dee2e6;">
    <div class="card-header"
        style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
        <h4> <i class="far fa-sun mr-1"></i> Wheel Items</h4>
        <!-- <h6 style="color:red;"> -->
        <?php
if ( isset( $active_mgs ) ) {
    if ( $active_mgs == "ACTIVATED" || $active_mgs == "DEACTIVATED" ) {
        $s_mgs = "SUCCESSFULLY " . $active_mgs;
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

        <button type="button" class="btn btn-info addbtn float-right" style="margin-top: -35px;padding:8px 20px"> Add
            Bulk
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
                        <th scope="col">Name</th>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">Image</th>
                        <th scope="col">Details</th>
                        <th scope="col">Percentage</th>
                        <th scope="col">Color Code</th>
                        <th scope="col">Multiplier</th>
                        <th scope="col">Stutas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">Image</th>
                        <th scope="col">Details</th>
                        <th scope="col">Percentage</th>
                        <th scope="col">Color Code</th>
                        <th scope="col">Multiplier</th>
                        <th scope="col">Stutas</th>
                        <th scope="col">Action</th>
                </tfoot>
                <tbody>
                    <?php $count = 1;while ( $info = mysqli_fetch_assoc( $wheelHems_info ) ) {?>

                    <tr style=<?php if ( $info['status'] == 0 ) {
    echo "opacity:.5";
}
    ?>>
                        <td style="display:none;">
                            <?php echo $info['id']; ?>
                        </td>
                        <td><?php echo $count++; ?></td>
                        <td class="text-left"><?php echo $info['name']; ?></td>
                        <td style="display:none;"><?php echo "./upload/wheel-img/" . $info['image']; ?></td>
                        <td>

                            <div class=<?php if ( $info['status'] != 0 ) {
        echo "change-img";
    }
    ?> style="z-index:1;cursor: pointer;">
                                <img src="./upload/wheel-img/<?php echo $info['image']; ?>" alt="Image Does not support"
                                    class="img-fluid img-thumbnail" style="width: 80px;height:80px; z-index: 1">
                                <div class="d-flex justify-content-end text-center">
                                    <img src="./assets/img/camera.png" style="
                                            width: 27px;
                                            height: 27px;
                                            z-index: 2;
                                            background-color:#D8DADF;
                                            padding:5px;
                                            border-radius:50%;
                                            margin-top:-2rem;
                                            " />
                                </div>
                            </div>

                            <?php include 'modal/wheel_img_edit.php';?>


                        </td>
                        <td class="text-justify"><?php echo $info['details']; ?></td>
                        <td><?php echo $info['percent']; ?>%</td>
                        <td><?php echo $info['color_code']; ?></td>
                        <td><?php echo $info['multiplier']; ?></td>
                        <td><?php ( $info['status'] == 0 ) ? printf( "<b class='text-danger'>Deactive</b>" ) : printf( "<b class='text-success'>Active</b>" );?>
                        </td>
                        <td>


                            <button type="button" class="btn btn-warning update-wheel-hems"
                                style="padding-right:40px;padding-left:40px;" <?php if ( $info['status'] == 0 ) {
        echo "disabled";
    }
    ?>>Edit</button>
                            <div></div><br>

                            <button type="button" class="btn btn-danger activebtn">
                                <?php ( $info['status'] == 0 ) ? printf( "Reactive" ) : printf( "Deactive" );?>
                            </button>

                        </td>

                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>