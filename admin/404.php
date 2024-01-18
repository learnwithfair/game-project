<?php include_once "include/head.php";?>

<body>
    <!-- Page Content -->
    <div id="layoutError" style="margin:0px;">
        <div id="layoutError_content" style="margin-top:40px;">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mt-4">
                                <img class="mb-4 img-error" src="assets/img/error-404-monochrome.svg" />
                                <p class="lead" style="color:red">This requested URL was not found on this server.</p>
                                <br>
                                <a href="dashboard" style="color:green;text-decoration:none;">
                                    <i class="fas fa-arrow-left mr-1"></i>
                                    Return to Dashboard
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer" style="padding: 0px;margin-top:90px;">
            <?php include_once "include/footer.php";?>
        </div>
    </div>
    <?php include_once "include/script.php";?>
</body>

</html>