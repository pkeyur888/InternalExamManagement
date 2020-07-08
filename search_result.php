<?php
	$course=$_GET['cid'];
	$semester=$_GET['sid'];
	$subject=$_GET['sub_id'];
	
	$sub_exam_id=$_GET['sub_exam_id'];
	$type=$_GET['type'];
	
if(isset($_GET['name']))
{	
	$name=$_GET['name'];	
}
else
{ $name=$_GET['number'];	}
?>
<form action="" method="post">			

				<div class="pull-right">
				<a href="index.php?page=search.php" class="btn btn-primary waves-effect btn-lg">BACK</a>
				</div>
            
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center><h2> View Result</h2></center>
                    <div class="card">
                        <div class="header">
                            <h2>
                                 Students List
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
							    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    
                                   
									<thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Enrollment No</th>
											<th>Student Name</th>
											<?php 
											if($sub_exam_id!=0)
											{
												if($type==0)
												{
													$d=mysqli_query($conn,"SELECT critearea.terms_title as cta, se.criteria_title,se.marks from sub_exam as se INNER JOIN terms_master as critearea on se.criteria_id = critearea.terms_id   Where se.course_id=$course and se.sem_id = $semester  and se.subject_id =$subject  and sub_exam_id=$sub_exam_id");
												}
												else
												{
													$d=mysqli_query($conn,"SELECT * from sub_exam  Where course_id=$course and sem_id = $semester  and subject_id =$subject  and type=$type and sub_exam_id=$sub_exam_id");
												}
												$r=mysqli_fetch_assoc($d);
												if($type==0)
												{ ?>
													<th><?php echo $r['cta']; ?><br>(<?php echo $r['criteria_title']; ?>)<br>( <?php echo $r['marks']; ?>)</th>
												<?php }
													  else
													  {?>
														  <th><?php echo $r['criteria_title']; ?><br>( <?php echo $r['marks']; ?>)</th>
											<?php	  }
											
											}
											else
											{
											
											$c=0;
											if($type==0)
											{	
												$sql="SELECT critearea.terms_title as cta, se.criteria_title,se.marks from sub_exam as se INNER JOIN terms_master as critearea on se.criteria_id = critearea.terms_id   Where se.course_id=$course and se.sem_id = $semester  and se.subject_id =$subject  and sub_exam_id in(SELECT exam_id FROM result_master)ORDER by sub_exam_id ASC";
											}
											else
											{
												$sql="SELECT * from sub_exam  Where course_id=$course and sem_id = $semester  and subject_id =$subject  and type=$type and sub_exam_id in(SELECT exam_id FROM result_master)ORDER by sub_exam_id ASC";
											}
										$data=mysqli_query($conn,$sql);
										while($res=mysqli_fetch_assoc($data)):
										$c=$c+$res['marks'];
											if($type==0)
											{
											?>
												<th><?php echo $res['cta']; ?><br>(<?php echo $res['criteria_title']; ?>)<br>( <?php echo $res['marks']; ?>)</th>
									<?php 	}
											else
											{?>
												<th><?php echo $res['criteria_title']; ?><br>( <?php echo $res['marks']; ?>)</th>
									<?php	}	
                                             endwhile; ?>
											<th>Total(<?php echo $c;?>)</th>
                                        </tr>
											<?php }?>
                                    </thead>
                                   <tbody>
                                  <?php
										$i=0;
										$sql="select um.enrollment_no,sm.fname,sm.user_id from student_master as sm INNER join user_master as um ON sm.user_id=um.user_id WHERE course_id =$course and sm.sem_id=$semester and um.user_id=$name ";
										$data=mysqli_query($conn,$sql);
										$res=mysqli_fetch_assoc($data);
											$i++;
								  ?>
                                    <tr role="row" class="odd">
                                            <td class="sorting_1"><?php echo $i; ?></td>
                                            <td><?php echo $res['enrollment_no'];?></td>
                                            <td><?php echo $res['fname']; ?></td>
										<?php 
										$studentid = $res['user_id'];
										if($sub_exam_id!=0)
										{
											$d1=mysqli_query($conn,"select marks from result_master Where student_id=$studentid and exam_id=$sub_exam_id");
											$r1=mysqli_fetch_assoc($d1);
											if($r1['marks']==999)
												{$r1["marks"]='AB';}
										?>	
											<td><?php echo $r1["marks"]; ?></td>
										<?php	
										}
										else
										{
											$k=0;
											if($type==0)
											{
												$sql =" select marks from result_master Where student_id=$studentid and exam_id IN (SELECT se.sub_exam_id from sub_exam as se INNER JOIN terms_master as critearea on se.criteria_id = critearea.terms_id Where se.sem_id = $semester  and se.subject_id =$subject  )ORDER BY exam_id ASC";
											}
											else
											{
												$sql="select marks from result_master Where student_id=$studentid and exam_id IN (SELECT sub_exam_id from sub_exam  Where course_id=$course and sem_id = $semester  and subject_id =$subject and type=$type and sub_exam_id in(SELECT exam_id FROM result_master)ORDER by sub_exam_id ASC )ORDER BY exam_id ASC"; 
											}
											$data123=mysqli_query($conn,$sql);
											while($res123=mysqli_fetch_assoc($data123)):
												if($res123['marks']==999)
												{$res123["marks"]='AB';}
											
												$k=$k+$res123["marks"];
											?>
											<td><?php echo $res123["marks"]; ?></td>
                                            <?php endwhile; ?>	
                                            <td><?php echo $k; ?></td>  
                                     </tr>
									
										<?php } ?>
										</tbody>     
                                    
                                   
                                </table>
								
                    </div>
                </div>
				
</form>	
     