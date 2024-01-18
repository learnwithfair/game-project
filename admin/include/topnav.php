 <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
     <a class="navbar-brand" target="_blank" href=".././">Website Name</a>
     <span class="" id="sidebarToggle" href="#" style="background-color:none;cursor:pointer;"><i
             class="fas fa-bars"></i></span>
     <!-- <span class="btn btn-link btn-sm  order-1 order-lg-0" id="sidebarToggle" href="#" style="background-color:#343A40;"><i
             class="fas fa-bars"></i></span> -->
     <!-- Navbar Search-->
     <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

     </form>
     <!-- Navbar -->
     <ul class="navbar-nav ml-auto ml-md-0">
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false"><img
                     src="./assets/img/<?php echo $_SESSION['admin_img']; ?>" alt="" height="30px" width="30px"
                     style="border-radius:50%"></a>
             <!-- <i class="fas fa-user fa-fw"></i> -->
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                 <a class="dropdown-item"
                     href="mailto:<?php echo $_SESSION['admin_email']; ?>"><?php echo $_SESSION['admin_name']; ?></a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="#">Settings</a>
                 <a class="dropdown-item" href="#">Activity Log</a>
                 <div class="dropdown-divider"></div>
                 <a name="logout" class="dropdown-item" href="?status=logout">Logout</a>
             </div>
         </li>
     </ul>

 </nav>