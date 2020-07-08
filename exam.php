
<form action="#" method="post">
  <div class="block-header clearfix">
    <h2 class="pull-left"> Exam List </h2>
    <div class="pull-right">  <a href="index.php?page=add_exam.php" class="btn btn-primary waves-effect btn-lg">Add Exam</a> </div>
  </div>
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
                                            <th>Course</th>
                                            <th>Exam name</th>
											<th>Exam Date</th>
											<th>Total Marks</th>
											
                                        </tr>
                                    </thead>
                                    <?php
										$i=0;
										$data=mysqli_query($conn,"SELECT * from exam_master as em INNER JOIN terms_master as tm on em.course_id=tm.terms_id");
										while($res=mysqli_fetch_assoc($data)):
											$i++;
									?>	
										 <tr role="row" class="odd">
											<td><?php echo $i; ?></td>
											<td><?php echo $res['terms_title'];  ?></td>
											<td><?php echo $res['exam_title'];?></td>
											<td><?php echo $res['exam_date'];?></td>
											<td><?php echo $res['total_marks'];?></td>
											
										</tr>
											<?php endwhile; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
         
            <!-- #END# Exportable Table -->
     

