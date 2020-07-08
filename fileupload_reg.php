<?php
	session_start();
		$course=$_POST['course'];
		$semester=$_POST['semester'];
		//echo $course;
		//echo $semester;
		$fname=array();
		$lname=array();
		$no=array();
		$email=array();
		$pwd=array();
		$c=0;
			include 'connection.php';
			use Box\Spout\Reader\ReaderFactory;
			use Box\Spout\Common\Type;
 
				// Include Spout library 
				require_once 'spout-2.4.3/spout-2.4.3/src/Spout/Autoloader/autoload.php';
 
				// check file name is not empty
				if (!empty($_FILES['file']['name'])) {
      
					// Get File extension eg. 'xlsx' to check file is excel sheet
					$pathinfo = pathinfo($_FILES["file"]["name"]);
     
					// check file has extension xlsx, xls and also check 
					// file is not empty
					if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls') 
					&& $_FILES['file']['size'] > 0 ) {
         
					// Temporary file name
					$inputFileName = $_FILES['file']['tmp_name']; 
    
					// Read excel file by using ReadFactory object.
					$reader = ReaderFactory::create(Type::XLSX);
 
					// Open file
					$reader->open($inputFileName);
					$count = 1;
 
					// Number of sheet in excel file
					foreach ($reader->getSheetIterator() as $sheet) {
             
					// Number of Rows in Excel sheet
					foreach ($sheet->getRowIterator() as $row) {
 
						// It reads data after header. In the my excel sheet, 
						// header is in the first row. 
						if ($count > 1) { 
 
							// Data of excel sheet
							$data['fname'] = $row[0];
							$data['lname'] = $row[1];
							$data['en_no'] = $row[2];
							$data['email'] = $row[3];
							$data['password'] = $row[4];
							
                     
							//Here, You can insert data into database. 
							//print_r($data);
						
							$c++;
							 if(empty($fname) && empty($lname) && empty($no) && empty($email) && empty($pwd))
							{
								$fname=array($data['fname']);
								$lname=array($data['lname']);
								$no=array($data['en_no']);
								$email=array($data['email']);
								$pwd=array($data['password']);
							}
							else
							{  
								array_push($fname,$data['fname']);
								array_push($lname,$data['lname']);
								array_push($no,$data['en_no']);
								array_push($email,$data['email']);
								array_push($pwd,$data['password']);
								
							}
							
							
                     
					}
					$count++;
            }
        }
 
        // Close excel file
        $reader->close();
	
    } else {
 
        echo "Please Select Valid Excel File";
    }
 
} else {
 
    echo "Please Select Excel File";
     
}
	if(!empty($fname) && !empty($lname) && !empty($no) && !empty($email) && !empty($pwd))
	{
		/*print_r($no_temp1);
		print_r($m_temp);
		echo $count;
		echo $c;*/
		$k=0;
		
		for($j=0;$j<$c;$j++)
		{
			if(!empty($fname[$j]))
			{
				$k++;
			}						
		}			
				
			
			
				for($j=0;$j<$k;$j++)
				{
					
					$f_name=$fname[$j];
					$l_name=$lname[$j];
					$e_no=$no[$j];
					$email_id=$email[$j];
					$password=$pwd[$j];
					
					$data=mysqli_query($conn,"SELECT enrollment_no from user_master where enrollment_no=$e_no");
							$res=mysqli_fetch_assoc($data);
						
							if(mysqli_affected_rows($conn)==0)
							{
							
								//echo $m."   ".$n."<br>" ;
								mysqli_query($conn,"insert into `user_master` values(NULL,3,$e_no,'$e_no','$password','$email_id')");
								if(mysqli_affected_rows($conn)==1)
								{
									$data = mysqli_query($conn,"Select MAX(user_id) as mid from user_master ORDER BY user_id");
									while($result = mysqli_fetch_array($data))
									{
										$id = $result['mid'];
									}
			
									$sql="INSERT INTO `student_master` VALUES ($id,$course,$semester,'$f_name','$l_name','2018-02-02') ";
									mysqli_query($conn,$sql);
									if(mysqli_affected_rows($conn)!=1)
									{
										echo "<script>alert('Problem to Registration in $e_no');window.location.href='index.php?page=student.php</script>";
									}
										
								}
								else
								{
									echo "<script>alert('Problem to Registration in $e_no');window.location.href='index.php?page=student.php</script>";
								}	 
								
							}
							else
							{
								echo "<script>alert('$e_no Number Registration Already Completed')</script>";
							}
				}	
				if(mysqli_affected_rows($conn)==1)
					{
						echo "<script>alert('All Student Registration Completed...');window.location.href='index.php?page=student.php'</script>";
					}	
	}	
?>