<?php
			$course=$_GET['cid'];
			$sem=$_GET['sid'];
			



?>

<form action="#" method="post">
  <div class="block-header clearfix">
    <h2 class="pull-left"> Result </h2>
        <div class="pull-right"> <a href="index.php?page=finally.php" class="btn btn-primary waves-effect btn-lg">Back</a> </div>
  </div>
  <div class="row clearfix">    
	<!-- Exportable Table -->           
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Final Result
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
										
									
                                        <tr>
                                            <th>Sr. No</th>
											<th>Name</th>
											 <th>Enrollment No</th>
											<?php
												$data=mysqli_query($conn,"Select tm.terms_title,ttm.type from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Subject' and discription=$course and ttm.terms_id in(select subject_id from result_master where sem_id=$sem) ORDER by ttm.terms_id ASC");
												while($res=mysqli_fetch_assoc($data)):
												$type=$res['type'];
												if($type==2)
												{
											?>
													<th><?php echo $res['terms_title']; ?>(Theory)</th>
													<th><?php echo $res['terms_title']; ?>(Practical)</th>
									       <?php 
												}
												else
												{	?>
													<th><?php echo $res['terms_title']; ?>(Theory)</th>
										<?php   }
										   
										   endwhile;  ?>
                                        </tr>
										
									</thead>
										
										<?php
											$i=0;
											$data=mysqli_query($conn,"SELECT um.user_id,um.enrollment_no,sm.fname,sm.lname from user_master as um inner join student_master as sm on um.user_id=sm.user_id where sm.course_id=$course and sm.sem_id=$sem");
											while($res=mysqli_fetch_assoc($data))
											{	
													$i++;
													$student_id=$res['user_id'];
										?>
										<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $res['lname'];?>&nbsp;<?php echo $res['fname']; ?></td>
												<td><?php echo $res['enrollment_no'];?></td>
										<?php
												
													$d1=mysqli_query($conn,"Select tm.terms_id,tm.terms_title,ttm.type from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Subject' and discription=$course and ttm.terms_id in(select subject_id from result_master where sem_id=$sem) ORDER by ttm.terms_id ASC");
													while($r=mysqli_fetch_assoc($d1))
													{	
															$sub=$r['terms_id'];
															$type=$r['type'];
															
															$total=0;
															$total1=0;
															if($type==2)
															{	
												
																$d=mysqli_query($conn,"SELECT se.sub_exam_id,se.subject_id,se.type,se.criteria_title,res.student_id,res.marks from sub_exam as se INNER JOIN result_master as res on res.exam_id=se.sub_exam_id 
																						where se.subject_id=$sub and res.student_id=$student_id and res.type=0 ORDER by se.sub_exam_id  ASC");
																								
																		while($result=mysqli_fetch_assoc($d))
																		{
																			if($result['marks']==999)
																			{$total=$total+0;}
																			else
																			{$total=$total+$result['marks'];}
																		}
												?>
															<td><?php echo $total; ?></td>
												
																	
												<?php	
																		$total1=0;
																	$d=mysqli_query($conn,"SELECT se.sub_exam_id,se.subject_id,se.type,se.criteria_title,res.student_id,res.marks from sub_exam as se INNER JOIN result_master as res on res.exam_id=se.sub_exam_id 
																							where se.subject_id=$sub and res.student_id=$student_id and res.type=2 ORDER by se.sub_exam_id  ASC");
																	
																	$c=mysqli_affected_rows($conn);
																		
																		while($result=mysqli_fetch_assoc($d))
																		{
																			if($result['marks']==999)
																			{	$total1=$total1+0;}
																			else
																			{$total1=$total1+$result['marks'];}													
																		}
													?>
																		<td><?php echo 	$total1; ?></td>						
													<?php			
															}
															else
															{
																	$d=mysqli_query($conn,"SELECT se.sub_exam_id,se.subject_id,se.type,se.criteria_title,res.student_id,res.marks from sub_exam as se INNER JOIN result_master as res on res.exam_id=se.sub_exam_id 
																							where se.subject_id=$sub and res.student_id=$student_id and res.type=0 ORDER by se.sub_exam_id  ASC");
																		$c=mysqli_affected_rows($conn);
																			
																		while($result=mysqli_fetch_assoc($d))
																		{
																			if($result['marks']==999)
																			{$total=$total+0;}
																			else
																			{$total=$total+$result['marks'];}
																		}
										?>
																	<td><?php  echo $total; ?></td>						
										<?php
																	}
													}	
													
										?>			
											
										</tr>
										<?php }	?>
											
											
										
                                    
                                  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
         
            <!-- #END# Exportable Table -->
     

