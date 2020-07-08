
<form action="#" method="post">
  <div class="block-header clearfix">
    <h2 class="pull-left"> Notice </h2>
    <div class="pull-right"> <a href="index.php?page=add_notice.php" class="btn btn-primary waves-effect btn-lg">Add Notice</a> </div>
  </div>
  <div class="row clearfix">    
	<!-- Exportable Table -->           
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                NOTICE LIST
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Notice_title</th>
											<th>Status</th>
											<th>Option</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    
                                        <?php 
											$i=0;
											$data=mysqli_query($conn,"Select * from notification");
											while($res=mysqli_fetch_assoc($data)):
													$i++;
													$_SESSION['notification_id']='php_tutorial.pdf';
										?>
								<tr role="row" class="odd">
									<td class="sorting_1"><?php echo $i;?></td>
									<td><?php echo $res['notification_title']; ?></td>
									<td><?php  if($res['status']==1) echo "Unblock"; else echo "Block";		?></td>
									<td><a href="<?php echo $res['path']; ?>" class="btn btn-primary waves-effect btn-lg">View</a></td>
								</tr>
							<?php endwhile; ?>
				
			  
			  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
         
            <!-- #END# Exportable Table -->
     

