<!--------------------------------------------------start practical Exam--------------------------------------------->
<?php
	if(isset($_GET['type']))
	{
?>
<form action="#" method="post">
<div class="block-header clearfix">
                <h2 class="pull-left">
                   
                    
                </h2>
				<div class="pull-right">
				<a href="master_faculty.php?page=exam.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
				</div>
            </div>

			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Practical Exam
                            </h2>
                            
                        </div>
                        <div class="body">
                            
							  <div class="form-group">
                                    <div class="form-line">
										<label>Course Name</label>
										<select class="form-control" name="course"id="coursep">
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
								 <div class="form-group">
                                    <div class="form-line">
										<label>Semester Name</label>
										<select class="form-control" name="semester" id="semesterp">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Semester' ORDER BY tm.terms_id DESC";
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
										<select class="form-control" name="subject" id="subjectp">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Subject' ORDER BY tm.terms_id DESC";
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
										<label>Exam</label>
										<select class="form-control" name="exam">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from exam_master ";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['exam_id']; ?>"><?php echo $r['exam_title']; ?></option>
											<?php endwhile; ?>                                    
										</select>
									</div>
								 </div>
								<div class="form-group">
                                    <div class="form-line">
										<label>Criteria</label>
										<select class="form-control" name="criteria">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Criteria' ORDER BY tm.terms_id DESC";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['terms_id']; ?>"><?php echo $r['terms_title']; ?></option>
											
											<?php endwhile; ?>                                    
										</select>
									</div>
								 </div>
								  
								 
								 
                               
								<label for="email_address">Exam Date</label>
                               
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="datetime-local" class=" form-control" name="exam_date" placeholder="Please choose date & time...">
                                        </div>
                                    </div>
                                
								
								 <label for="email_address">Total Marks</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="total_marks" class="form-control" placeholder="Enter total marks">
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

								
								
								

                                <input type="submit" class="btn btn-primary m-t-15 waves-effect" name="submitp" value="Submit">

                        </div>
                    </div>
                </div>
            </div>
			
			</form>
<?php

	if(isset($_POST['submitp']))
		{
			
			$course=$_POST['course'];
			$semester=$_POST['semester'];
			$subject=$_POST['subject'];
			$name=$_POST['name'];
			$date=$_POST['exam_date'];
			$marks=$_POST['total_marks'];
			$faculty=$_SESSION['faculty_id'];
			$exam=$_POST['exam'];
			$criteria=$_POST['criteria'];
			$d1=mysqli_query($conn,"Select terms_title from terms_master where terms_id=$criteria");
			$criteria_name=mysqli_fetch_assoc($d1);
			$name=$criteria_name['terms_title'];
				mysqli_query($conn,"insert into sub_exam (`sub_exam_id`, `course_id`, `sem_id`, `subject_id`, `type`, `faculty_id`,`exam_id`,`criteria_id` ,`criteria_title`, `marks`, `exam_date`) values(NULL,$course,$semester,$subject,2,$faculty,$exam,$criteria,'$name',$marks,'$date')");
				if(mysqli_affected_rows($conn)==1)
				{
					echo "<script>alert('Data Sucessfully inserted..');window.location.href='master_faculty.php?page=add_exam.php&type=p';</script>";
					
				}
				else
				{
				
					echo "<script>alert('Record not Inserted')</script>";
				}
			
		}
		
?>
	
<!--------------------------------------------------Finish practical exam--------------------------------------------->	
<script type="text/javascript">
	$("#semesterp").change(function(){
    $('#subjectp').find('option').remove().end(); //clear the subject ddl
	// var stateid = $(this).find("option:selected").val();
   // alert(country);
    //do the ajax call
	var courseId = $("#coursep").val();
	var semId = $("#semesterp").val();
	var typeId = 1;
	//console.log(courseId+" , "+semId);
    $.ajax({
        url:'getsub.php',
        type:'POST',
        data:{course:courseId, sem:semId,type:typeId},
        dataType:'json',
        success:function(data){
			 var obj = data;
			// console.log(obj);
         var ddl = document.getElementById('subjectp');                      

         for(var c=0;c<obj.length;c++)
              {
			  	var dropVal = obj[c].split(',');              
               var option = document.createElement('option');
			   
               option.value = dropVal[1];
               option.text  = dropVal[0];                           
               ddl.appendChild(option);
              }
    },
        error:function(jxhr){
        	$("#getError").html(jxhr.responseText);
        

    }
    }); 

});
</script>
<?php }
		  else
		  {
	?>
<!--------------------------------------------------start Theory Exam--------------------------------------------->	
<form action="#" method="post">
<div class="block-header clearfix">
                <h2 class="pull-left">
                   
                    
                </h2>
				<div class="pull-right">
				<a href="master_faculty.php?page=exam.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
				</div>
            </div>

			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Theory Exam
                            </h2>
                            
                        </div>
                        <div class="body">
                            
							  <div class="form-group">
                                    <div class="form-line">
										<label>Course Name</label>
										<select class="form-control" name="course"id="course">
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
								 <div class="form-group">
                                    <div class="form-line">
										<label>Semester Name</label>
										<select class="form-control" name="semester" id="semester">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Semester' ORDER BY tm.terms_id DESC";
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
										<select class="form-control" name="subject" id="subject">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Subject' ORDER BY tm.terms_id DESC";
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
										<label>Exam</label>
										<select class="form-control" name="exam">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from exam_master ";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['exam_id']; ?>"><?php echo $r['exam_title']; ?></option>
											<?php endwhile; ?>                                    
										</select>
									</div>
								 </div>
								 <div class="form-group">
                                    <div class="form-line">
										<label>Criteria</label>
										<select class="form-control" name="criteria">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Criteria' ORDER BY tm.terms_id DESC";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['terms_id']; ?>"><?php echo $r['terms_title']; ?></option>
											<?php endwhile; ?>                                    
										</select>
									</div>
								 </div>
								 <label for="email_address">Criteria Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="criteria_name" class="form-control" placeholder="Enter criteria name ">
                                    </div>
                                </div>
								<label for="email_address">Exam Date</label>
                               
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="datetime-local" class=" form-control" name="exam_date" placeholder="Please choose date & time...">
                                        </div>
                                    </div>
                                
								
								 <label for="email_address">Total Marks</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="total_marks" class="form-control" placeholder="Enter total marks">
                                    </div>
                                </div>
								
								
								
							 <!--   <div class="form-group">
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
			
			$course=$_POST['course'];
			$semester=$_POST['semester'];
			$subject=$_POST['subject'];
			$exam=$_POST['exam'];
			$criteria=$_POST['criteria'];
			$criteria_name=$_POST['criteria_name'];
			$date=$_POST['exam_date'];
			$marks=$_POST['total_marks'];
			$faculty=$_SESSION['faculty_id'];
			//$status=$_POST['status'];
			$c=$marks;
			$d=mysqli_query($conn,"select marks from sub_exam where course_id=$course and sem_id=$semester  and subject_id=$subject  and faculty_id=$faculty and exam_id=$exam");
			while($r=mysqli_fetch_assoc($d))
			{
				$c=$c+$r['marks'];
			}
			
			if($c<=40)
			{
				mysqli_query($conn,"insert into sub_exam values(NULL,$course,$semester,$subject,0,$faculty,$exam,$criteria,'$criteria_name',$marks,'$date')");
				if(mysqli_affected_rows($conn)==1)
				{
					echo "<script>alert('Data Sucessfully inserted..');window.location.href='master_faculty.php?page=add_exam.php';</script>";
					
				}
				else
				{
				
					echo "<script>alert('Record not Inserted')</script>";
				}
			}
			else
			{
				echo "<script>alert('You could not enter all exam total more then 40 ');window.location.href='master_faculty.php?page=add_exam.php';</script>";
					
			}
		}
		

?>		
	
	
	<script type="text/javascript">
	$("#semester").change(function(){
    $('#subject').find('option').remove().end(); //clear the subject ddl
	// var stateid = $(this).find("option:selected").val();
   // alert(country);
    //do the ajax call
	var courseId = $("#course").val();
	var semId = $("#semester").val();
	//console.log(courseId+" , "+semId);
    $.ajax({
        url:'getsub.php',
        type:'POST',
        data:{course:courseId, sem:semId},
        dataType:'json',
        success:function(data){
			 var obj = data;
			// console.log(obj);
         var ddl = document.getElementById('subject');                      

         for(var c=0;c<obj.length;c++)
              {
			  	var dropVal = obj[c].split(',');              
               var option = document.createElement('option');
			   
               option.value = dropVal[1];
               option.text  = dropVal[0];                           
               ddl.appendChild(option);
              }
    },
        error:function(jxhr){
        	$("#getError").html(jxhr.responseText);
        

    }
    }); 

});
</script>
<?php
		  }
?>