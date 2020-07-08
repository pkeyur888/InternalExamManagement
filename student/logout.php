<?php
			session_start();
			unset($_SESSION['student_status']);
			unset($_SESSION['student_id']);
			header("Location:../login.php");

?>