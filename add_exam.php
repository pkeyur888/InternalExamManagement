<form action="#" method="post">
<div class="block-header clearfix">
                <h2 class="pull-left">
                   
                    
                </h2>
				<div class="pull-right">
				<a href="index.php?page=exam.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
				</div>
            </div>

			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Exam
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
											<option value="<?php echo $r['terms_id']; ?>"><?php echo $r['terms_title']; ?></option>
											<?php endwhile; ?>                                    
										</select>
									</div>
								 </div>
								   
								  <label for="email_address">Exam Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" placeholder="Enter exam title">
                                    </div>
                                </div>
								<label for="email_address">Exam Date</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="exam_date" class="form-control" placeholder="Enter exam date">
                                    </div>
                                </div>
								
								 <label for="email_address">Total Marks</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="total_marks" class="form-control" placeholder="Enter total marks">
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
			$course=$_POST['course_name'];
			$title=$_POST['title'];	
			$date=$_POST['exam_date'];
			$marks=$_POST['total_marks'];
			
			
			mysqli_query($conn,"insert into exam_master values(NULL,'$title',$course,'$date',$marks)");
			if(mysqli_affected_rows($conn)==1)
			{
				echo "<script>alert('Data Successfully Inserted..');window.location.href='index.php?page=add_exam.php';</script>";
			}
			else
		    {
				
				echo "<script>alert('Record not Inserted')</script>";
			}
		}
		

?>			
	
