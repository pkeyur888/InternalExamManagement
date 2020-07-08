<?php
include 'connection.php';
		if(isset($_POST['submit']))
		{
			$number=$_POST['number'];
			//$number=15082221001;
			$checkdata=" SELECT enrollment_no FROM user_master WHERE enrollment_no=$number ";
			$query=mysqli_query($conn,$checkdata);
			if(mysqli_num_rows($query)>0)
			{
				echo "<script>window.location.href='New%20folder/student/registration.php';<script>";
			}
		
		
		}
?>