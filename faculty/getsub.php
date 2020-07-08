<?php 
include("connection.php");

session_start();
$faculty=$_SESSION['faculty_id'];
$courseId = $_POST['course'];
	
$semId = $_POST['sem'];

		
		//do the db query here
$temp = array();
$temp=array('Please Select'.",".'0');
			if(isset($_POST['type']))
			{
				//$query  = "Select * from city_master Where state_id=$state";
				$query=mysqli_query($conn,"Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id INNER JOIN timetable_master as time on time.subject_id=tm.terms_id Where ttm.texonomy = 'Subject' and time.sem_id=$semId and time.course_id=$courseId and time.user_id=$faculty and time.type=2 ORDER BY tm.terms_id DESC");
			}
			else
			{
				$query=mysqli_query($conn,"Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id INNER JOIN timetable_master as time on time.subject_id=tm.terms_id Where ttm.texonomy = 'Subject' and time.sem_id=$semId and time.course_id=$courseId and time.user_id=$faculty and time.type=0 ORDER BY tm.terms_id DESC");
			}
		while($row = mysqli_fetch_assoc($query))
		{

			
				 if(empty($temp))
				 {
				   $temp=array($row['terms_title'].",".$row['terms_id']);
				 }
				 else
				 {  
				   array_push($temp,$row['terms_title'].",".$row['terms_id']);
				 }
			

		}
			
			echo (json_encode($temp));
?>



