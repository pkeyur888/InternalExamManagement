<?php
		$exam_id=$_GET['id'];
		
		$type=$_GET['type'];
		$faculty=$_SESSION['faculty_id'];
		
		
				
					$sql="Select * from sub_exam where sub_exam_id=$exam_id and type=$type";
                     $d=mysqli_query($conn,$sql);
					$r=mysqli_fetch_assoc($d);
					$cid=$r['course_id'];
					$sem_id=$r['sem_id'];
					$sub_id=$r['subject_id'];
					
?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<center><h2> Evaluation Criteria For <?php echo $r['criteria_title']; ?></h2></center>
                    <div class="card">
                        <div class="header">
                            <h2>
                                FILE UPLOAD 
                               
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form action="fileupload.php" id="frmFileUpload"  method="post" enctype="multipart/form-data">
                                <div class="">
									<input type="hidden" name="exam_id" value="<?php echo $exam_id;?>">
									<input type="hidden" name="type" value="<?php echo $type;?>">
									<input type="hidden" name="sem_id" value="<?php echo $sem_id;?>">
									<input type="hidden" name="sub_id" value="<?php echo $sub_id;?>">
										<input type="file"  name="file" ><br>
  
										<input type= "submit" value ="Upload" name="submit"class="btn btn-primary m-t-15 waves-effect" >
                                </div>
								
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			<b><h3>Download Sample Excle File<h3></b>
			<a href="../file/Book1.xlsx" download="Sample File.xlsx" class="btn btn-primary waves-effect btn-lg" >Download File</a>
			
		