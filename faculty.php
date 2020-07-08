
<form action="#" method="post">
  <div class="block-header clearfix">
    <h2 class="pull-left"> Faculty </h2>
    <div class="pull-right"> <a href="index.php?page=add_faculty.php" class="btn btn-primary waves-effect btn-lg">Add Faculty</a> </div>
  </div>
  <div class="row clearfix">    
	<!-- Exportable Table -->           
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FACULTY LIST
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>FacultyName</th>
                                            <th>expertise</th>
                                            <th>spaciality</th>
                                            <th>edu_info</th>
                                            <th>experience_info</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    
                                    
                                        <?php 
			$i=0;
			$data = mysqli_query($conn,"Select * from `faculty_master`");
				while($result = mysqli_fetch_array($data))
				{
					$i++;
				
			
			?>
                <tr role="row" class="odd">
                  <td class="sorting_1"><?php echo $i; ?></td>
                  <td><?php echo $result['name']; ?></td>
                  <td><?php echo $result['expertise']; ?></td>
                  <td><?php echo $result['spaciality'];?></td>
                  <td><?php echo $result['educational_information'];?></td>
                  <td><?php echo $result['experience_information'];?></td>
                  <td><a href="index.php?page=edit_faculty.php&id=<?php echo $result['user_id']; ?>" class="btn btn-primary waves-effect btn-lg">Edit</a>&nbsp;<!-- <a href="index.php?page=add_course.php" class="btn btn-primary waves-effect btn-lg">Delete</a></td>-->
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
     

