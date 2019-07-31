<?php
include 'config.php';
if (isset($_GET['id'])) 
{
	$id=$_GET['id']; 
	 	$q= mysql_query("select * from students where student_id='$id'");
		$student_info=mysql_fetch_array($q);
		 
} else {
    header('Location: index.php');
}
?>

<?php 


function compress($source,$url,$quality)
	{
		$info= getimagesize($source);
		$image;
		if($info['mime']== 'image/jpeg')
			$image=imagecreatefromjpeg($source);
		elseif($info['mime']== 'image/gif')
			$image=imagecreatefromgif($source);
		elseif($info['mime']== 'image/png')
			$image=imagecreatefrompng($source);
			
		imagejpeg($image,$url,$quality);
		return $url;
	}
	
	
	
if(isset($_POST['update_student']))
{
		$student_id=$_POST['id'];
		$student_name=$_POST['student_name'];
		$email_address=$_POST['email_address'];
		$gender=$_POST['gender'];
		$contact=$_POST['contact'];		
		$country=$_POST['country'];		   
		
		$filename="";
		if($_FILES["file"]["size"]>=1)
		{
			$random_digit=rand(10,100);
			$url="uploads/".$random_digit.$_FILES["file"]["name"];
			$img_path="uploads/".$random_digit.$_FILES['file']['name'];
			$filesize=$_FILES['file']['size'];
			$size=$filesize;
						
			$filename=compress($_FILES['file']['tmp_name'],$url,50);
			 $sql=mysql_query("UPDATE students SET student_name='$student_name',email_address='$email_address',contact='$contact',country='$country',gender='$gender',filename='$filename' WHERE student_id =$student_id");					
		}
		else
		{
			$sql=mysql_query("UPDATE students SET student_name='$student_name',email_address='$email_address',contact='$contact',country='$country',gender='$gender',filename='$filename' WHERE student_id =$student_id");
		}
		    
		header("location:index.php");
}

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
        <a href="index.php"  class="button button-purple mt-12 pull-right">View Student List</a> 
        <h3>Update Student Info</h3>
        

        <hr/>
        <form method="post" action=""  enctype="multipart/form-data">
		
			
            <input type="hidden" name="id" value="<?php if (isset($student_info['student_id'])) {
            echo $student_info['student_id'];
        } ?>" id=""  >
            <div class="form-group">
                <label for="student_name">Name:</label>
                <input type="text" name="student_name" value="<?php if (isset($student_info['student_name'])) {
                   echo $student_info['student_name'];
        } ?>" id="student_name" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="email_address">Email address:</label>
                <input type="email" class="form-control" value="<?php if (isset($student_info['email_address'])) {
            echo $student_info['email_address'];
        } ?>" name="email_address" id="email_address" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" value="<?php if (isset($student_info['contact'])) {
            echo $student_info['contact'];
        } ?>" name="contact" id="contact"  maxlength="50">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="">Select</option>
                    <option value="Male" <?php if (isset($student_info['gender']) && $student_info['gender'] == 'Male') {
            echo 'selected';
        } ?>>Male</option>
                    <option value="Female" <?php if (isset($student_info['gender']) && $student_info['gender'] == 'Female') {
            echo 'selected';
        } ?>>Female</option>

                </select>

            </div> 
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country" value="<?php if (isset($student_info['country'])) {
            echo $student_info['country'];
        } ?>" id="country" class="form-control"  maxlength="50">
            </div>
			
			 <div class="form-group">
			 
			 <div class="col-md-6">
                <label for="country">Profile Pic:</label>
                <input type="file" name="file"   id="file" class="form-control"  >
            </div>
			<div class="col-md-6">
			
			<img src="<?php if (isset($student_info['filename'])) {
            echo $student_info['filename'];
        } ?>" width="100" height="100" />
			</div>
			</div>
			
			
            <input type="submit" class="button button-green  pull-right" name="update_student" value="Update"/>
        </form> 
    </div>
</div>
<hr/>
 

