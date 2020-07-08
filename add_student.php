<form action="#" method="post" enctype="multipart/form-data">
<div class="block-header clearfix">
                <h2 class="pull-left">
                  
                    
                </h2>
				<div class="pull-right">
				<a href="index.php?page=student.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
				</div>
            </div>

			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD NEW STUDENT
                            </h2>
                            
                        </div>
                        <div class="body">
                           
                                <div class="form-group">
                                    <div class="form-line">
										<label>Course Name</label>
										<select class="form-control" name="course_name">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Course' ";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['terms_id']; ?>"><?php echo $r['terms_title']; ?></option>
											<?php endwhile; ?>                                      
										</select>
									</div>
								 </div>
								<div class="form-group">
                                    <div class="form-line">
										<label>Semester Name</label>
										<select class="form-control" name="semester_name">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Semester'";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['terms_id']; ?>"><?php echo $r['terms_title']; ?></option>
											<?php endwhile; ?>                                      
										</select>
									</div>
								 </div>
                                <label>First Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="fname" class="form-control" placeholder="Enter first name">
                                    </div>
                                </div>
								 <label>Last Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="lname" class="form-control" placeholder="Enter last name">
                                    </div>
                                </div>
								<label>Enrollment No</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="en_no" class="form-control" placeholder="Enter enrollment name">
                                    </div>
                                </div>                        
								
								
								<label>Email id </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" name="email" class="form-control" placeholder="Enter email id">
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
                                        <input type="password" name="Confirm_pwd" class="form-control" placeholder="Enter confirm password">
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
                </div>Sample Excle File
            </div>
			
			</form>
		
<?php
		if(isset($_POST['submit']))
		{
			
			$password=$_POST['password'];
			$email=$_POST['email'];
			
			$en_no=$_POST['en_no'];
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$course=$_POST['course_name'];
			$semester=$_POST['semester_name'];
			
			
			mysqli_query($conn,"insert into `user_master` values(NULL,3,$en_no,'$en_no','$password','$email')");
			if(mysqli_affected_rows($conn)==1)
			{
				$data = mysqli_query($conn,"Select MAX(user_id) as mid from user_master ORDER BY user_id");
				while($result = mysqli_fetch_array($data))
				{
					$id = $result['mid'];
				}
			
				$sql="INSERT INTO `student_master` VALUES ($id,$course,$semester,'$fname','$lname','2018-02-02') ";
				mysqli_query($conn,$sql);
				if(mysqli_affected_rows($conn)==1)
				{
					echo "<script>alert('Data Sucessfully inserted..');window.location.href='index.php?page=add_student.php';</script>";
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
?>		