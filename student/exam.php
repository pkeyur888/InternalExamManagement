
<form action="#" method="post">
  
  <div class="row clearfix">    
	<!-- Exportable Table -->           
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXAM LIST
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
											<th>Subject Name</th>
											<th>Subject type</th>
                                            <th>Exam Name</th>
											<th>Date</th>
											
                                            
                                        </tr>
                                    </thead>
                                    
                                    
            <?php 
					$id=$_SESSION['student_id'];
					$d=mysqli_query($conn,"SELECT * from student_master where user_id=$id ");
					$r=mysqli_fetch_assoc($d);
					$course=$r['course_id'];
					$sem=$r['sem_id'];
					$i=0;
					$data = mysqli_query($conn,"select * from sub_exam as se inner join terms_master as tm on tm.terms_id=se.subject_id   where course_id=$course and sem_id=$sem");
					while($result = mysqli_fetch_array($data))
					{
						$i++;
				
			
			?>
                <tr role="row" class="odd">
                  <td class="sorting_1"><?php echo $i; ?></td>
				   <td><?php echo $result['terms_title']; ?></td>
				   <td><?php  if($result['type']==2) echo "Practical"; else echo "Theory"; ?></td>
                  <td><?php echo $result['criteria_title']; ?></td>
				  <td><?php echo $result['exam_date'];?></td>
				  
                </tr>
                <?php 
				}
			  
			  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
         
            <!-- #END# Exportable Table -->
     

