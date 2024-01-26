<!-- Small modal -->
<style>
.modal_icon {

    text-align: center;
    padding: 25px;
    width: 100%;
}
</style>

<div class="modal fade bd-example-modal-md" id="changemodal" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content modal_icon">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-title" id="exampleModalLongTitle">

                    <h3>Do you want to Change Image?</h3>
                    <br>
                    <div></div>
                    <input type="hidden" name="img-update-id" id="img-update-id">
                    <div class="profile-img-div">
                        <img src="" id="updatephoto" />
                        <input type="file" id="imgfile" name="user_img" accept="image/*" />
                        <label for="imgfile" id="uploadimgBtn">Choose Photo</label>
                    </div>
                    <br>

                </div>
                <br>
                <div>
                    <button type="button" class="btn btn-dark cancel btn-sm" data-dismiss="modal"
                        style="margin:0px 10px">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm" name="u-wheel-img-btn"
                        style="margin:0px 10px">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
<script>
$(document).ready(function() {

    $('.change-img').on('click', function() {
        $('#changemodal').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        // Setting value in input field
        $('#img-update-id').val(data[0]);
        $('#updatephoto').attr('src', data[3]);

    });
});
$(document).ready(function() {

    $('.cancel').on('click', function() {

        $('#changemodal').modal('hide');

    });
});


// for uplode profile pic
const imgDiv = document.querySelector('.profile-img-div');
const img = document.querySelector('#updatephoto');
const file = document.querySelector('#imgfile');
const uploadBtn = document.querySelector('#uploadimgBtn');


// imgDiv.addEventListener("mouseenter", function() {
//     uploadBtn.style.display = "block"
// })
// imgDiv.addEventListener("mouseleave", function() {
//     uploadBtn.style.display = "none"
// })

// file.addEventListener('change', function () {


//   const choosedFile = this.files[0];

//   if (choosedFile) {

//     const reader = new FileReader(); //FileReader is a predefined function of JS

//     reader.addEventListener('load',  ()=> {
//       img.setAttribute('src', reader.result);
//     });

//     reader.readAsDataURL(choosedFile);
//   }
// })
const WIDTH = 150

file.addEventListener('change', (event) => {
    let image_file = event.target.files[0]


    const reader = new FileReader()
    reader.readAsDataURL(image_file)

    reader.onload = (e) => {
        let image_url = e.target.result
        img.src = image_url

        img.onload = (e) => {
            let canvas = document.createElement("canvas")
            let ratio = WIDTH / e.target.width
            canvas.width = WIDTH
            canvas.height = e.target.height * ratio

            const context = canvas.getContext("2d")
            context.drawImage(img, 0, 0, canvas.width, canvas.height)
            let new_image_url = context.canvas.toDataURL("image/jpeg", 90)


            img.src = new_image_url
        }
    }

})
</script>