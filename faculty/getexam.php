<?php
include("connection.php");
session_start();

$faculty=$_SESSION['faculty_id'];
			
			$type = $_POST['type'];
			$subId = $_POST['sub'];
		
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
		
?>