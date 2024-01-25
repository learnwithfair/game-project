<?php
$wheelHems_info = $obj->displayWheelHems();

// if ( isset( $_POST['deletedata'] ) ) {
//     $dlt_id = $_POST['delete_id'];
//     $dlt_mgs = $obj->subadmin_dlt( $dlt_id );
// }

?>
<!-- DELETE POP UP FORM (Bootstrap MODAL) -->
<?php include "./include/delete_modal.php";?>
<br>
<div class="card mb-4">
    <div class="card-header">
        <h4> <i class="far fa-sun mr-1"></i> Wheel Items</h4>
        <!-- <h6 style="color:red;"> -->
        <?php
// if ( isset( $dlt_mgs ) ) {
//     if ( $dlt_mgs == "successful" ) {
//         $s_mgs = "SUCCESSFULLY DELETED";
//         include './include/success_modal.php';

//     } else {
//         include './include/error_modal.php';
//     }
// }
?>
        <!-- </h6> -->

        <button type="button" class="btn btn-info addbtn float-right" style="margin-top: -20px;padding:8px 20px"> Add
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
                        <th scope="col">Image</th>
                        <th scope="col">Details</th>
                        <th scope="col">Percentage</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Details</th>
                        <th scope="col">Percentage</th>
                        <th scope="col">Action</th>
                </tfoot>
                <tbody>
                    <?php $count = 1;while ( $info = mysqli_fetch_assoc( $wheelHems_info ) ) {?>

                    <tr>
                        <td style="display:none;">
                            <?php echo $info['id']; ?>
                        </td>
                        <td><?php echo $count++; ?></td>
                        <td class="text-left"><?php echo $info['name']; ?></td>
                        <td><img src="./assets/img/<?php echo $info['image']; ?>" height="70px" width="70px"
                                alt="Not Found"></td>
                        <td class="text-justify"><?php echo $info['details']; ?></td>
                        <td><?php echo $info['percent']; ?>%</td>
                        <td>
                            <a href="admin_update.php?status=admin_update&&id=<?php echo $info['id']; ?>"
                                class="btn btn-warning" name="admin_update_btn"
                                style="text-transform: none;padding-right:20px;padding-left:20px;">Edit</a>
                            <div></div><br>
                            <button type="button" class="btn btn-danger deletebtn"> Delete </button>
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