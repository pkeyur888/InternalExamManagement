<form action="#" method="post">
<div class="block-header clearfix">
                <h2 class="pull-left">
                  
                    
                </h2>
				<div class="pull-right">
				<a href="index.php?page=subject.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
				</div>
            </div>

			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD NEW SUBJECT
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
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Semester' ";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['terms_id']; ?>"><?php echo $r['terms_title']; ?></option>
											<?php endwhile; ?>                                                                       
										</select>
									</div>
								 </div>
                               	<label>Subject Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="subject_name" class="form-control" placeholder="Enter subject name">
                                    </div>
                                </div>
									<label>Subject Code</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="subject_code" class="form-control" placeholder="Enter subject code">
                                    </div>
                                </div>
								<label>Subject type</label>
								<div class="demo-checkbox">	
									<input type="checkbox" id="basic_checkbox_2" class="filled-in" name="type" value="2"  />
									<label for="basic_checkbox_2">Practical</label>
									<input type="checkbox" id="basic_checkbox_4" class="filled-in" name="type" checked disabled />
									<label for="basic_checkbox_4">Theory</label>
                            </div><br>
								
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
			if(isset($_POST['type']))
			{
				$type=$_POST['type'];
			}
			else
			{
				$type=0;
			}
			
			
			$subject=$_POST['subject_name'];
			$code=$_POST['subject_code'];
			$semester=$_POST['semester_name'];
			$course=$_POST['course_name'];
			
			$sql="INSERT INTO `terms_master`(`terms_title`) VALUES ('$subject')";
			mysqli_query($conn,$sql);
			if(mysqli_affected_rows($conn)==1)
			{
				$data = mysqli_query($conn,"Select MAX(terms_id) as mid from terms_master ORDER BY terms_id");
				while($result = mysqli_fetch_array($data))
				{
					$id = $result['mid'];
				}
				//echo "INSERT INTO `terms_texonomy_master` VALUES(NULL,$id,$semester,'Subject','$course','','$code',$type)";
				$sql="INSERT INTO `terms_texonomy_master` VALUES(NULL,$id,$semester,'Subject','$course','$code',$type)";
				mysqli_query($conn,$sql);
				if(mysqli_affected_rows($conn)==1)
				{
					echo "<script>alert('Data Sucessfully inserted..');window.location.href='index.php?page=add_subject.php';</script>";	
				}
				else
				{
						echo "<script>alert('Record not inserted')</script>";
				}

				
			}
			else
			{
				echo "<script>alert('Record not inserted')</script>";
			}
		}
?>
			