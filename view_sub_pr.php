
<?php 
include("connection.php");


$courseId = $_POST['course'];
//$courseId=80;
//$semId=84;
//$type=2;	
$semId = $_POST['sem'];
$type=$_POST['type'];
$temp = array();
$temp=array('Please Select'.",".'0');
		
		
		//echo "select * from timetable_master as tm INNER join terms_master as ttm on ttm.terms_id=tm.subject_id WHERE  and tm.course_id=$courseId  tm.sem_id=$semId  and tm.type=$type";
			$query=mysqli_query($conn,"select * from timetable_master as tm INNER join terms_master as ttm on ttm.terms_id=tm.subject_id WHERE   tm.course_id=$courseId  and tm.sem_id=$semId  and tm.type=$type and terms_id in(select subject_id from demo)");
		
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



