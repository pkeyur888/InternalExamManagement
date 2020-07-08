<?php 
include("connection.php");
session_start();

$faculty=$_SESSION['faculty_id'];

$typeId = $_POST['type'];
//$typeId =2;		
		//do the db query here
$temp1 = array();

		$temp1=array('Please Select'.",".'0');
		if($typeId==2)
		{	
			$query=mysqli_query($conn,"SELECT * from timetable_master tm inner join terms_master as ttm on ttm.terms_id=tm.subject_id WHERE  tm.user_id=$faculty and tm.type=2");
		}
		else
		{
			$query=mysqli_query($conn,"SELECT * from timetable_master tm inner join terms_master as ttm on ttm.terms_id=tm.subject_id WHERE  tm.user_id=$faculty and tm.type=0");
		}
		while($row = mysqli_fetch_assoc($query))
		{

			
				 if(empty($temp1))
				 {
				   $temp1=array($row['terms_title'].",".$row['subject_id']);
				 }
				 else
				 {  
				   array_push($temp1,$row['terms_title'].",".$row['subject_id']);
				 }
			

		}
			
			echo (json_encode($temp1));
?>

<?php
		if(isset($_POST['sub']) && isset($_POST['type']) )
		{
			$faculty=$_SESSION['faculty_id'];
			
			$typeId = $_POST['type'];
			$subId = $_POST['sub'];
		//$typeId =2;		
		//do the db query here
		$temp1 = array();

		$temp1=array('Please Select'.",".'0');
		
			$query=mysqli_query($conn,"SELECT * from sub_exam where subject_id=$subId and type=$type");
		
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
		}
?>

