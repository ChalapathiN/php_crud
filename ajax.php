<?php 
include 'config.php';

	if($_GET['f']=="delete_student")
	{
		delete_student();
		
	}
	 
	function delete_student()
	{
		$id=$_POST['id'];
		$q2= mysql_query("delete from  students where student_id='$id'");
	}
?>