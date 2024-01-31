<!-- ########################################################################### -->
<!-- // FOR COPY TOKEN -->
<!-- ########################################################################### -->
<!-- For Copy  -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $('.copybtn').on('click', function() {

        // For copy clipboard
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        // http: //localhost/rabbi/FortuneWheelAdmin/game.php?token=
        navigator.clipboard.writeText('http://localhost/link-management/game-project/game.php?token=' +
            data[
                6].trim());

        // For copied Toast
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            width: 150,
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
        });
    });
});
</script>
<!-- /For Copy  -->