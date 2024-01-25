<?php
include "class/function.php";
$obj = new linkManagement();
session_start();
if ( isset( $_SESSION['admin_id'] ) ) {
    $id = $_SESSION['admin_id'];
    if ( $id ) {
        header( "location:template" );
    }
}
if ( isset( $_POST['login'] ) ) {
    $login_mgs = $obj->getAdminData( $_POST );

}

?>

<?php

?>
<?php include_once "include/head.php";?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4"><b>Login</b></h3>
                                </div>
                                <?php if ( isset( $login_mgs ) ) {
    if ( $login_mgs == "successful" ) {
        // include 'admin/include/success_modal.php';

    } else {
        include 'include/error_modal.php';
    }

}?>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label class="small mb-1" for="admin_email">Email</label>
                                            <input name="admin_email" class="form-control py-4" id="admin_email"
                                                type="email" placeholder="Enter email address" required />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="admin_password">Password</label>
                                            <input name="admin_password" class="form-control py-4" id="admin_password"
                                                type="password" placeholder="Enter password" required />
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck"
                                                    type="checkbox" />
                                                <label class="custom-control-label" for="rememberPasswordCheck">Remember
                                                    password</label>
                                            </div>
                                        </div>
                                        <div
                                            class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="#">Forgot Password?</a>
                                            <input type='submit' name="login" value="Login" class="btn btn-primary" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <?php include_once "include/footer.php";?>
        </div>
    </div>
    <?php include_once "include/script.php";?>
</body>

</html>