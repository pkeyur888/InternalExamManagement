<?php
		include 'connection.php';
		$data=mysqli_query($conn,"SELECT course.terms_title as course,sem.terms_title as semester,se.exam_date,sub.terms_title as subject,se.criteria_title as name from sub_exam as se INNER JOIN terms_master as course on se.course_id=course.terms_id
INNER JOIN terms_master as sem on se.sem_id=sem.terms_id
INNER JOIN terms_master as sub on se.subject_id=sub.terms_id ");
while($res=mysqli_fetch_assoc($data)):
?>

DEPARTMENT OF COMPUTER SCIENCE<br>
GANPAT UNIVERSITY,GANPAT VIDYANAGAR,KHERVA.<br><br>

SUPERVISOR'S REPORT<br>
<?php echo $res['name']; ?> &nbsp;&nbsp;&nbsp; Examination Date  <?php echo $res['exam_date'];?><br>
Class<?php echo $res['course']; ?> &nbsp;&nbsp;&nbsp; Semester<?php echo $res['semester']; ?> &nbsp;&nbsp;&nbsp; Block No_____________Section_____________<br>
Subject Code___________________ &nbsp;&nbsp;&nbsp; Subject Name<?php echo $res['subject'];?><br>
Nos From_____________________To______________________________________<br><br><br><br>
<?php endwhile; ?>