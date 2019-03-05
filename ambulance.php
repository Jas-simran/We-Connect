<?php
include('database.php');
session_start();
$role= $_SESSION['role'];
if (!isset($_SESSION['email'])) {
    echo '<script language="javascript">';
    echo "if(!alert('You should be logged in to access this page.')) document.location = 'index.php'";
    echo '</script>';
}

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>We-Connect</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .label {

            font-family: 'Open Sans';
            font-size: 16px !important;
            font-weight: 600;
            padding: 3px 8px;
            line-height: 4em !important;
            text-shadow: none;
        }
    </style>
</head>

<body>

<div id="wrapper">
    <?php include('header.php'); ?>

    <div id="page-wrapper" class="gray-bg">
        <?php include('logout.php'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Ambulance Contact Details</h2>
                <ol class="breadcrumb">
                    <li>
                        <a>Home</a>
                    </li>

                    <li class="active">
                        <strong>Ambulance Contact Details</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h3>Ambulance Contact Details</h3>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>


                            </div>
                        </div>
                        <div class="ibox-content">
                            <center>
                                <h1>Ambulance Contact Details</h1>
                                <br>
                                <h2>Nearest Ambulance: 9999888858</h2>
                                <br>
                                <h2>Generalized Number: 102</h2>
                            </center>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- FooTable -->
<script src="js/plugins/footable/footable.all.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>



</body>

</html>