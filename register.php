
<?php 
include 'config.php';
 
 
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
	
	
	if(isset($_POST['create_student']))
	{
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
			 					
		}
		 
		
		$sql=mysql_query("INSERT INTO students (student_name, email_address, contact,country,gender,filename) VALUES ('$student_name', '$email_address', '$contact','$country','$gender','$filename')");	  
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


<div class="container"> 
    <div class="row content">
        <a  href="index.php"  class="button button-purple mt-12 pull-right">View Student List</a> 
        <h3>Create Student Info</h3>
        <hr/>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="student_name">Name:</label>
                <input type="text" name="student_name" id="student_name" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="email_address">Email address:</label>
                <input type="email" class="form-control" name="email_address" id="email_address" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" name="contact" id="contact"  maxlength="50">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="" selected>Select</option>
                    <option value="Male" >Male</option>
                    <option value="Female" >Female</option>
                </select>
            </div> 
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country" id="country" class="form-control"  maxlength="50">
            </div>
			
			 <div class="form-group">
                <label for="country">Profile pic:</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
			
            <input type="submit" class="button button-green  pull-right" name="create_student" value="Submit"/>
        </form> 
    </div>
</div>
<hr/>

