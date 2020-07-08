<?php
$conn=mysqli_connect("localhost","root",""); 
				if(!$conn)
				{
							die("<div class='alert alert-danger'>
                                Something is wrong or connection is faild. <a href='index.php' class='alert-link'>Try Again..</a>.
                            </div>");
				}
				else
				{
					mysqli_select_db($conn,"internalexam");					
				}
				
				
?>