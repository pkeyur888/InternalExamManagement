
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
                               Search Result
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
								
								 <div class="row clearfix">
                                <div class="col-sm-6">
									<label>Student Name</label>
                                    <select class="form-control show-tick" name="name" id="name">
                                        <option value="">-- Please select --</option>
                                        <option value="<?php echo $r['user_id']; ?>"><?php echo $r['fname']; ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
									<label>Student Number</label>
                                    <select class="form-control" name="number" id="number">
                                       <option value="">-- Please select --</option>
                                       
                                        
                                    </select>
                                </div>
                            </div>
							<div class="form-group">
                                    <div class="form-line">
										<label>Criteria Name</label>
										<select class="form-control" name="criteria" id="criteria" >
											<option value="">-- Please select --</option>	
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
			$name=$_POST['name'];
			$number=$_POST['number'];
			$type=$_POST['type'];
			$criteria=$_POST['criteria'];
		if($subject==0)
		{
				echo "<script>alert('Please Select subject')</script>";
		}		
		else if($name==0 && $number==0)
				{
					echo "<script>alert('Please Select Any one from Student name or Number')</script>";
				}
				else if($name!=0 && $number!=0)
					{
						echo "<script>alert('Please Select only one from Student name or Number')</script>";
					}	
					else if($name!=0)
						{
							echo "<script>window.location.href='master_faculty.php?page=search_result.php&cid=$course&sid=$semester&sub_id=$subject&name=$name&sub_exam_id=$criteria&type=$type';</script>";
						}	
						else if($number!=0)
							{ 
								echo "<script>window.location.href='master_faculty.php?page=search_result.php&cid=$course&sid=$semester&sub_id=$subject&number=$number&sub_exam_id=$criteria&type=$type';</script>";
							}	
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
		alert("Please Select Subject Type..");window.location.href='master_faculty.php?page=search.php';
	}
	
		
		 course=$("#course").val();
		if(course==0)
		{
			alert("Please Select Course..");window.location.href='master_faculty.php?page=search.php';
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
$("#semester").change(function(){
    $('#name').find('option').remove().end(); //clear the subject ddl
	// var stateid = $(this).find("option:selected").val();
   // alert(country);
    //do the ajax call
	var courseId = $("#course").val();
	var semId = $("#semester").val();
	//console.log(courseId+" , "+semId);
    $.ajax({
        url:'getname.php',
        type:'POST',
        data:{course:courseId, sem:semId},
        dataType:'json',
        success:function(data){
			 var obj = data;
			// console.log(obj);
         var ddl = document.getElementById('name');                      

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
$("#semester").change(function(){
    $('#number').find('option').remove().end(); //clear the subject ddl
	// var stateid = $(this).find("option:selected").val();
   // alert(country);
    //do the ajax call
	var courseId = $("#course").val();
	var semId = $("#semester").val();
	//console.log(courseId+" , "+semId);
    $.ajax({
        url:'getnumber.php',
        type:'POST',
        data:{course:courseId, sem:semId},
        dataType:'json',
        success:function(data){
			 var obj = data;
			// console.log(obj);
         var ddl = document.getElementById('number');                      

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


$("#subject").change(function(){
    $('#criteria').find('option').remove().end(); //clear the subject ddl
	// var stateid = $(this).find("option:selected").val();
    
    //do the ajax call
	var courseId = $("#course").val();
	var semId = $("#semester").val();
	var subId = $("#subject").val();
	var type=999;
	
	
			for (var i = 0; i < document.getElementsByName('type').length; i++)
		{
			if (document.getElementsByName('type')[i].checked)
			{
				var type=document.getElementsByName('type')[i].value;
			}
		}
	//alert(subId);
	//console.log(courseId+" , "+semId);
    $.ajax({
        url:'getcriteria.php',
        type:'POST',
        data:{course:courseId, sem:semId,sub:subId,type:type},
        dataType:'json',
        success:function(data){
			 var obj = data;
			// console.log(obj);
         var ddl = document.getElementById('criteria');                      

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
</script>
	