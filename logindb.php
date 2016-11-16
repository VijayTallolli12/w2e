<?php 
include('include/db_config.php');
?>
<?php
session_start();


if(isset($_POST['btn_login']))
	{
			$email=$_POST['email'];
			$password=$_POST['password'];
			
		//	$email=mysql_real_escape_string($email);
		//	$password=mysql_real_escape_string($password);
		
			$email=mysqli_real_escape_string($con,$email);
			$password=mysqli_real_escape_string($con,$password);
					
			$sql="select * from wrap2earn_login where email='$email' AND password='$password'";
			
		//	$result=mysql_query($sql);
			$result=mysqli_query($con,$sql);
			print_r ($result);
			
			//$num = mysql_num_rows($result); 
			$num = mysqli_num_rows($result); 
			if($num>0)
			{
			//	$row=mysql_fetch_array($result);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				$_SESSION['wrap2earn_login_id']=$row['wrap2earn_login_id'];
				
				
				header('Location:dashboard.php');
					
			}
			
			else
			{	
				echo '<script type="text/javascript">alert("Invalid username and password"); location.href="index.php";</script>';	
			}
	}

?>

