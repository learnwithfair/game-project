<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="dashboard">
                    <div class="sb-nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="wheel_hems">
                    <div class="sb-nav-link-icon"><i class='far fa-sun'></i></div>
                    Wheel Items
                </a>
                <a class="nav-link" href="links">
                    <div class="sb-nav-link-icon"><i class='fa fa-link'></i></div>
                    Links
                </a>
                <a class="nav-link" href="add_bulk">
                    <div class="sb-nav-link-icon"><i class='fa fa-user'></i></div>
                    Add Bulk
                </a>

                <!-- ////// -->

                <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseadmin"
                    aria-expanded="false" aria-controls="collapseadmin">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                    Admin
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseadmin" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                        <a class="nav-link" href="add_sub_admin"><i class="fa fa-angle-double-right"></i> &nbsp;Add
                            Admin</a>
                        <a class="nav-link" href="manage_sub_admin"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Manage Admin</a>
                    </nav>
                </div> -->

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo $_SESSION['admin_name']; ?>
        </div>
    </nav>
</div>