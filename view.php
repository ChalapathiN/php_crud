<?php
include 'config.php';

	$id=$_GET['id']; 
	$q= mysql_query("select * from students where student_id='$id'");
	$student_info=mysql_fetch_array($q);
		
?>

<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<div class="container " > 
    
  <div class="row content"> 
             <a  href="index.php"  class="button button-purple mt-12 pull-right">View Student List</a>     
 <h3>View Student Info</h3>     
    
     <hr/>
   
   
 
      
    <label >Name:</label>
   <?php  if(isset($student_info['student_name'])){echo $student_info['student_name']; }?>

<br/>
    <label>Email address:</label>
  <?php  if(isset($student_info['email_address'])){echo $student_info['email_address'];} ?>
    
    <br/>
    <label >Contact:</label>
      <?php  if(isset($student_info['contact'])){echo $student_info['contact'];} ?>
    <br/>

  <label >Gender:</label>
   <?php  if(isset($student_info['gender'])){echo $student_info['gender'];} ?>
  <br/>
    <label >Country:</label>
      <?php  if(isset($student_info['country'])){echo $student_info['country'];} ?>
    <br/>

          

    <a href="<?php echo 'edit.php?id='.$student_info["student_id"] ?>" class="button button-blue">Edit</a>

   
  
     
   
  </div>
     
</div>
<hr/>