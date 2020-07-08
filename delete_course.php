<?php

			
			/*$id=$_GET['id'];
			$id=81;
			$sql="select terms_id from terms_master where terms_id in(SELECT course_id from student_master where course_id in(select course_id from timetable_master where course_id in(select course_id FROM exam_master WHERE course_id=$id) ))";
			$d=mysqli_query($conn,$sql);
			
			
			$count=mysqli_num_rows($d);
			echo $count;
			if($count==0)
			{
				$sql1="update terms_texonomy_master set status='0' where terms_id=$id";
				mysqli_query($conn,$sql1);
				if(mysqli_affected_rows($conn)==1 )
				{
					echo "<script>alert('Data sucessfully Deleted...');</script>";
					//window.location.href='index.php?page=course.php';
				}
				else
				{
					echo "<script>alert('Problem to delete try after some time..');</script>";
					//window.location.href='index.php?page=course.php';
				}
			}
			else
			{
				echo "<script>alert('You use this course so this time you can not delete....');</script>";
				window.location.href='index.php?page=course.php';
			}*/
			echo "<script>window.location.href='index.php?page=course.php';</script>";
?>