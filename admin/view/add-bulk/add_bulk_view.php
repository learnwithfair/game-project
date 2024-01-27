<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" /> -->
<!-- <link rel="stylesheet" href="../../css/custom.css"> -->

<?php

$status = 1;
$CSVvar = false;
###########################################################################
// CALLING FUNCTION AFTER CLICK SUBMIT BUTTON
###########################################################################

// Upload CSV File
if ( isset( $_POST['upload-csv-file'] ) ) {
    $csv_file_name = $obj->uploadCsvFile( $_POST );
    if ( $csv_file_name != null ) {
        $CSVvar = fopen( "./upload/csv-files/$csv_file_name", "r" );
    } else {

    }

}

// Save csv file's data into database
if ( isset( $_POST['csv-save-btn'] ) ) {
    $upload_mgs = $obj->saveCsvFilesData( $_POST );
}
// Delete unrecognize csv file
if ( isset( $_POST['csv-reset-btn'] ) ) {
    $obj->deleteCsvFile( $_POST['csv-save-name'] );
}

###########################################################################
// MODAL FOR RESPONSE
###########################################################################
// Modal For Success Response
if ( isset( $upload_mgs ) ) {
    if ( $upload_mgs == "successful" ) {
        $s_mgs = "SUCCESSFULLY ADDED";
        include './include/success_modal.php';
    } else {
        include './include/error_modal.php';
    }
}
// Function for check empty for CSV file
function checkEmpty( $data ) {
    if ( empty( $data ) ) {
        global $status;
        $status = 0;
        return "bg-danger";
    } else {
        return "";
    }

}
?>

<br>
<div class="card mb-4">
    <div class="card-header">
        <h4> <i class="fas fa-user-plus mr-1"></i> Add Bulk</h4>
        <div></div>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-sm-2 mt-2">
                            <label for="for-csv-file" class="text-bold">CSV File:</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="file" accept=".csv" class="form-control" id="fghf" name="csv-file" required />
                        </div>
                        <div class="col-sm-2 mt-1">
                            <button type="submit" class="btn btn-primary" name="upload-csv-file">Show</button>
                        </div>
                    </div>

                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
        <?php if ( $CSVvar ) {

    ?>
        <hr />

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
                    <?php $count = 0;while ( !feof( $CSVvar ) ) {
        $data = fgetcsv( $CSVvar, 1000, "," );
        if ( $count == 0 ) {
            $count++;
            continue;}
        if ( !empty( $data ) ) {
            ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td class=<?php echo checkEmpty( $data[0] ) ?>><?php echo $data[0]; ?></td>
                        <td class=<?php echo checkEmpty( $data[1] ) ?>> <?php echo $data[1] ?> </td>
                        <td class=<?php echo checkEmpty( $data[2] ) ?>> <?php echo $data[2]; ?> </td>
                    </tr>
                    <?php }}?>
                </tbody>
            </table>
        </div>
        <?php if ( $status == 0 ) {?>
        <div class="row">
            <h6 class="text-danger">Note: Unrecognized Field is obtained. Please solve these fields!!</h6>
        </div>
        <?php }?>
        <hr>
        <div style="margin:30px 0px;">
            <form action="" method="post">
                <div class="d-flex justify-content-end text-center">
                    <input type="hidden" name="csv-save-name" value="<?php echo $csv_file_name; ?>">
                    <button type="submit" name="csv-reset-btn" class="btn btn-danger mr-2 pl-4 pr-4">Reset</button>
                    <button type="submit" name="csv-save-btn" class="btn btn-info ml-2 pl-3 pr-3"
                        <?php if ( $status == 0 ) {echo "disabled";}?>>Upload</button>
                </div>

            </form>
        </div>
        <?php }?>
    </div>
</div>
<!-- For DataTable  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        order: [
            [0, 'asc']
        ]
    });
});
</script>
<!-- For DataTable  -->