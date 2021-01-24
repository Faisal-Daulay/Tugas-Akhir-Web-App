<?php
    session_start();
    error_reporting(0);
    $naleng = $_SESSION['naleng'];
    $status_user = $_SESSION['status_user'];
    $id_user = $_SESSION['id_user'];
    $id_siswa = $_SESSION['id_siswa'];

    if ($status_user!="siswa") {
        echo "
            <script>
                window.location.href='../login.php'
            </script>
        ";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require 'include/head-top.php';
    ?>
</head>

<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">
        <?php
            require 'include/sidebar.php';
        ?>
        <!-- PAGE CONTENT -->
        <div class="page-content">
            <?php
                require 'include/header.php';
            ?>
            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Dashboard</li>
            </ul>
            <!-- END BREADCRUMB -->

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">
                <?php
                    $page = $_GET['page'];
                    if (empty($page)) {
                        require 'include/content.php';
                    } else {
                        require 'include/'.$page;
                    }
                ?>
            </div>
            <!-- END PAGE CONTENT WRAPPER -->

        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->

    <!-- MESSAGE BOX-->
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                <div class="mb-content">
                    <p>Are you sure you want to log out?</p>
                    <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a href="../login.php" class="btn btn-success btn-lg">Yes</a>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MESSAGE BOX-->

    <?php
        require 'include/js.php';
    ?>
</body>

</html>