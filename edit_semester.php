<?php
		$id=$_GET['id'];
		$data=mysqli_query($conn,"Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.terms_id = $id");
		$res=mysqli_fetch_assoc($data);
		
?>

<form action="#" method="post">
<div class="block-header clearfix">
             
				<div class="pull-right">
				<a href="index.php?page=semester.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
				</div>
            </div>

			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Semester
                            </h2>
                            
                        </div>
                        <div class="body">
                                  
								   <div class="form-group">
                                    <div class="form-line">
									<label>Semester</label>
										<select class="form-control" name="semester">
											<option value="1" <?php if($res['terms_title']==1) echo 'selected="selected"';?>>1</option>
											<option value="2" <?php if($res['terms_title']==2) echo 'selected="selected"';?>>2</option>   
											<option value="3" <?php if($res['terms_title']==3) echo 'selected="selected"';?>>3</option>   
											<option value="4" <?php if($res['terms_title']==4) echo 'selected="selected"';?>>4</option>   
											<option value="5" <?php if($res['terms_title']==5) echo 'selected="selected"';?>>5</option>   
											<option value="6" <?php if($res['terms_title']==6) echo 'selected="selected"';?>>6</option>   
										</select>
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
			$semester=$_POST['semester'];
			
		 
			$sql="update `terms_master` set `terms_title`='$semester' where `terms_id`=$id ";
			$k=mysqli_query($conn,$sql);
			
			if($k==1  )
			{
				echo "<script>alert('Data Successfully Updated..');window.location.href='index.php?page=semester.php';</script>";
				

				
			}
			else
			{
				echo "<script>alert('Problem To Update Try After Some Time....')</script>";
			}
		}
?>
	