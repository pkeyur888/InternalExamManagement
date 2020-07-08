
<form action="#" method="post">
  <div class="block-header clearfix">
    <h2 class="pull-left"> Semester </h2>
    <div class="pull-right"> <a href="index.php?page=add_subject.php" class="btn btn-primary waves-effect btn-lg">Add Subject</a> </div>
  </div>
  <div class="row clearfix">    
	<!-- Exportable Table -->           
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SUBJECT LIST
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Subject</th>
											<th>Subject Code</th>
											<th>Course</th>
											<th>Semester</th>
											<th>Type</th>
											
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    
                                    
                                        <?php 
			$i=0;
			$data = mysqli_query($conn,"Select ttm.code,ttm.type,tm.terms_id,course.terms_title as course,sem.terms_title as sem,tm.terms_title from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id INNER JOIN terms_master as course on course.terms_id=ttm.discription INNER JOIN terms_master as sem on sem.terms_id=ttm.parent_id Where ttm.texonomy = 'Subject'");
				while($result = mysqli_fetch_array($data))
				{
					$i++;
				
			
			?>
                <tr role="row" class="odd">
                  <td class="sorting_1"><?php echo $i; ?></td>
                  <td><?php echo $result['terms_title']; ?></td>
				  <td><?php echo $result['code']; ?></td>
				   <td><?php echo $result['course']; ?></td>
				   <td><?php echo $result['sem']; ?></td>
				<td><?php if($result['type']==2) echo "Theory,Practical"; else echo "Theory"; ?></td>
				  
				  <td><a href="index.php?page=edit_subject.php&id=<?php echo $result['terms_id']; ?>" class="btn btn-primary waves-effect btn-lg">Edit</a>&nbsp; <!--<a href="index.php?page=delete_subject.php&id=<?php// echo $result['terms_id']; ?>" class="btn btn-primary waves-effect btn-lg">Delete</a></td>-->
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
     

