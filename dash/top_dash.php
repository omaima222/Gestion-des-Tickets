<?php
require_once '../controller/shared.php';
if($_SESSION["isAdmin"]==0){
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template -->
    <script src="https://kit.fontawesome.com/f57667c685.js" crossorigin="anonymous"></script>
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../assets/css/parsley_css.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #8A1538;">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa-solid fa-ticket"></i>
            </div>
            <div class="sidebar-brand-text mx-3">YouTickets</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="stadium.php">
                <i class="fa-solid fa-house"></i>
                <span>Stadiums</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="team.php">
                <i class="fa-sharp fa-solid fa-people-group"></i>
                <span>Teams</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="match.php">
                <i class="fa-regular fa-futbol"></i>
                <span>Matchs</span></a>
        </li>

        <!-- Nav Item - Spec -->
        <li class="nav-item">
            <a class="nav-link" href="spectateur.php">
                <i class="fa-solid fa-user"></i>
                <span>Reservations</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn" style="background-color: #8A1538;" type="button">
                                <i class="fas fa-search fa-sm text-white"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <?php
                            if(isset($_SESSION['userId'])){
                            $users=Display();
                            if($users['is_admin']){
                        ?>
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome   <?= $users['first_name'];?></span>
                            <img class="img-profile rounded-circle"
                            src="../assets/images/users pfp/<?php echo $users['image'];?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="../pages/profile.php?updateId=<?= $_SESSION['userId'];?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="../pages/landingPage.php" >
                                <i class="fas fa-house fa-sm fa-fw mr-2 text-gray-400"></i>
                                Home
                            </a>
                            <form action="dashboard.php" method="GET">
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item btn" href="#" data-toggle="modal" data-target="#logoutModal"  name="logout" type="submit">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </button>
                            <button class="dropdown-item btn" href="#" data-toggle="modal" data-target="#logoutModal" name="deleteAcc"  type="submit" onclick="return confirm('do you really want to delete your account?')" >
                                <i class="fas fa-trash-can fa-sm fa-fw mr-2 text-gray-400"></i>
                                Delet account
                            </button>
                            </form>
                        </div>
                        <?php } } ?>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Matchs Joués
                                        </div>
                                        <?php 
                                          $matchs=get_matchs();
                                          $matchcount=0;
                                          foreach($matchs as $match ){
                                            $matchcount++;
                                          }
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$matchcount?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-regular fa-futbol fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Stades Disponible
                                        </div>
                                        <?php 
                                          $stadiums=get_stadiums();
                                          $stadiumcount=0;
                                          foreach($stadiums as $stadium ){
                                            $stadiumcount++;
                                          }
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$stadiumcount?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-house fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Spectateurs
                                            Enregistrés
                                        </div>
                                        <?php 
                                          $users=Get_user();
                                          $usercount=0;
                                          foreach($users as $user ){
                                            if($user['is_admin']==0){
                                                $usercount++;
                                            }
                                          }
                                        ?>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$usercount?></div>
                                            </div>
                                            <div class="col">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            E-tickets Disponible
                                        </div>
                                        <?php 
                                          $DisTicketscount=0;
                                          foreach($stadiums as $stadium ){
                                            $DisTicketscount=$stadium['capacity'];
                                          }
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$DisTicketscount?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-sharp fa-solid fa-ticket fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            E-tickets Reservés
                                        </div>
                                        <?php 
                                          $reservations= get_reservations();
                                          $reservationscount=0;
                                          foreach($reservations as $reservation ){
                                            $reservationscount++;
                                          }
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$reservationscount?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-bookmark fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-dark shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                            E-tickets Restants
                                        </div>
                                        <?php 
                                          $RestTicketscount=$DisTicketscount-$reservationscount;
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$RestTicketscount?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>