<?php 
include('include/db_config.php');
?>
<?php
$camp_id =$_POST['camp_id'];
$company =$_POST['company'];
$cmp_url =$_POST['cmp_url'];
$camp_title =$_POST['camp_title'];
$cmp_desc =$_POST['cmp_desc'];
$obj =$_POST['obj'];
$category =$_POST['category'];
$brand =$_POST['brand'];
$no_of_cars =$_POST['no_of_cars'];
$s_date=date('Y-m-d',strtotime($_POST['s_date']));
$duration =$_POST['duration'];
$end_date=date('Y-m-d',strtotime($_POST['end_date']));
$amount =$_POST['amount'];
$city =$_POST['city'];
$logo=$_POST['logo'];
$art=$_POST['art'];
$veh_type =$_POST['veh_type'];


$sql="UPDATE cust_campaign_details SET company='$company', company_url='$cmp_url', camp_title='$camp_title', company_desc='$cmp_desc', camp_objective='$obj', camp_category='$category',
		 camp_no_cars='$no_of_cars',  camp_start_date='$s_date', camp_duration='$duration', camp_end_date='$end_date', camp_amount='$amount', camp_city='$city',
		camp_logo='$logo', camp_art='$art', camp_veh_type='$veh_type' WHERE camp_id='$camp_id'";
		
		mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));

?>
<script>
alert("Updated Successfully");
document.location="pending_camp_for_adv.php";
</script>