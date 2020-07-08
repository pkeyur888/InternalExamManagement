<?php
			
			$id=$_GET['id'];
			
			
			mysqli_query($conn,"delete from terms_master where terms_id=$id");
			
			
			if(mysqli_affected_rows($conn)==1)
			{
				
				echo "<script>alert('Data sucessfully Deleted...');window.location.href='index.php?page=semester.php';</script>";
			}
			else
			{
				echo "<script>alert('You use this semester so this time you can not delete....');window.location.href='index.php?page=semester.php';</script>";
			}
?>