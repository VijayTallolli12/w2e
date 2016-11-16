<?php 
include('include/db_config.php');
?>
<?php
$vd_camp_id=$_GET['vd_camp_id'];
//$vin_id=$_GET['vin_id'];

$myDate = date('Y-m-d');
								$query_update="Update cust_campaign_details a JOIN cust_vinyler_dashboard b 
								ON a.camp_id=b.vd_camp_id  JOIN cust_drivers c ON c.driv_camp_id = a.camp_id 
								AND a.camp_end_date <= '$myDate' AND b.vd_camp_id='$vd_camp_id'
								AND a.camp_active_status=1 AND a.camp_status=0 AND b.active_or_inactive=3
								SET a.camp_status=1, c.driv_camp_id=NULL ,c.advertiser_id=NULL,b.active_or_inactive=4";
mysqli_query($GLOBALS["___mysqli_ston"], $query_update);
?>
<script>
window.location="total_no_of_completed_campaign.php";
</script>