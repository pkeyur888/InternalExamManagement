<?php
					$id=$_GET['id'];
					$faculty_id=$_SESSION['faculty_id'];
					$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Criteria' and tm.terms_id=$id ORDER BY tm.terms_id DESC";
                     $d=mysqli_query($conn,$sql);
					$r=mysqli_fetch_assoc($d);
			?>
<form action="" method="post">
<div class="block-header clearfix">
                <h2 class="pull-left">
                  
                    
                </h2>
				<div class="pull-right">
				</div>
            </div>	
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Evaluation Criteria For <?php echo $r['terms_title']; ?>
                            </h2>
                            
                        </div>
                        <div class="body">
                           
                                 <div class="form-group">
                                    <div class="form-line">
										<label>Course Name</label>
										<select class="form-control" name="course">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Course' ORDER BY tm.terms_id";
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
										<select class="form-control" name="semester">
											<option value="">-- Please select --</option>

											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Semester' ORDER BY tm.terms_id ";
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
										<label>Subject Name</label>
										<select class="form-control" name="subject">
											<option value="">-- Please select --</option>
										<?php	
											$sql="SELECT subject.terms_title,subject.terms_id
												from timetable_master as tm INNER JOIN terms_master as subject on tm.subject_id = subject.terms_id INNER JOIN user_master as um on um.user_id= tm.user_id where tm.user_id=$faculty_id";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):		
								        ?>   
										<option value="<?php echo $r['terms_id']; ?>"><?php echo $r['terms_title']; ?></option>
											<?php endwhile; ?>   
										</select>
									</div>
								 </div>
                               	
								<input type="submit" class="btn btn-primary m-t-15 waves-effect" name="submit" value="Submit">
							    <!--<a href="master_faculty.php?page=upload_marks.php" class="btn btn-primary waves-effect btn-lg">Submit</a>-->
                              
						</div>
                    </div>
                </div>
            </div>
			
			</form>
			
<?php
		if(isset($_POST['submit']))
		{
			$course=$_POST['course'];
			$semester=$_POST['semester'];
			$subject=$_POST['subject'];
				$sql="select * from demo where exam_id=$id and sem_id=$semester and subject_id=$subject and faculty_id=$faculty_id";
				$d=mysqli_query($conn,$sql);
				//if(mysqli_affected_rows($conn)!=0)
				//{
					//echo "<script>alert('You Already Inserted Marks into this Semester')</script>";
				//}
				//else
				//{
					echo "<script>window.location.href='master_faculty.php?page=upload_marks.php&id=$id&cid=$course&sid=$semester&sub_id=$subject';</script>";
			//	}	
		}

?>
			