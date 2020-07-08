
<form action="#" method="post">
  <div class="block-header clearfix">
    <h2 class="pull-left"> Criteria </h2>
    <div class="pull-right"> <a href="index.php?page=add_criteria.php" class="btn btn-primary waves-effect btn-lg">Add Exam Criteria</a> </div>
  </div>
  <div class="row clearfix">    
	<!-- Exportable Table -->           
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Criteria LIST
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Criteria Name</th>
											
                                            <th>Option</th>  
                                        </tr>
                                    </thead>
                                    
                           <?php 
								$i=0;
								$data = mysqli_query($conn,"Select * from terms_master as tm Inner Join terms_texonomy_master as ttm ON tm.terms_id = ttm.terms_id Where ttm.texonomy = 'Criteria' ORDER BY tm.terms_id DESC");
								while($result = mysqli_fetch_array($data))
								{
									$i++;	
							?>
                			<tr role="row" class="odd">
                  				<td class="sorting_1"><?php echo $i; ?></td>
                  				<td><?php echo $result['terms_title']; ?></td>
								
				  				<td><a href="index.php?page=edit_criteria.php&id=<?php echo $result['terms_id'];?>" class="btn btn-primary waves-effect btn-lg">Edit</a>&nbsp; <!--<a href="index.php?page=delete_criteria.php&id=<?php// echo $result['terms_id'];?>" class="btn btn-primary waves-effect btn-lg">Delete</a></td>-->
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
     

