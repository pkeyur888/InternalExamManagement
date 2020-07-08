<form action="#" method="post" enctype="multipart/form-data">
<div class="block-header clearfix">
                <h2 class="pull-left">
                   
                    
                </h2>
				<div class="pull-right">
				<a href="index.php?page=notice.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
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
                            
							 
							
								
							
								
								 <label for="email_address">Notice Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" placeholder="Enter notice name ">
                                    </div>
                                </div>
								<label for="email_address">Notice Pdf</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="file" class="form-control" placeholder="Enter exam date">
                                    </div>
                                </div>
								
								
								
								
								
							    <div class="form-group">
                                    <div class="form-line">
									<label>Status</label>
										<select class="form-control" name="status">
											<option value="">-- Please select --</option>
											<option value="0">Block</option>
											<option value="1">Unblock</option>                                    
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
			$title=$_POST['title'];
			$status=$_POST['status'];
			$mPath = "file/".$_FILES["file"]["name"];
			$type=$_FILES['file']['type'];
			if($type=="application/pdf"  || $type=="image/png" || $type=="image/jpg" || $type=="image/jpeg" )
			{
				$k=move_uploaded_file($_FILES['file']['tmp_name'],$mPath);	
			}
			else
			{
				echo "selct only PDF File  ";
			}
			mysqli_query($conn,"insert into notification values(null,'$title','$mPath',$status)");
			if(mysqli_affected_rows($conn)==1 && $k==1)
			{
				echo "<script>alert('File Successfully uploaded...')</script>";
			}
			else
			{
				echo "<script>alert('Problem to uploaded file...')</script>";
			}
			
		}
		

?>		
	

