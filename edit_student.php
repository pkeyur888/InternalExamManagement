<?php
		$id=$_GET['id'];
		$data=mysqli_query($conn,"select * from user_master as um inner join student_master as sm on um.user_id=sm.user_id where sm.user_id=$id");
		$res=mysqli_fetch_assoc($data);
		$course=$res['course_id'];
		$sem=$res['sem_id'];
?>

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
                                EDIT STUDENT
                            </h2>
                            
                        </div>
                        <div class="body">
                           
                                <div class="form-group">
                                    <div class="form-line">
										<label>Course Name</label>
										<select class="form-control" name="course_name">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Course' ORDER BY tm.terms_id DESC";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['terms_id']; ?>"  <?php if($r['terms_id']==$course) echo 'selected="selected"'; ?>><?php echo $r['terms_title']; ?></option>
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
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Semester' ORDER BY tm.terms_id DESC";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['terms_id']; ?>"   <?php if($r['terms_id']==$sem) echo 'selected="selected"'; ?>><?php echo $r['terms_title']; ?></option>
											<?php endwhile; ?>                                      
										</select>
									</div>
								 </div>
                                <label>First Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="fname" value="<?php echo $res['fname']; ?>" class="form-control" placeholder="Enter first name">
                                    </div>
                                </div>
								 <label>Last Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="lname" value="<?php echo $res['lname']; ?>"  class="form-control" placeholder="Enter last name">
                                    </div>
                                </div>
								                       
								
								
								<label>Email id </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" name="email" value="<?php echo $res['email']; ?>"  class="form-control" placeholder="Enter email id">
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
			
			
			$email=$_POST['email'];
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$course=$_POST['course_name'];
			$semester=$_POST['semester_name'];
			
					mysqli_query($conn,"update user_master set email='$email' where user_id=$id");
					$k=mysqli_affected_rows($conn);
					mysqli_query($conn,"update student_master set fname='$fname',lname='$lname',course_id=$course,sem_id=$semester where user_id=$id");
					$v=mysqli_affected_rows($conn);
					echo $k;
					if(($k==1 && $v==1) ||($k==0 && $v==1) || ($k==1 && $v==0) || ($k==0 && $v==1) )
					{
						echo "<script>alert('Data Successfully Updated..');window.location.href='index.php?page=faculty.php';</script>";
				
				
					}
					else
					{
						echo "<script>alert('Problem to Update try after some time...')</script>";
					}
			
		}
?>		