<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
	<link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="././assets/icon/2.png"/>
	<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
	<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="js/sb-admin-2.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="main.php">Si - Jumantik</a>
            </div>
            
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['myname']; ?></a></li>
                        <li><a href="ubahpassword.php"><i class="fa fa-gear fa-fw"></i> Ubah Password</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php" onClick="return confirm('Apakah benar akan logout?');"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
			
			<!-- left menu -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <?php if (strlen($_SESSION['mytype']) != 0 && $_SESSION['mytype'] == "admin"){ ?>
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="main.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <!-- <li>
                            <a href="datamarker.php"><i class="fa fa-group fa-fw"></i> Data Marker</a>
                        </li> -->
                        <li>
                            <a href="datauser.php"><i class="fa fa-user fa-fw"></i> Data User</a>
                        </li>
                    </ul>
					<?php }else if (strlen($_SESSION['mytype']) != 0 && $_SESSION['mytype'] == "koordinator"){ ?>
					<ul class="nav" id="side-menu">
                        <!-- <li>
                            <a href="main.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li> -->
                        <li>
                            <a href="datauser.php"><i class="fa fa-user fa-fw"></i> Data User</a>
                        </li>
                    </ul>
                    <?php }else if (strlen($_SESSION['mytype']) != 0 && $_SESSION['mytype'] == "jumantik"){ ?>
					<ul class="nav" id="side-menu">
                        <li>
                            <a href="main.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <!-- <li>
                            <a href="datauser.php"><i class="fa fa-user fa-fw"></i> Data User</a>
                        </li> -->
                    </ul>
					<?php } ?>
                </div>
            </div>
        </nav>