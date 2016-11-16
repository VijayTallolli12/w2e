<?php 
include('include/db_config.php');
?>
<?php
if(isset($_POST["vinyl"]))
{
$camp_id=$_POST['camp_id'];
$vin_id=$_POST['vin_id'];

$sql="insert into cust_vinyler_dashboard(vd_camp_id,vd_vinyler_id) values($camp_id,$vin_id)";

mysqli_query($GLOBALS["___mysqli_ston"], $sql);


}
?>

<script>
document.location="adv_vth_in_active_campain.php";
</script>