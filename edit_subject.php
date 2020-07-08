<?php
		$id=$_GET['id'];
		$data=mysqli_query($conn,"Select course.terms_id as course_id,sem.terms_id as sem_id,sem.terms_title as sem,tm.terms_title,ttm.code,ttm.type from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id INNER JOIN terms_master as course on course.terms_id=ttm.discription INNER join terms_master as sem on sem.terms_id=ttm.parent_id Where ttm.terms_id = $id");
		$res=mysqli_fetch_assoc($data);
		$course=$res['course_id'];
		$sem=$res['sem_id'];
?>

<form action="#" method="post">
<div class="block-header clearfix">
             
				<div class="pull-right">
				<a href="index.php?page=subject.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
				</div>
            </div>

			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Subject
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="form-group">
                                    <div class="form-line">
										<label>Course Name</label>
										<select class="form-control" name="course_name">
											
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Course' ORDER BY tm.terms_id DESC";
												
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['terms_id']; ?>" <?php if($r['terms_id']==$course) echo 'selected="selected"'; ?>><?php echo $r['terms_title']; ?></option>
											<?php endwhile; ?>                                    
										</select>
									</div>
								 </div>
								 <div class="form-group">
                                    <div class="form-line">
										<label>Semester Name</label>
										<select class="form-control" name="semester_name">
											

											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Semester' ORDER BY tm.terms_id DESC";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['terms_id']; ?>"<?php if($r['terms_id']==$sem) echo 'selected="selected"'; ?> ><?php echo $r['terms_title']; ?></option>
											<?php endwhile; ?>                                                                       
										</select>
									</div>
								 </div>
                                <label for="email_address">Subject Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="subject_name" value="<?php echo $res['terms_title'];?>"class="form-control" placeholder="Enter subject name">
                                    </div>
                                </div>
								<label for="email_address">Subject Code</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="subject_code" value="<?php echo $res['code'];?>"class="form-control" placeholder="Enter subject name">
                                    </div>
                                </div>
								<label>Subject type</label>
								<div class="demo-checkbox">	
									<input type="checkbox" id="basic_checkbox_2" class="filled-in" name="type" value="2"<?php if($res['type']==2) echo 'checked="checked"';?>  />
									<label for="basic_checkbox_2">Practical</label>
									<input type="checkbox" id="basic_checkbox_4" class="filled-in" name="type" checked disabled />
									<label for="basic_checkbox_4">Theory</label>
                            </div><br>
								 
                            
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
			$semester=$_POST['semester_name'];
			$subject=$_POST['subject_name'];
			$code=$_POST['subject_code'];
			if(isset($_POST['type']))
			{
				$type=$_POST['type'];
			}
			else
			{
				$type=0;
			}
			
		 
			$sql="update `terms_master` set `terms_title`='$subject' where `terms_id`=$id ";
			$k=mysqli_query($conn,$sql);
			$sql="update `terms_texonomy_master` set code='$code',type=$type,discription='$course',parent_id=$semester where `terms_id`=$id ";
			$v=mysqli_query($conn,$sql);
			if(($k==1 && $v==1) ||($k==0 && $v==1) || ($k==1 && $v==0) || ($k==0 && $v==1) )
			{
				echo "<script>alert('Data Successfully Updated..');window.location.href='index.php?page=subject.php';</script>";
				
			}
			else
			{
				echo "<script>alert('Problem To Update Try After Some Time....')</script>";
			}
		}
?>