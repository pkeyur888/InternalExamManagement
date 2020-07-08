<?php
	$faculty_id=$_SESSION['faculty_id'];
?>
<form action="#" method="post">
  <div class="block-header clearfix">
    <h2 class="pull-left">Add Exam</h2>
    <div class="pull-right"><a href="master_faculty.php?page=add_exam.php&type=p" class="btn btn-primary waves-effect btn-lg">Add Practical Exam</a> &nbsp; <a href="master_faculty.php?page=add_exam.php" class="btn btn-primary waves-effect btn-lg">Add Theory Exam</a> </div>
  </div>
  <div class="row clearfix">    
	<!-- Exportable Table -->           
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Exam
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Course</th>
                                            <th>Semester</th>
                                            <th>Subject</th>
                                            <th>Exam Title</th>
											<th>Marks</th>
											<th>Exam Type</th>
											<th>Time</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    
                                        <?php 
			$i=0;
			$data = mysqli_query($conn,"SELECT se.type,se.exam_date,course.terms_title as course,se.marks,sem.terms_title as semester,sub.terms_title as subject,se.criteria_title as name from
										sub_exam as se INNER JOIN terms_master as course on se.course_id=course.terms_id
										INNER JOIN terms_master as sem on se.sem_id=sem.terms_id
										INNER JOIN terms_master as sub on se.subject_id=sub.terms_id and se.faculty_id=$faculty_id");
				while($result = mysqli_fetch_array($data))
				{
					$i++;
				
			
			?>
                <tr role="row" class="odd">
                  <td class="sorting_1"><?php echo $i; ?></td>
                  <td><?php echo $result['course']; ?></td>
                  <td><?php echo $result['semester']; ?></td>
                  <td><?php echo $result['subject'];?></td>
                  <td><?php echo $result['name'];?></td>
				  <td><?php echo $result['marks'];?></td>
				  <td><?php if($result['type']==2) echo "Practical"; else echo "Theory";?></td>
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
     

