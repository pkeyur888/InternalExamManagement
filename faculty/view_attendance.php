<?php
		$id=$_GET['id'];
		$type=$_GET['type'];
		$sub_id=$_GET['sub_id'];
		$d=mysqli_query($conn,"SELECT criteria_title from sub_exam where sub_exam_id=$id");
		$r=mysqli_fetch_assoc($d);
?>
<form action="#" method="post">
  <div class="block-header clearfix">
    <h2 class="pull-left"> Absent List of <?php echo $r['criteria_title']; ?></h2>
    <div class="pull-right"> <a href="master_faculty.php?page=attendance.php" class="btn btn-primary waves-effect btn-lg">Back</a> </div>
  </div>
  <div class="row clearfix">    
	<!-- Exportable Table -->           
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Absent List of <?php echo $r['criteria_title']; ?>
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Enrollment No</th>
                                            <th>Name</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    
                                        <?php 
			$i=0;
			$data = mysqli_query($conn,"SELECT um.enrollment_no,sm.fname from result_master as dm INNER JOIN user_master as um ON um.user_id=dm.student_id INNER JOIN student_master as sm on sm.user_id=um.user_id WHERE dm.marks=999 AND dm.exam_id=$id");
				while($result = mysqli_fetch_array($data))
				{
					$i++;
				
			?>
                <tr role="row" class="odd">
                  <td class="sorting_1"><?php echo $i; ?></td>
                  <td><?php echo $result['enrollment_no']; ?></td>
                  <td><?php echo $result['fname']; ?></td>

                 
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
     
	 <?php 
		$count=mysqli_num_rows($data);
		if($count>0)
		{
	 ?>
			<a href="master_faculty.php?page=update_marks.php&id=<?php echo $id;?>&sub_id=<?php echo $sub_id;?>&type=<?php echo $type;?>" class="btn btn-primary waves-effect btn-lg">Update Marks</a> </div>
  <?php }  ?>
