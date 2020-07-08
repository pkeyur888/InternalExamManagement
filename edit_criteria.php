<?php
		$id=$_GET['id'];
		$data=mysqli_query($conn,"Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.terms_id = $id");
		$res=mysqli_fetch_assoc($data);
?>

<form action="#" method="post">
<div class="block-header clearfix">
             
				<div class="pull-right">
				<a href="index.php?page=course.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
				</div>
            </div>

			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Criteria
                            </h2>
                            
                        </div>
                        <div class="body">
                           
                                <label for="email_address">Criteria Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="criteria_name" value="<?php echo $res['terms_title'];?>"class="form-control" placeholder="Enter course name">
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
			$criteria=$_POST['criteria_name'];
			
		 
			$sql="update `terms_master` set `terms_title`='$criteria' where `terms_id`=$id ";
			$k=mysqli_query($conn,$sql);
			
			if($k==1  )
			{
				echo "<script>alert('Data Successfully Updated..');window.location.href='index.php?page=criteria.php';</script>";
				
			}
			else
			{
				echo "<script>alert('Problem To Update Try After Some Time....')</script>";
			}
		}
?>