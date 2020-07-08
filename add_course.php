<form action="#" method="post">
<div class="block-header clearfix">
                <h2 class="pull-left">
                  
                    
                </h2>
				<div class="pull-right">
				<a href="index.php?page=course.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
				</div>
            </div>

			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New Course
                            </h2>
                            
                        </div>
                        <div class="body">
                           
                                <label for="email_address">Course Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="course_name" class="form-control" placeholder="Enter course name">
                                    </div>
                                </div>
								<!-- <div class="form-group">
                                    <div class="form-line">
									<label>Status</label>
										<select class="form-control" name="status">
											<option value="">-- Please select --</option>
											<option value="0">Block</option>
											<option value="1">Unblock</option>                                    
										</select>
									</div>
								 </div>-->
                            
                                <input type="submit" class="btn btn-primary m-t-15 waves-effect" name="submit" value="Submit">

                        </div>
                    </div>
                </div>
            </div>
			
			</form>
<?php
		if(isset($_POST['submit']))
		{
			$course=$_POST['course_name'];
			
			$sql="INSERT INTO `terms_master`(`terms_title`) VALUES ('$course')";
			mysqli_query($conn,$sql);
			if(mysqli_affected_rows($conn)==1)
			{
				$data = mysqli_query($conn,"Select MAX(terms_id) as mid from terms_master ORDER BY terms_id");
				while($result = mysqli_fetch_array($data))
				{
					$id = $result['mid'];
				}
				$sql="INSERT INTO `terms_texonomy_master` VALUES(NULL,$id,0,'Course','','',NULL)";
				mysqli_query($conn,$sql);
				if(mysqli_affected_rows($conn))
				{
					
					echo "<script>alert('Data Sucessfully inserted..');window.location.href='index.php?page=add_course.php';</script>";
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
			