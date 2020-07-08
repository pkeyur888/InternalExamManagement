
<?php


include 'connection.php';

	if(isset($_POST['user_name']))
	{
		$name=$_POST['user_name'];	
	//	$name='bmp';
		$checkdata=" SELECT user_name FROM user_master WHERE user_name='$name' ";

		$query=mysqli_query($conn,$checkdata);

		if(mysqli_num_rows($query)>0)
		{
			echo "User Name Already Exist.....";
		}
		else
		{
			echo "OK";
		}
		exit();
	}
	
	if(isset($_POST['user_number']))
	{
		$number=$_POST['user_number'];
	//$number=15082221001;
		$checkdata=" SELECT enrollment_no FROM user_master WHERE enrollment_no=$number ";

		$query=mysqli_query($conn,$checkdata);

		if(mysqli_num_rows($query)>0)
		{
				echo "Enrollment Number Already Exist";
		}
		else
		{
			echo "OK";
		}
		exit();
	}
?>
