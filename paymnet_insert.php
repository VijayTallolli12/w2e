<?php 
include('include/db_config.php');
?>
<?php
if(isset($_POST['submit']))
{
	$camp_id=$_POST['camp_id'];
	$adv_id=$_POST['adv_id'];
	$product=$_POST['product'];
	$paying_amount=$_POST['paying_amount'];
	
	$email=$_POST['email'];
	
	$id = rand(0,100000000);
	
	$myDate = date('Y/m/d');
	
	$sql1="insert into cust_camp_payment_details (camp_id,adv_id,product_info,amount,txnid,email,date) values 
	('$camp_id','$adv_id','$product','$paying_amount','$id','$email','$myDate')";
	
	$query1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	
}
?>

	<script>
	alert("Payment Added Successfully");
document.location="click_to_pay.php";
	
	
	</script>