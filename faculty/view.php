
<form action="" method="post">
<div class="block-header clearfix">
                <h2 class="pull-left">
                  
                    
                </h2>
				<div class="pull-right">
				</div>
            </div>	
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               View Result
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
										<select class="form-control" name="course" id="course" required>
											<option value="0">-- Please select --</option>
											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Course' ORDER BY tm.terms_id";
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
										<select class="form-control" name="semester" id="semester" required>
											<option value="0">-- Please select --</option>

											<?php
											
												$sql="Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Semester' ORDER BY tm.terms_id ";
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
										<select class="form-control" name="subject" id="subject" required>
											<option value="">-- Please select --</option>
										<?php	
										$faculty_id=$_SESSION['faculty_id'];
											$sql="SELECT subject.terms_title,subject.terms_id
												from timetable_master as tm INNER JOIN terms_master as subject on tm.subject_id = subject.terms_id INNER JOIN user_master as um on um.user_id= tm.user_id where tm.user_id=$faculty_id";
                                            	$d=mysqli_query($conn,$sql);
												while($r=mysqli_fetch_assoc($d)):		
								        ?>   
										<option value="<?php echo $r['terms_id']; ?>"><?php echo $r['terms_title']; ?></option>
											<?php endwhile; ?>   
										</select>
									</div>
								 </div>
                               	
								<input type="submit" class="btn btn-primary m-t-15 waves-effect" name="submit" value="Submit">
							    <!--<a href="master_faculty.php?page=upload_marks.php" class="btn btn-primary waves-effect btn-lg">Submit</a>-->
                              
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
			$type=$_POST['type'];
			if($subject==0)
			{
				echo "<script>alert('Please Select Subject..');window.location.href='master_faculty.php?page=view.php';</script>";
			}
			else
			echo "<script>window.location.href='master_faculty.php?page=view_marks.php&cid=$course&sid=$semester&sub_id=$subject&type=$type';</script>";
		}
?>
	

	
	<script type="text/javascript">


$("#semester").change(function(){
	 var type=999;
			for (var i = 0; i < document.getElementsByName('type').length; i++)
		{
			if (document.getElementsByName('type')[i].checked)
			{
				var type=document.getElementsByName('type')[i].value;
			}
		}
	if(type==999)
	{
		alert("Please Select Subject Type..");window.location.href='master_faculty.php?page=view.php';
	}
	
		
		 course=$("#course").val();
		if(course==0)
		{
			alert("Please Select Course..");window.location.href='master_faculty.php?page=view.php';
		}
		
	
});

$('input[type=radio]').change( function() {
   
   $('#semester').get(0).selectedIndex = 0;
$('#course').get(0).selectedIndex = 0;
	$("#semester").change(function(){
    $('#subject').find('option').remove().end(); //clear the subject ddl
	// var stateid = $(this).find("option:selected").val();
   // 
    var type=999;
			for (var i = 0; i < document.getElementsByName('type').length; i++)
		{
			if (document.getElementsByName('type')[i].checked)
			{
				var type=document.getElementsByName('type')[i].value;
			}
		}
	
	var courseId = $("#course").val();
	var semId = $("#semester").val();
	var typeId = $("#theory").val();
	//alert(type);
	//console.log(courseId+" , "+semId);
    $.ajax({
        url:'gettheory.php',
        type:'POST',
        data:{course:courseId, sem:semId,type:type},
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
</script>
	