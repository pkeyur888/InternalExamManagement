<form action="#" method="post">
<div class="block-header clearfix">
                <h2 class="pull-left">
                   
                    
                </h2>
				<div class="pull-right">
				<a href="index.php?page=assign_subject.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
				</div>
            </div>

			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Assign Subject to Faculty
                            </h2>
                            
                        </div>
                        <div class="body">
                           
						    <label>Subject type</label>
								<div class="form-group">
                                    <input type="radio" name="type" id="theory" value="0"class="with-gap">
                                    <label for="theory">Theory</label>

                                    <input type="radio" name="type" id="practical" value="2" class="with-gap">
                                    <label for="practical" class="m-l-20">Practical</label>
                                </div>
								
                                 <div class="form-group">
                                    <div class="form-line">
										<label>Course Name</label>
										<select class="form-control" name="course" id="course">
											<option value="0">-- Please select --</option>
                                            <?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Course' ORDER BY tm.terms_id DESC";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d))
												{
											?>
											<option value="<?php echo $r['terms_id']; ?>"><?php echo $r['terms_title']; ?></option>
											<?php } ?>                                   
										</select>
									</div>
								 </div>
								<div class="form-group">
                                    <div class="form-line">
										<label>Semester Name</label>
										<select class="form-control" name="semester" id="semester">
											<option value="0">-- Please select --</option>
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
												                             
										</select>
									</div>
								 </div>
                               	
								<div class="form-group">
                                    <div class="form-line">
										<label>Faculty Name</label>
										<select class="form-control" name="faculty">
											<option value="">-- Please select --</option>
											<?php
											
												$sql="Select `user_id`,`name` from `faculty_master`";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):
												
											?>
											<option value="<?php echo $r['user_id']; ?>"><?php echo $r['name']; ?></option>
											<?php endwhile; ?>                                      
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
		$course=$_POST['course'];
		$semester=$_POST['semester'];
		$subject=$_POST['subject'];
		$faculty=$_POST['faculty'];
		$type=$_POST['type'];
		
		mysqli_query($conn,"insert into `timetable_master` values(NULL,$faculty,$course,$semester,$subject,$type)");
		if(mysqli_affected_rows($conn))
		{
			echo "<script>alert('Data Sucessfully inserted..');window.location.href='index.php?page=add_assign.php';</script>";
		}
		else
		{
				echo "<script>alert('Record not Inserted')</script>";
		}
	}


?>
<script type="text/javascript">


$("#theory").change(function(){
	$('#semester').get(0).selectedIndex = 0;
	$('#course').get(0).selectedIndex = 0;
	$("#semester").change(function(){
    $('#subject').find('option').remove().end(); //clear the subject ddl
	// var stateid = $(this).find("option:selected").val();
   // 
    //do the ajax call
	var courseId = $("#course").val();
	var semId = $("#semester").val();
	var typeId = $("#theory").val();
	//alert(typeId);
	//console.log(courseId+" , "+semId);
    $.ajax({
        url:'gettheory.php',
        type:'POST',
        data:{course:courseId, sem:semId,type:typeId},
        dataType:'json',
        success:function(data){
			 var obj = data;
			// console.log(obj);
			$('#subject').find('option').remove().end();
			
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
});
$("#practical").change(function(){
$('#semester').get(0).selectedIndex = 0;
$('#course').get(0).selectedIndex = 0;	
	$("#semester").change(function(){
    $('#subject').find('option').remove().end(); //clear the subject ddl
	// var stateid = $(this).find("option:selected").val();
   // 
    //do the ajax call
	var courseId = $("#course").val();
	var semId = $("#semester").val();
	var typeId = $("#practical").val();
	//alert(typeId);
	//console.log(courseId+" , "+semId);
    $.ajax({
        url:'getpractical.php',
        type:'POST',
        data:{course:courseId, sem:semId,type:typeId},
        dataType:'json',
        success:function(data){
			 var obj = data;
			// console.log(obj);
			$('#subject').find('option').remove().end(); 
			
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
});


</script>