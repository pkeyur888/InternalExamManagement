<?php
	session_start();
		$exam_id = $_POST['exam_id'];
		$type=$_POST['type'];
		$sem_id=$_POST['sem_id'];
		$sub_id=$_POST['sub_id'];
		$faculty=$_SESSION['faculty_id'];
		$no_temp1 = array();
		$m_temp=array();
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
							$data['number'] = $row[0];
							$data['marks'] = $row[1];
							//$data['phone'] = $row[2];
							//$data['city'] = $row[3];
                     
							//Here, You can insert data into database. 
							//print_r($data);
							$number=$data['number'];
							$marks=$data['marks'];
							$c++;
							 if(empty($no_temp1) && empty($m_temp))
							{
								$no_temp1=array($data['number']);
								$m_temp=array($data['marks']);
							}
							else
							{  
								array_push($no_temp1,$data['number']);
								array_push($m_temp,$data['marks']);
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
	if(!empty($no_temp1) && !empty($m_temp))
	{
		/*print_r($no_temp1);
		print_r($m_temp);
		echo $count;
		echo $c;*/
		$k=0;
		
		for($j=0;$j<$c;$j++)
		{
			if(!empty($no_temp1[$j]))
			{
				$k++;
			}						
		}			
				for($j=0;$j<$k;$j++)
				{		
					//echo gettype($m_temp[$j])."&nbsp;". $m_temp[$j]."<br>";
						if(!is_numeric($m_temp[$j]))
						{
							$m_temp[$j]=999;
						}
					//echo $m_temp[$j]."<br>";						
				}
			
			
				for($j=0;$j<$k;$j++)
				{
					
					$n=$no_temp1[$j];
					$m=$m_temp[$j];
					$data=mysqli_query($conn,"SELECT user_id from user_master where enrollment_no=$n");
							$res=mysqli_fetch_assoc($data);
							$student_id=$res['user_id'];
					//echo $m."   ".$n."<br>" ;
					 $sql="insert into result_master values(NULL,$exam_id,$sem_id,$sub_id,$type,$faculty,$student_id,$m)";
					mysqli_query($conn,$sql);
					if(mysqli_affected_rows($conn)!=1)
					{
						echo "<script>alert('problem in Roll no $n')</script>";
					}
				}	
				if(mysqli_affected_rows($conn)==1)
					{
						echo "<script>alert('Marks Sucessfully Inserted...');window.location.href='master_faculty.php?page=upload.php'</script>";
					}	
	}	
?>