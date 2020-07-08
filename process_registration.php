<?php
include 'connection.php';
		if(isset($_POST['submit']))
		{
			$number=$_POST['number'];
			$course=$_POST['course'];
			$semester=$_POST['semester'];
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			//$number=15082221001;
			$checkdata=" SELECT enrollment_no FROM user_master WHERE enrollment_no=$number ";
			$query=mysqli_query($conn,$checkdata);
			if(mysqli_num_rows($query)>0)
			{
				echo "<script>window.location.href='registration.php';</script>";
				//echo "<script>alert('hello');window.location.href='New%20folder/registration.php';<script>";
			}
			else
			{
					mysqli_query($conn,"insert into `user_master` values(NULL,3,$number,'$number','$password','$email')");
				if(mysqli_affected_rows($conn)==1)
				{
					$data = mysqli_query($conn,"Select MAX(user_id) as mid from user_master ORDER BY user_id");
					while($result = mysqli_fetch_array($data))
					{
						$id = $result['mid'];
					}
			
					$sql="INSERT INTO `student_master` VALUES ($id,$course,$semester,'$fname','$lname','2018-02-02') ";
					mysqli_query($conn,$sql);
					if(mysqli_affected_rows($conn)==1)
					{
						echo "<script>alert('Registration Completed..');window.location.href='login.php';</script>";
					}
					else
					{
						echo "<script>alert('Record not Inserted')</script>";
					}	
				}
				else
				{
					echo "<script>alert('Record not Inserted')</script>";
				}
			}
		
		
		}
?>