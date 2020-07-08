<!DOCTYPE html>
<html>

<head>
<?php include 'connection.php';?>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts 
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

	<link href="../font.css" rel="stylesheet" type="text/css">
	<link href="../font1.css" rel="stylesheet" type="text/css">
	
    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" onsubmit="return checkall();"  action="#">
                    <div class="msg">Register for new Student</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">assignment_turned_in</i>
                        </span>
						<div class="form-line">
						<select class="form-control" name="course" required autofocus>
											<option value="">-- Select Course--</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Course' ORDER BY tm.terms_id DESC";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['terms_id']; ?>"><?php echo $r['terms_title']; ?></option>
											<?php endwhile; ?>                                      
										</select>
                        
                            
                        </div>
                    </div>
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">assignment_turned_in</i>
                        </span>
						<div class="form-line">
						<select class="form-control" name="semester" required autofocus>
											<option value="">-- Select Semester--</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Semester' ";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['terms_id']; ?>"><?php echo $r['terms_title']; ?></option>
											<?php endwhile; ?>                                      
										</select>
                        
                            
                        </div>
                    </div>
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">mood</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="fname" placeholder="First Name" required autofocus>
                        </div>
                    </div>
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">mood</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="lname" placeholder="Last Name" required autofocus>
                        </div>
                    </div>
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">apps</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="number" id="number" onkeyup="checknumber();" placeholder="Enrollment Number" required autofocus>
                        </div>
						<span id="number_status"></span>
                    </div>
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                   
                    
                   <!-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>-->
                   <input type="submit" name="submit" value="SIGN UP" class="btn btn-block btn-lg bg-pink waves-effect">
                   <!-- <button  name="submit" type="submit">SIGN UP</button>-->

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="sign-in.html">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/examples/sign-up.js"></script>
	
		<script type="text/javascript">


	function checknumber()
	{
		var number=document.getElementById( "number" ).value;
	
	if(number)
	{
			$.ajax({
			type: 'post',
			url: 'checkusername.php',
			data: { user_number:number,},
			success: function (response) 
			{
				$( '#number_status' ).html(response);
				if(response=="123")	
				{
					return true;	
				}
				else
				{
					return false;	
				}
			}
		});
	}
	else
	{
		$( '#number_status' ).html("");
		return false;
	}
}




function checkall()
{
	//var namehtml=document.getElementById("name_status").innerHTML;
	var numberhtml=document.getElementById("number_status").innerHTML;
	alert(numberhtml);
	
	if(numberhtml=="OK")
	{
		return false;		
	}
	else
	{ 
		return false;
	}
}
	</script>
</body>

</html>
<?php
		if(isset($_POST['submit']))
		{
			echo "fdsfddgdgdf";
			//echo "<script>alert('hello')</script>";
		}
?>