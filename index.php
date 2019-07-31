<?php 
include 'config.php';

?>

<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>


<script>

function delete_student(id)
{
	r=confirm("Are you sure want to Remove ?")
	  if(r==true)
	  {
		jQuery.ajax({
			type:"POST",
			url:"ajax.php?f=delete_student",
			datatype:"text",
			data:{id:id},
			success:function(response)
			{
				location.reload();
			},
			error:function (xhr, ajaxOptions, thrownError){}
			});
	}
}
</script>
<body>

<div class="container " > 
    <div class="row content">
        <a  href="register.php"  class="button button-purple mt-12 pull-right">Create Student</a> 
        <h3>Student List</h3>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
			
			 <?php 
			
			
			
			$qry=mysql_query("SELECT * FROM students ORDER BY student_id asc ");
			while($row=mysql_fetch_array($qry))
			{
				echo '
						 <tr>
							<td>'.$row['student_name'].'</td>
							<td>'.$row['email_address'].'</td>
							<td>'.$row['contact'].'</td>
							<td>'.$row['gender'].'</td>
							<td class="text-right">
								<a href="javascript:void(0)" id="'.$row['student_id'].'" onclick="delete_student(this.id)" class="button button-red"  >  Delete</a> 
								<a  href="edit.php?id='.$row['student_id'].'" class="button button-blue">Edit</a>  
								<a href="view.php?id='.$row['student_id'].'" class="button button-green">View</a>
							</td>
						</tr>
						';
			}
			 ?>
	 
           </tbody>
        </table>

    </div>
</div>
</body>


</html>