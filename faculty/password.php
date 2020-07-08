<form action="#" method="post">

			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Change Password
                            </h2>
                            
                        </div>
                        <div class="body">
                           
                                <label for="email_address">Old Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="old_pass" class="form-control" placeholder="Enter old Password">
                                    </div>
                                </div>
								<label for="email_address">New Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="new_pass" class="form-control" placeholder="Enter New Password">
                                    </div>
                                </div>
								<label for="email_address">Confirm Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="con_pass" class="form-control" placeholder="Enter confirm Password">
                                    </div>
                                </div>
								 
                            
                                <input type="submit" class="btn btn-primary m-t-15 waves-effect" name="submit" value="Submit">

                        </div>
                    </div>
                </div>
            </div>
			
			</form>
<?php
		if(isset($_POST['submit']))
		{
				$faculty=$_SESSION['faculty_id'];
				$new=$_POST['new_pass'];
				$old=$_POST['old_pass'];
				$con=$_POST['con_pass'];
					$data=mysqli_query($conn,"select password from user_master where user_id=$faculty ");
					$res=mysqli_fetch_assoc($data);
					$pass=$res['password'];
					if($pass==$old)
					{
						if($new==$con)
						{
							mysqli_query($conn,"UPDATE user_master SET password ='$new' WHERE user_id=$faculty");
							if(mysqli_affected_rows($conn)==1)
							{
								echo "<script>alert('Password has been successfully update....');window.location.href='master_faculty.php?page=password.php';</script>";
							}
							else
							{
								echo "<script>alert('Problem to change password Please try after some time...');window.location.href='master_faculty.php?page=deshboard.php';</script>";
							}
						}
						else
						{
							echo "<script>alert('Password and Confirm Password not Matched....');window.location.href='master_faculty.php?page=password.php';</script>";
						}
					}
					else
					{
						echo "<script>alert('Old Password not Matched....');window.location.href='master_faculty.php?page=password.php';</script>";
					}
		}
?>
			