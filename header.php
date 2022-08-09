<?php

include('./database/db.php');
if(!empty(  $_SESSION["admin_id"])){
    $id=  $_SESSION["admin_id"];
    $results= mysqli_query($connection, "SELECT * from admin where admin_id = $id");
     mysqli_fetch_assoc($results);
}
else{

    echo "<script>window.location='signin.php'</script>";
}
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- sweet alert -->
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <img src="download.png" alt="" srcset="" height="70px">
                </a>

                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>


                    <a href="product.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Products</a>
                    <a href="size.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Size</a>

                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>Reports</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="#" class="dropdown-item">Sales Reports</a>
                            <a href="#" class="dropdown-item">Purchase Reports</a>
                            <a href="#" class="dropdown-item">Employee Reports</a>
                            <a href="#" class="dropdown-item">Supplier Reports</a>
                        </div>
                    </div> -->


                    <a href="Employee.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Employees</a>
                    <a href="supplier.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Suppliers</a>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>Gate Pass</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="gatePass_in.php" class="dropdown-item">Purchase</a>
                            <a href="gatePass_out.php" class="dropdown-item">Sale</a>

                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>Raw Materials</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="packing.php" class="dropdown-item">Packing</a>
                            <a href="sticker.php" class="dropdown-item">Stikers</a>
                            <!-- <a href="raw_product.php" class="dropdown-item">Products</a> -->

                        </div>
                    </div>


                    <a href="expense.php" class="nav-item nav-link"><i
                            class="fa fa-chart-bar me-2"></i>Expenses</a>
                    <a href="Charity.php" class="nav-item nav-link"><i
                            class="fa fa-chart-bar me-2"></i>Charity</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <form class="d-none d-md-flex ms-4">
            <input class="form-control border-0" type="search" placeholder="Search">
        </form>
        <div class="navbar-nav align-items-center ms-auto">


            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex">Profile</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

                    <a href="logout.php" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->