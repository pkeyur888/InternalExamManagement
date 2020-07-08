<?php
	$course=$_GET['cid'];
	$semester=$_GET['sid'];
	$subject=$_GET['sub_id'];
	$name=$_GET['name'];
	$faculty_id=$_SESSION['faculty_id'];

?>
<form action="" method="post">			
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
											<th>Marks1</th>
											<th>Marks2</th>
											<th>Marks2</th>
											<th>Marks2</th>
											
                                            
                                        </tr>
                                    </thead>
                                        
                                    
                                    <tbody>
                                  <?php
										$i=0;
										$sql="select um.enrollment_no,sm.fname,dm.marks,dm.student_id from demo as dm INNER JOIN  student_master as sm on dm.student_id=sm.user_id INNER JOIN user_master as um on um.user_id=dm.student_id WHERE  dm.sem_id=$semester AND dm.subject_id=$subject and dm.faculty_id=$faculty_id and (sm.fname LIKE '%$name%' or um.enrollment_no LIKE '%$name%')";
										$data=mysqli_query($conn,$sql);
										while($res=mysqli_fetch_assoc($data)):
											$i++;
											$c=$res['student_id'];
								  ?>
                                    <tr role="row" class="odd">
                                           <td class="sorting_1"><?php echo $i; ?></td>
                                            <td><?php echo $res['enrollment_no'];?></td>
                                            <td><?php echo $res['fname']; ?></td>
											<?php
													$sql1="Select marks from demo where exam_id=57 and student_id=$c ";
													$data1=mysqli_query($conn,$sql);
													$k=mysqli_num_rows($data1);
													echo $k."  ".$c."<br>";
													//$res1=mysqli_fetch_assoc($data1);

													/*$sql2="Select marks from demo where exam_id=47 student_id=$c";
													$data2=mysqli_query($conn,$sql2);	
													$res2=mysqli_fetch_assoc($data2);
													  
													
													$sql3="Select marks from demo where exam_id=46 student_id=$c";
													$data3=mysqli_query($conn,$sql3);													
													$res3=mysqli_fetch_assoc($data3);
													
													$sql4="Select marks from demo where exam_id=56 student_id=$c";
													$data4=mysqli_query($conn,$sql4);
													$res4=mysqli_fetch_assoc($data4);*/
											?>
											<td><?php //echo $res1['marks'];?></td>
											
											<td><?php //echo $res2['marks'];?> </td>
											 
											<td><?php //echo $res3['marks'];?> </td>
											<td><?php //echo $res4['marks'];?> </td>
                                          
                                     </tr>
									 
									 
									 
									
									 <?php endwhile; ?>
										
										</tbody>
                                </table>
								
                    </div>
                </div>
				
</form>	
     