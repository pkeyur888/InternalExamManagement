<?php
			session_start();
			unset($_SESSION['faculty_status']);
			unset($_SESSION['faculty_id']);
			header("Location:../login.php");

?>