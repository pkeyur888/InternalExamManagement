<?php
		$id=$_GET['id'];
		$data=mysqli_query($conn,"select * from user_master as um inner join faculty_master as fm on um.user_id=fm.user_id where fm.user_id=$id");
		$res=mysqli_fetch_assoc($data);
		
?>
<form action="#" method="post">
<div class="block-header clearfix">
                <h2 class="pull-left">
                 EDIT FACULTY
                    
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
                                EDIT FACULTY
                            </h2>
                            
                        </div>
                        <div class="body">
                           
                                <label>Faculty Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="faculty_name" class="form-control" value="<?php echo $res['name'];?>" placeholder="Enter faculty name">
                                    </div>
                                </div>
								<label>Expertise</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="expertise" class="form-control" value="<?php echo $res['expertise'];?>" placeholder="Enter expertise">
                                    </div>
                                </div>
								<label>Spaciality</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="spaciality" class="form-control" value="<?php echo $res['spaciality'];?>" placeholder="Enter spaciality">
                                    </div>
                                </div>
								<label>Educational Information</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="edu_info" class="form-control" value="<?php echo $res['educational_information'];?>" placeholder="Enter educational information">
                                    </div>
                                </div>
								<label>Experience Information</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="exper_info" class="form-control" value="<?php echo $res['experience_information'];?>" placeholder="Enter experience information">
                                    </div>
                                </div>
								<label>Email id </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" name="email" class="form-control" value="<?php echo $res['email'];?>" placeholder="Enter email id">
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
			
			$name=$_POST['faculty_name'];
			$expertise=$_POST['expertise'];
			$spaciality=$_POST['spaciality'];
			$edu_info=$_POST['edu_info'];
			$exper_info=$_POST['exper_info'];
			
			
					mysqli_query($conn,"update user_master set email='$email' where user_id=$id");
					$k=mysqli_affected_rows($conn);
					mysqli_query($conn,"update faculty_master set name='$name',expertise='$expertise',spaciality='$spaciality',educational_information='$edu_info',experience_information='$exper_info' where user_id=$id");
					$v=mysqli_affected_rows($conn);
					
					if(($k==1 && $v==1) ||($k==0 && $v==1) || ($k==1 && $v==0) || ($k==0 && $v==1) )
					{
						echo "<script>alert('Data Successfully Updated..');window.location.href='index.php?page=faculty.php';</script>";
				
				
					}
					else
					{
						echo "<script>alert('Problem to Updated  try after some time...')</script>";
					}
					
			
		}


?>			