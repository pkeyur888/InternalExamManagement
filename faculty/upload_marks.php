
<?php
				$id=$_GET['id'];
				$type=$_GET['type'];
						$sql="Select exam_id from result_master where exam_id=$id";
						mysqli_query($conn,$sql);
						if(mysqli_affected_rows($conn)!=0)
						{
							echo "<script>alert('you already insert marks...');window.location.href='master_faculty.php?page=upload.php';</script>";
							
						}
						
						
					$faculty=$_SESSION['faculty_id'];
				
					$sql="Select * from sub_exam where sub_exam_id=$id and type=$type";
                     $d=mysqli_query($conn,$sql);
					$r=mysqli_fetch_assoc($d);
					$cid=$r['course_id'];
					$sid=$r['sem_id'];
					$sub_id=$r['subject_id'];
					
					
			?>   
<form action="#" method="post">			
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center><h2> Evaluation Criteria For <?php echo $r['criteria_title']; ?></h2></center>
                    <div class="card">
                        <div class="header">
                            <h2>
                                 Students List
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="">
							    <table class="table table-bordered table-striped table-hover dataTable ">
                                    
                                   
									<thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Enrollment No</th>
											<th>Student Name</th>
											<th>Enter Marks</th>
                                            
                                        </tr>
                                    </thead>
                                        
                                    
                                    <tbody>
                                  <?php
											$i=0;	
											
											$sql="select * from student_master as sm INNER JOIN user_master as um ON sm.user_id=um.user_id where sm.course_id=$cid and sm.sem_id=$sid";
											$data=mysqli_query($conn,$sql);
											while($res=mysqli_fetch_assoc($data)):
												$i++;
												
								  ?>
                                    <tr role="row" class="odd">
                                            <td class="sorting_1"><?php echo $i; ?></td>
                                            <td><?php echo $res['enrollment_no']; ?></td>
                                            <td><?php echo $res['fname']; ?></td>
											<input type="hidden" id="1" name="h1[]" value="<?php echo $res['user_id']; ?>">
											<td><input type="text" name="txt1[]" value=""><br></td>
                                            <?php //echo "<script> setDefaults(); </script> ";?>
                                     </tr>
									 <?php endwhile; ?>
										
										</tbody>
                                </table>
								<input type="submit" class="btn btn-primary m-t-15 waves-effect" name="submit" value="Submit">&nbsp; &nbsp;
								<a href="master_faculty.php?page=form.php&id=<?php echo $id; ?>&type=<?php echo $type; ?>" class="btn btn-primary m-t-15 waves-effect" >Upload Excle File</a> 
                        </div>
                    </div>
                </div>
				
</form>	
     

	 <?Php
	
	 
			if(isset($_POST['submit']))
			{
				$no=array();
				$mark=array();
				$mark=$_POST['txt1'];
				$no=$_POST['h1'];
				$c=count($no);
			
				for($j=0;$j<$i;$j++)
				{
					if($mark[$j]=="")
					{
						$mark[$j]=999;
					}
					echo $mark[$j]."<br>";
				}
			
			
				for($j=0;$j<$c;$j++)
				{
					
					$n=$no[$j];
					$m=$mark[$j];
					//echo $m."   ".$n ;
					//echo "insert into result_master values(NULL,$id,$sid,$sub_id,$type,$faculty,$n,$m)<br>";
					 $sql ="insert into result_master values(NULL,$id,$sid,$sub_id,$type,$faculty,$n,$m)";
					mysqli_query($conn,$sql);
					if(mysqli_affected_rows($conn)!=1)
					{
						echo "<script>alert('problem in Roll no $n')</script>";
					}	
				}	
				if(mysqli_affected_rows($conn)==1)
					{
						echo "<script>alert('Marks Sucessfully Inserted...');window.location.href='master_faculty.php?page=upload.php'</script>";
					}	
			}
	 ?>
			
