<?php
include "class/function.php";
$obj = new linkManagement();
session_start();
$id = $_SESSION['admin_id'];
if ( $id == null ) {
    header( "location: index" );
}
if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == 'logout' ) {
        $obj->logout_info();
    }
}

include_once "include/head.php";?>


<body class="sb-nav-fixed">
    <?php include_once "include/topnav.php";?>
    <div id="layoutSidenav">
        <?php include_once "include/sidenav.php";?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid" style="overflow:hidden;">
                    <?php
if ( !isset( $view ) ) {
    include 'view/dashboard_view.php';
} else {
    if ( $view == "dashboard" ) {
        include 'view/dashboard_view.php';
    } elseif ( $view == "wheel_hems" ) {
        include 'view/wheel-hems/wheel_hems_view.php';
    } elseif ( $view == "links" ) {
        include 'view/links/links_view.php';
    } elseif ( $view == "add_bulk" ) {
        include 'view/add-bulk/add_bulk_view.php';
    }

}

?>
                </div>
            </main>
            <?php include_once "include/footer.php";?>
        </div>
    </div>
    <?php include_once "include/script.php";?>
</body>

</html>