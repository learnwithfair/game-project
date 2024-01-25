<!-- Small modal -->
<style>
.modal_icon img {
    border-radius: 50%;
    height: 60px;
    width: 60px;
}

.modal_icon {
    text-align: center;
    padding: 15px;
    width: 100%;
}
</style>
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small
    modal</button> -->

<div class="modal fade bd-example-modal-sm" id="activemodal" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content modal_icon">
            <form action="" method="POST">
                <div class="modal-title" id="exampleModalLongTitle">
                    <input type="hidden" name="active_id" id="active_id">
                    <div>
                        <img src="./assets/img/cross.png" alt="">
                    </div>
                    <br>
                    <h5>Do you want Change?</h5>
                    <div></div>
                    <div>Active status will change!!</div>
                    <br>
                </div>

                <div>
                    <button type="button" class="btn btn-secondary cancel" data-dismiss="modal"
                        style="margin:0px 10px">Cancel</button>
                    <button type="submit" class="btn btn-danger" name="activedata"
                        style="margin:0px 10px">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>