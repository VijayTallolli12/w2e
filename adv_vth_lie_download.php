<?php 
include('include/db_config.php');
?>
<?php 
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename="."Wrap2Earn.xls");

header("Pragma: no-cache");
header("Expires: 0");

?>
<?php 


$from=$_POST["from"];
$from=date("Y-m-d", strtotime($from));
$to=$_POST["to"];
$to=date("Y-m-d", strtotime($to));
?>
	<table class="table table-bordered" border="1">
                                <thead>
                                  <tr>
                                     <th>Sl</th>
                                    <th>Name</th>
									<th>E-Mail</th>
									<th>Contact No</th>
                                    <th>Campaign name</th>
									<th>Campaign Start date</th>
									<th>Duration</th>
                                    									
                                  </tr>
                                </thead>
                                <tbody>
             <?php			
			  $sql="SELECT a.`adv_name`,a.`adv_email`,a.`adv_contact`,b.camp_title,b.camp_start_date,
			  b.camp_end_date,b.camp_duration from cust_advertiser_info as a,cust_campaign_details as b 
			  where  date(b.camp_start_date) between DATE('$from') AND DATE('$to') ";  
			  $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
					$sl=0;
						while($row=mysqli_fetch_array($res))
						{
						$sl++;
			?>  
						 <tr>
										<td class="data"><?php echo $sl;?></td>
										<td class="data"><?php echo $row['adv_name'];?></td>
										<td class="data"><?php echo $row['adv_email'];?></td>	
										<td class="data"><?php echo $row['adv_contact'];?></td>			
										<td class="data"><?php echo $row['camp_title'];?></td>
										<td class="data"><?php echo $row['camp_start_date'];?></td>			
										<td class="data"><?php echo $row['camp_duration'];?></td>	
															
						</tr>
							
					<?php		
					}
						?>	
							
                                </tbody>
                              </table>
	
<script>
		window.location.href="adv_vth_lie_campain.php";
</script>	