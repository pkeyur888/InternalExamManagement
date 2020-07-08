<?php 
include("connection.php");


$courseId = $_POST['course'];

$semId = $_POST['sem'];

		
		//do the db query here
$temp = array();
		//$query  = "Select * from city_master Where state_id=$state";
		$query=mysqli_query($conn,"Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Subject' and ttm.parent_id=$semId and discription=$courseId and tm.terms_id NOT IN(SELECT subject_id from timetable_master) ORDER BY tm.terms_id DESC");
		
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



