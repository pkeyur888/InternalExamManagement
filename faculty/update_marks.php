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
                                            <th>Marks</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    
                                        <?php 
			$i=0;
			$data = mysqli_query($conn,"SELECT um.user_id,um.enrollment_no,sm.fname from result_master as dm INNER JOIN user_master as um ON um.user_id=dm.student_id INNER JOIN student_master as sm on sm.user_id=um.user_id WHERE dm.marks=999 AND dm.exam_id=$id");
				while($result = mysqli_fetch_array($data))
				{
					$i++;
				
			?>
                <tr role="row" class="odd">
                  <td class="sorting_1"><?php echo $i; ?></td>
                  <td><?php echo $result['enrollment_no']; ?></td>
                  <td><?php echo $result['fname']; ?></td>
				 <input type="hidden" id="1" name="h1[]" value="<?php echo $result['user_id']; ?>">
				<td><input type="text" name="txt1[]" value=""><br></td>
                 
                </tr>
                <?php 
				}
			  
			  ?>
                                    </tbody>
                                </table>
								<input type="submit" class="btn btn-primary m-t-15 waves-effect" name="submit" value="Submit">
                            </div>
                        </div>
                    </div>
                </div>
         
            <!-- #END# Exportable Table -->
 </form>    

  <?Php
  //$o=mysqli_query($conn,"update result_master set marks='999' where student_id=36 and exam_id=7");
  //echo $o;
			if(isset($_POST['submit']))
			{
				$no=array();
				$mark=array();
				$mark=$_POST['txt1'];
				$no=$_POST['h1'];
				$c=count($no);
			
				for($j=0;$j<$i;$j++)
				{
					if($mark[$j]=="")
					{
						$mark[$j]=999;
					}
				}
			
			
				for($j=0;$j<$c;$j++)
				{
					
					$n=$no[$j];
					$m=$mark[$j];
					//echo $m."   ".$n ;
					 $sql ="update result_master set marks='$m',type=$type where student_id=$n and exam_id=$id";
					 //echo "update result_master set marks='$m' where student_id=$n and exam_id=$id<br>";
					mysqli_query($conn,$sql);
					$l=mysqli_affected_rows($conn);
					echo $l;
					if(mysqli_affected_rows($conn)==-1  )
					{
						echo "<script>alert('problem in Roll no $n')</script>";
					}	
				}	
				if(mysqli_affected_rows($conn)==1 || mysqli_affected_rows($conn)==0)
					{
						echo "<script>alert('Marks Sucessfully Inserted...');window.location.href='master_faculty.php?page=attendance.php'</script>";
					}	
			}
	 ?>
			

