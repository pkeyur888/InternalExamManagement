<?php
	
?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<center><h2> Student Registration using Excel file </h2></center>
                    <div class="card">
                        <div class="header">
                            <h2>
                                FILE UPLOAD 
                               
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form action="fileupload_reg.php" id="frmFileUpload"  method="post" enctype="multipart/form-data">
                                <div class="">
									<input type="hidden" name="exam_id" value="<?php //echo $exam_id;?>">
									<div class="form-group">
                                    <div class="form-line">
										<label>Course Name</label>
										<select class="form-control" name="course">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Course'";
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
										<select class="form-control" name="semester">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Semester'";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['terms_id']; ?>"><?php echo $r['terms_title']; ?></option>
											<?php endwhile; ?>                                      
										</select>
									</div>
								 </div>
									
										<input type="file"  name="file" ><br>
  
										<input type= "submit" value ="Upload" name="submit"class="btn btn-primary m-t-15 waves-effect" >
                                </div>
								
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			<b><h3>Download Sample Excle File<h3></b>
			<a href="file/studenr_reg.xlsx" download="Sample File.xlsx" class="btn btn-primary waves-effect btn-lg" >Download File</a>
			
			
		