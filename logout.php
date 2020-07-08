<?php
			session_start();
			unset($_SESSION['admin_status']);
			header("Location:login.php");

?>