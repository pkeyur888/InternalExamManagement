<!DOCTYPE html>
<?php
	session_start(); 
	include 'connection.php';
	if(!$_SESSION['faculty_status'])
	{header("Location:../login.php");}
?>
<html>

<head>
	<link href="../font.css" rel="stylesheet" type="text/css">
	<link href="../font1.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Internal Exam Management System</title>
    <!-- Favicon
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
	
	<!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>
	
    <!-- Wait Me Css -->
    <link href="../../plugins/waitme/waitMe.css" rel="stylesheet" />

	<!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
	 
</head>

<body class="theme-red">
    <!-- Page Loader
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div> -->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="master_faculty.php">Department Of Computer Science</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="logout.php" class="js-search" data-close="true"><i class="material-icons">settings_power</i>Logout</a></li>
                    <!-- #END# Call Search -->  
                   
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Department Of Computer Science</div>
                    <div class="email">dcs@gmail.com</div>
                    
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="master_faculty.php?page=notice.php">
                            <i class="material-icons">bookmark</i>
                            <span>View Notice</span>
                        </a>
                    </li>
                    <li>
                        <a href="master_faculty.php?page=exam.php">
                            <i class="material-icons">add_to_photos</i>
                            <span>Add Exam</span>
                        </a>
                    </li>
				   
                   
					
					<li>
                        <a href="master_faculty.php?page=upload.php">
                            <i class="material-icons">book</i>
                            <span>Upload Marks</span>
                        </a>
                       
                    </li>
					<li>
                        <a href="master_faculty.php?page=attendance.php">
                            <i class="material-icons">person</i>
                            <span>View Attendance</span>
                        </a>
                       
                    </li>
					<li>
                        <a href="master_faculty.php?page=view.php">
                            <i class="material-icons">person</i>
                            <span>View Result</span>
                        </a>
                       
                    </li>
					<li>
                        <a href="master_faculty.php?page=search.php">
                            <i class="material-icons">person</i>
                            <span>Search Result</span>
                        </a>
                       
                    </li>
					<li>
                        <a href="master_faculty.php?page=password.php">
                            <i class="material-icons">add_to_photos</i>
                            <span>Change Password</span>
                        </a>
                    </li>
					
					
					
				
                
                   
                  
            <!-- #Menu -->

        </aside>
        <!-- #END# Left Sidebar -->
        
    </section>

    <section class="content">
        <div class="container-fluid">
            
               <?php
					if(isset($_REQUEST['page']))
					{
						include($_REQUEST['page']);
					}
					else
					{
						include("deshboard.php");
					}
	  
				?>
           
        </div>
    </section>
 <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    
    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>
	
	<!-- Autosize Plugin Js -->
    <script src="../../plugins/autosize/autosize.js"></script>


    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>