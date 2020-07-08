<form action="#" method="post">
<div class="block-header clearfix">
                <h2 class="pull-left">
                
                    
                </h2>
				<div class="pull-right">
				<a href="index.php?page=faculty.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
				</div>
            </div>

			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD NEW FACULTY
                            </h2>
                            
                        </div>
                        <div class="body">
                           
                                <label>Faculty Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="faculty_name" class="form-control" placeholder="Enter faculty name">
                                    </div>
                                </div>
								<label>Expertise</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="expertise" class="form-control" placeholder="Enter expertise">
                                    </div>
                                </div>
								<label>Spaciality</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="spaciality" class="form-control" placeholder="Enter spaciality">
                                    </div>
                                </div>
								<label>Educational Information</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="edu_info" class="form-control" placeholder="Enter educational information">
                                    </div>
                                </div>
								<label>Experience Information</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="exper_info" class="form-control" placeholder="Enter experience information">
                                    </div>
                                </div>
								<label>Email id </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" name="email" class="form-control" placeholder="Enter email id">
                                    </div>
                                </div>
                                <label>Username</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="username" class="form-control" placeholder="Enter username">
                                    </div>
                                </div>
								<label>Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="password" class="form-control" placeholder="Enter new password">
                                    </div>
                                </div>
								<label>Confirm Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="confirm_pwd" class="form-control" placeholder="Enter confirm password">
                                    </div>
                                </div>
							<!--	<div class="form-group">
                                    <div class="form-line">
									<label>Status</label>
										<select class="form-control" name="status">
											<option value="">-- Please select --</option>
											<option value="block">Block</option>
											<option value="unblock">Unblock</option>                                    
										</select>
									</div>
								 </div> -->

                                
                                
                                <input type="submit" class="btn btn-primary m-t-15 waves-effect" name="submit" value="Submit">

                        </div>
                    </div>
                </div>
            </div>
			
			</form>
<?php
		if(isset($_POST['submit']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$confirm_pwd=$_POST['confirm_pwd'];
			$email=$_POST['email'];
			
			$name=$_POST['faculty_name'];
			$expertise=$_POST['expertise'];
			$spaciality=$_POST['spaciality'];
			$edu_info=$_POST['edu_info'];
			$exper_info=$_POST['exper_info'];
			
			if($password==$confirm_pwd)
			{
					mysqli_query($conn,"INSERT INTO `user_master` VALUES(NULL,2,0,'$username','$password','$email')");
					$k=mysqli_affected_rows($conn);
		
					if($k==1)
					{
						$data = mysqli_query($conn,"Select MAX(user_id) as mid from user_master ORDER BY user_id");
						while($result = mysqli_fetch_array($data))
						{
							$id = $result['mid'];
						}
			
							$sql="INSERT INTO `faculty_master`VALUES ($id,'$name','$expertise','$spaciality','$edu_info','$exper_info') ";
							mysqli_query($conn,$sql);
								if(mysqli_affected_rows($conn))
								{
									echo "<script>alert('Data Sucessfully inserted..');window.location.href='index.php?page=add_faculty.php';</script>";
								}
								else
								{
									echo "<script>alert('Record not Inserted')</script>";
								}

				
					}
					else
					{
						echo "<script>alert('Record not Inserted')</script>";
					}
			}
			else
			{
					echo "<script>alert('Password and Confirm Password not Matched..')</script>";
			}
		}


?>			