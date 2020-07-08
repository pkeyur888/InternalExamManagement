
<form action="#" method="post">
  <div class="block-header clearfix">
    <h2 class="pull-left"> Sudent </h2>
    <div class="pull-right"> <a href="index.php?page=add_student_file.php" class="btn btn-primary waves-effect btn-lg">All Student Registration</a> &nbsp;<a href="index.php?page=add_student.php" class="btn btn-primary waves-effect btn-lg">Add Student</a> </div>
  </div>
  <div class="row clearfix">    
	<!-- Exportable Table -->           
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                STUDENT LIST
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Enrollment_no</th>
                                            <th>Email id</th>		
											<th>Course</th>
											<th>Semester</th>
                                            <th>Option</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    
                                        <?php 
			$i=0;
			$data = mysqli_query($conn,"Select sm.user_id,sm.fname,sm.lname,um.enrollment_no,um.email,sm.acadamic_year,tm.terms_title,semester.terms_title as semester from user_master as um Inner Join student_master as sm ON um.user_id = sm.user_id INNER JOIN terms_master as tm on tm.terms_id=sm.course_id INNER JOIN terms_master as semester on semester.terms_id=sm.sem_id ");
				while($result = mysqli_fetch_array($data))
				{
					$i++;
				
			
			?>
                <tr role="row" class="odd">
                  <td class="sorting_1"><?php echo $i; ?></td>
                  <td><?php echo $result['fname']; ?></td>
                  <td><?php echo $result['lname']; ?></td>
                  <td><?php echo $result['enrollment_no'];?></td>
                  <td><?php echo $result['email'];?></td>
				  <td><?php echo $result['terms_title'];?></td>
				  <td><?php echo $result['semester'];?></td>
                  <td><a href="index.php?page=edit_student.php&id=<?php echo $result['user_id']; ?>" class="btn btn-primary waves-effect btn-lg">Edit</td>
                  
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
     

