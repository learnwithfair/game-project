<!-- Small modal -->
<style>
.modal_icon {

    text-align: center;
    padding: 25px;
    width: 100%;
}
</style>


<div class="modal fade bd-example-modal-md" id="update-customer" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content modal_icon">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-title" id="exampleModalLongTitle">
                    <h3>update Customer</h3>
                    <hr>
                    <br>
                    <div></div>
                    <input type="hidden" name="update-id" id="update-id">
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" id="u-customer-id" name="u-customer-id"
                            placeholder="Enter Customer ID" required />
                        <label for="u-customer-id" class="form-label">Customer ID</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide customer ID</div>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" id="u-customer-name" name="u-customer-name"
                            placeholder="Enter Customer Name" required />
                        <label for="u-customer-name" class="form-label">Customer Name</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide customer name</div>
                    </div>
                </div>
                <br>
                <div>
                    <button type="button" class="btn btn-dark cancel btn-sm" data-dismiss="modal"
                        style="margin:0px 10px">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm" name="update-customer-btn"
                        style="margin:0px 10px">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $('.update-customer').on('click', function() {
        $('#update-customer').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#update-id').val(data[0]);
        $('#u-customer-id').val(data[2]);
        $('#u-customer-name').val(data[3]);

    });
});
$(document).ready(function() {

    $('.cancel').on('click', function() {
        $('#update-customer').modal('hide');

    });
});
</script>