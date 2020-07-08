<?php
			
			$s_id=$_SESSION['student_id'];
			$d=mysqli_query($conn,"select course_id,sem_id from student_master where user_id=$s_id");
			$r=mysqli_fetch_assoc($d);
			$course=$r['course_id'];
			$sem=$r['sem_id'];


?>

<form action="#" method="post">
  <div class="block-header clearfix">
    <h2 class="pull-left"> Result </h2>
        <div class="pull-right"> 
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
											<th>Subject</th>
											<th>Theory</th>
											<th>Pratical</th>
									   </tr>
									</thead>   
									   <?php
												$data=mysqli_query($conn,"Select tm.terms_title,tm.terms_id,ttm.type from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Subject' and discription=$course and ttm.terms_id in(select subject_id from result_master where sem_id=$sem) ORDER by ttm.terms_id ASC");
												while($result=mysqli_fetch_assoc($data)):
												$type=$result['type'];
												$sub=$result['terms_id']
									   ?>
									   <tr>
												<td><?php echo $result['terms_title']; ?></td>
												<?php
														$total=0;
														$total1=0;
														if($type==2)
														{
																$d=mysqli_query($conn,"SELECT se.sub_exam_id,se.subject_id,se.type,se.criteria_title,res.student_id,res.marks from sub_exam as se INNER JOIN result_master as res on res.exam_id=se.sub_exam_id 
																						where se.subject_id=$sub and res.student_id=$s_id and res.type=0 ORDER by se.sub_exam_id  ASC");
																						
																						$total=0;
																						$total1=0;
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
																								
																	$d=mysqli_query($conn,"SELECT se.sub_exam_id,se.subject_id,se.type,se.criteria_title,res.student_id,res.marks from sub_exam as se INNER JOIN result_master as res on res.exam_id=se.sub_exam_id 
																							where se.subject_id=$sub and res.student_id=$s_id and res.type=2 ORDER by se.sub_exam_id  ASC");
																	
																	$c=mysqli_affected_rows($conn);
																		
																		while($result=mysqli_fetch_assoc($d))
																		{
																			if($result['marks']==999)
																			{	$total1=$total1+0;}
																			else
																			{$total1=$total1+$result['marks'];}													
																		}
											?>
													<td><?php echo $total1; ?></td>
											<?php
														}
														else
														{
															$d=mysqli_query($conn,"SELECT se.sub_exam_id,se.subject_id,se.type,se.criteria_title,res.student_id,res.marks from sub_exam as se INNER JOIN result_master as res on res.exam_id=se.sub_exam_id 
																							where se.subject_id=$sub and res.student_id=$s_id and res.type=0 ORDER by se.sub_exam_id  ASC");
																		$c=mysqli_affected_rows($conn);
																			
																		while($result=mysqli_fetch_assoc($d))
																		{
																			if($result['marks']==999)
																			{$total=$total+0;}
																			else
																			{$total=$total+$result['marks'];}
																		}
											?>
															<td><?php echo $total; ?></td>
															<td>-----</td>
											<?php
														}
												?>
									   </tr>
										<?php endwhile; ?>
									
										
										
											
										
                                    
                                  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
         
            <!-- #END# Exportable Table -->
     

