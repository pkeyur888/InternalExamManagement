<form action="#" method="post">
<div class="block-header clearfix">
                <h2 class="pull-left">
                  
                    
                </h2>
				<div class="pull-right">
				<a href="index.php?page=semester.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
				</div>
            </div>

			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD NEW SEMESTER
                            </h2>
                            
                        </div>
                        <div class="body">
                           
                                
                                <div class="form-group">
                                    <div class="form-line">
										<label>Semester Name</label>
										<select class="form-control" name="semester_name">
											<option value="">-- Please select --</option>
											<option value="1">1</option>
											<option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>                                    
										</select>
									</div>
								 </div>
								
                             <!--  <div class="form-group">
                                    <div class="form-line">
									<label>Status</label>
										<select class="form-control" name="status">
											<option value="">-- Please select --</option>
											<option value="0">Block</option>
											<option value="1">Unblock</option>                                    
										</select>
									</div>
								 </div> -->

                                
                                
                                <input type="submit" name="submit" value="Submit"class="btn btn-primary m-t-15 waves-effect">

                        </div>
                    </div>
                </div>
            </div>			
			</form>
<?php
		if(isset($_POST['submit']))
		{
			$id="0";
			$semester=$_POST['semester_name'];
			
			$sql="INSERT INTO `terms_master` VALUES (NULL,'$semester')";
			mysqli_query($conn,$sql);
			if(mysqli_affected_rows($conn)==1)
			{
				$data = mysqli_query($conn,"Select MAX(terms_id) as mid from terms_master ORDER BY terms_id");
				while($result = mysqli_fetch_array($data))
				{
					$id = $result['mid'];
				}
				$sql="INSERT INTO `terms_texonomy_master` VALUES(NULL,$id,0,'Semester','','',NULL)";
				mysqli_query($conn,$sql);
				if(mysqli_affected_rows($conn)==1)
				echo "<script>alert('Data Sucessfully inserted..');window.location.href='index.php?page=add_semester.php';</script>";
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