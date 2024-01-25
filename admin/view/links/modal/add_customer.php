<!-- Small modal -->
<style>
.modal_icon {

    text-align: center;
    padding: 25px;
    width: 100%;
}
</style>


<div class="modal fade bd-example-modal-md" id="add-customer" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content modal_icon">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-title" id="exampleModalLongTitle">
                    <h3>Add Customer</h3>
                    <hr>
                    <br>
                    <div></div>
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" id="validationCustom02" name="customer-id"
                            placeholder="Enter Customer ID" required />
                        <label for="validationCustom02" class="form-label">Customer ID</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide customer ID</div>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" id="validationCustom0" name="customer-name"
                            placeholder="Enter Customer Name" required />
                        <label for="validationCustom02" class="form-label">Customer Name</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide customer name</div>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="email" class="form-control" id="customer-email" name="customer-email"
                            placeholder="Enter Customer Email" required />
                        <label for="customer-email" class="form-label">Customer Email</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide customer email</div>
                    </div>
                </div>
                <br>
                <div>
                    <button type="button" class="btn btn-dark cancel btn-sm" data-dismiss="modal"
                        style="margin:0px 10px">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm" name="add-customer-btn"
                        style="margin:0px 10px">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $('.add-customer').on('click', function() {

        $('#add-customer').modal('show');

    });
});
$(document).ready(function() {

    $('.cancel').on('click', function() {

        $('#add-customer').modal('hide');

    });
});
</script>