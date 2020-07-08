
<form action="#" method="post">
  <div class="block-header clearfix">
    <h2 class="pull-left">Assign Subject to Faculty  </h2>
    <div class="pull-right"> <a href="index.php?page=add_assign.php" class="btn btn-primary waves-effect btn-lg">Assign Subject</a> </div>
  </div>
  <div class="row clearfix">    
	<!-- Exportable Table -->           
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Assign Subject to Faculty
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
											<th>Subject Type</th>
                                            <th>Faculty</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    
                                        <?php 
			$i=0;
			$data = mysqli_query($conn,"SELECT tm.timetable_id, tm.user_id,tm.type, fm.name, tm.course_id,tm.sem_id,
			 tm.subject_id, course.terms_title as coursename, semester.terms_title as semname, subject.terms_title as subjectname
from timetable_master as tm INNER JOIN terms_master as course ON tm.course_id = course.terms_id
INNER JOIN terms_master as semester ON tm.sem_id = semester.terms_id
INNER JOIN terms_master as subject on tm.subject_id = subject.terms_id
INNER JOIN faculty_master as fm ON tm.user_id = fm.user_id");
				while($result = mysqli_fetch_array($data))
				{
					$i++;
				
			
			?>
                <tr role="row" class="odd">
                  <td class="sorting_1"><?php echo $i; ?></td>
                  <td><?php echo $result['coursename']; ?></td>
                  <td><?php echo $result['semname']; ?></td>
                  <td><?php echo $result['subjectname'];?></td>
				  <td><?php  if($result['type']==2) echo "Pracical"; else echo "Theory";?></td>
                  <td><?php echo $result['name'];?></td>
                 
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
     

