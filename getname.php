<?php 
include("connection.php");

session_start();

$courseId = $_POST['course'];
//$courseId =80;	
$semId = $_POST['sem'];
//$semId =82;
		
		//do the db query here
$temp1 = array();
$temp1=array('Please Select'.",".'0');
		//$query  = "Select * from city_master Where state_id=$state";
		$query=mysqli_query($conn,"SELECT * from student_master WHERE course_id=$courseId and sem_id=$semId");
		//echo "SELECT * from student_master WHERE course_id=$courseId and sem_id=$semId";
		while($row = mysqli_fetch_assoc($query))
		{

			
				 if(empty($temp1))
				 {
				   $temp1=array($row['fname'].",".$row['user_id']);
				 }
				 else
				 {  
				   array_push($temp1,$row['fname'].",".$row['user_id']);
				 }
			

		}
			
			echo (json_encode($temp1));
?>



