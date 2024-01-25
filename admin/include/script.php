<!-- Counter JS Start -->
<!-- Main JS -->
<script src="./js/jquery.min.js"></script>
<!-- Owl Carousel JS -->
<script src="./js/owl.carousel.min.js"></script>
<!-- Counter JS -->
<script src="./js/jquery.counterup.min.js"></script>
<!-- Waypoint JS -->
<script src="./js/waypoint.min.js"></script>
<!-- Main JS -->
<script src="./js/main.js"></script>
<!-- Counter JS End-->


<!-- ############################################################## -->
<!-- Modal js -->
<!-- ///////////////////////////////////////////////////////// -->
<!-- For Delete Item by ID  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
// For Delete Item
$(document).ready(function() {

    $('.deletebtn').on('click', function() {

        $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#delete_id').val(data[0]);

    });
});

// Active Status set

$(document).ready(function() {

    $('.activebtn').on('click', function() {

        $('#activemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#active_id').val(data[0]);

    });
});
</script>


<!-- ################################################################# -->


<!-- ##################################################### -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="js/scripts.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>
<script src="./assets/demo/datatables-demo.js"></script>
<!-- /////////////////// -->