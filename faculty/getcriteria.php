<?php 
include("connection.php");

session_start();
$faculty=$_SESSION['faculty_id'];
$courseId = $_POST['course'];
	
$semId = $_POST['sem'];
$subId = $_POST['sub'];
$type=$_POST['type'];
		
		//do the db query here
$temp1 = array();

		$temp1=array('Please Select'.",".'0');
		//$query  = "Select * from city_master Where state_id=$state";
		$query=mysqli_query($conn,"SELECT * from sub_exam WHERE course_id=$courseId and sem_id=$semId and subject_id=$subId and type=$type ");
		//echo "SELECT * from student_master WHERE course_id=$courseId and sem_id=$semId";
		while($row = mysqli_fetch_assoc($query))
		{

			
				 if(empty($temp1))
				 {
				   $temp1=array($row['criteria_title'].",".$row['sub_exam_id']);
				 }
				 else
				 {  
				   array_push($temp1,$row['criteria_title'].",".$row['sub_exam_id']);
				 }
			

		}
			
			echo (json_encode($temp1));
?>



