<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | InternalEaxm Management </title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts 
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">-->
	<link href="font.css" rel="stylesheet" type="text/css">
	<link href="font1.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Login</a>
            
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username or Enrollment Number" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                           
                        </div>
                        <div class="col-xs-4">
                            <input type="submit" class="btn btn-primary m-t-15 waves-effect" name="submit" value="Login">
                        </div>					
                    </div>
					<div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="registration.php">Registration For Student!</a>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>
<?php
session_start();
	include 'connection.php';
	if(isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];		
		$data=mysqli_query($conn,"select * from user_master where user_name='$username' and password='$password' ");
		//echo "<script>alert('hello')</script>";
			if(mysqli_affected_rows($conn)==1)
			{	$res=mysqli_fetch_assoc($data);
				$type=$res['ur_id'];
				
				if( $type==1)
				{
					
					$_SESSION['admin_status']='true';
					header("Location:index.php");
				}
				else if( $type==2)
					{
						$_SESSION['faculty_status']='true';
						$_SESSION['faculty_id']=$res['user_id'];
						header("Location:faculty/master_faculty.php");
					}
					else 
						{
							
							$_SESSION['student_status']='true';
							$_SESSION['student_id']=$res['user_id'];
							header("Location:student/master_student.php");
						}
						
			}
			else
			{
				echo "<script>alert('USername And Password was wrong')</script>";
			}
		
		
		
	}

?>