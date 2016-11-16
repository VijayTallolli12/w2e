<?php 
include('include/db_config.php');
?>
<?php
$camp_id=$_GET['camp_id'];
$vin_id=$_GET['vin_id'];

$sql="UPDATE 	cust_vinyler_dashboard SET vd_vinyler_id='$vin_id' , active_or_inactive='3'";
mysqli_query($GLOBALS["___mysqli_ston"], $sql);
?>
<script>
window.location="total_no_of_completed_campaign.php";
</script>