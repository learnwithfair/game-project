<!-- Small modal -->
<style>
.modal_icon {

    text-align: center;
    padding: 25px;
    width: 100%;
}
</style>


<div class="modal fade bd-example-modal-xl" id="update-wheel-hems" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content modal_icon">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-title" id="exampleModalLongTitle">
                    <h3>Update Wheel Items</h3>
                    <hr>
                    <br>
                    <div></div>
                    <input type="hidden" name="update-id" id="update-id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" id="u-wheel-hems-name" name="u-wheel-hems-name"
                                    placeholder="Enter wheel-hems Name" required />
                                <label for="u-wheel-hems-name" class="form-label">Name</label>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please provide wheel-hems name</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="number" min="0" class="form-control" id="u-wheel-hems-percent"
                                    name="u-wheel-hems-percent" placeholder="Enter wheel-hems Percentage" required />
                                <label for="u-wheel-hems-percent" class="form-label">Percentage</label>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please provide wheel-items percent</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" id="u-wheel-hems-color-code"
                                    name="u-wheel-hems-color-code" placeholder="Enter wheel-hems Color Code" required />
                                <label for="u-wheel-hems-color-code" class="form-label">Color Code</label>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please provide wheel-items color code</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="number" min="1" class="form-control" id="u-wheel-hems-multiplier"
                                    name="u-wheel-hems-multiplier" placeholder="Enter wheel-hems Percentage" required />
                                <label for="u-wheel-hems-multiplier" class="form-label">Multiplier</label>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please provide wheel-hems multiplier</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <textarea rows="3" class="form-control" id="u-wheel-hems-details" name="u-wheel-hems-details"
                            placeholder="Write wheel-hems details" required></textarea>
                        <label for="u-wheel-hems-details" class="form-label">Wheel Item Details</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide wheel-items details</div>
                    </div>
                </div>

                <br>
                <div>
                    <button type="button" class="btn btn-dark cancel btn-sm" data-dismiss="modal"
                        style="margin:0px 10px">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm" name="update-wheel-hems-btn"
                        style="margin:0px 10px">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $('.update-wheel-hems').on('click', function() {
        $('#update-wheel-hems').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#update-id').val(data[0]);
        $('#u-wheel-hems-name').val(data[2]);
        $('#u-wheel-hems-details').val(data[9]);
        $('#u-wheel-hems-percent').val(data[6].replace("%", ""));
        $('#u-wheel-hems-color-code').val(data[7]);
        $('#u-wheel-hems-multiplier').val(data[8]);
    });
});
$(document).ready(function() {

    $('.cancel').on('click', function() {
        $('#update-wheel-hems').modal('hide');

    });
});
</script>