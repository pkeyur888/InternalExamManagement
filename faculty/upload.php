
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
                               Upload Marks
                            </h2>
                            
                        </div>
                        <div class="body">
                           

								 <label>Subject type</label>
								<div class="form-group">
                                    <input type="radio" name="type" id="theory" value="0" class="with-gap">
                                    <label for="theory">Theory</label>

                                    <input type="radio" name="type" id="practical" value="2" class="with-gap">
                                    <label for="practical" class="m-l-20">Practical</label>
                                </div>
								 <div class="form-group">
                                    <div class="form-line">
										<label>Subject Name</label>
										<select class="form-control" name="subject" id="subject" required>
											<option value="">-- Please select --</option>
									 
										</select>
									</div>
								 </div>
								 <div class="form-group">
                                    <div class="form-line">
										<label>Exam Name</label>
										<select class="form-control" name="exam" id="exam"required>
											<option value="">-- Please select --</option>
										<?php	
									
											
                                            			
								        ?>   
										<option value="<?php //echo $r['terms_id']; ?>"><?php //echo $r['terms_title']; ?></option>
											<?php //endwhile; ?>   
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
			
			$subject=$_POST['subject'];
			$name=$_POST['exam'];
			$type=$_POST['type'];
			echo "<script>window.location.href='master_faculty.php?page=upload_marks.php&sub_id=$subject&id=$name&type=$type';</script>";
		}
?>
		<script type="text/javascript">
		/*-----------------------------------------theory start------------------------------------------------------*/
$("#theory").change(function(){
    $('#subject').find('option').remove().end(); //clear the subject ddl
	// var stateid = $(this).find("option:selected").val();
   // alert(country);
    //do the ajax call
	var type = $("#theory").val();
	
	//console.log(subject);
    $.ajax({
        url:'getattendance.php',
        type:'POST',
        data:{type:type},
        dataType:'json',
        success:function(data){
			 var obj = data;
			 //console.log(obj);
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
/*-----------------------------------------theory finish------------------------------------------------------*/

/*-----------------------------------------practical start------------------------------------------------------*/

$("#practical").change(function(){
    $('#subject').find('option').remove().end(); //clear the subject ddl
	// var stateid = $(this).find("option:selected").val();
   // alert(country);
    //do the ajax call
	var type = $("#practical").val();
	
	//console.log(subject);
    $.ajax({
        url:'getattendance.php',
        type:'POST',
        data:{type:type},
        dataType:'json',
        success:function(data){
			 var obj = data;
			// console.log(obj);
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

/*-----------------------------------------practical finish-------------------------------------------------------*/
$("#subject").change(function(){
    $('#exam').find('option').remove().end(); //clear the subject ddl
	// var stateid = $(this).find("option:selected").val();
   
    //do the ajax call
	
	var type=999;
			for (var i = 0; i < document.getElementsByName('type').length; i++)
		{
			if (document.getElementsByName('type')[i].checked)
			{
				var type=document.getElementsByName('type')[i].value;
			}
		}
	var sub = $("#subject").val();
	// alert(type);
	 //alert(sub);
	//console.log(subject);
    $.ajax({
        url:'getexam.php',
        type:'POST',
        data:{type:type,sub:sub},
        dataType:'json',
        success:function(data){
			 var obj = data;
			  $('#exam').find('option').remove().end(); 
			// console.log(obj);
         var ddl = document.getElementById('exam');                      

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
			