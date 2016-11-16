<?php 
include('include/db_config.php');
?>
<?php 
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename="."Wrap2Earn.xls");

header("Pragma: no-cache");
header("Expires: 0");

?>
<table class="table table-bordered" border="1">
                                 <thead>
                                  <tr>
                                    <th>Si No</th>
                                    <th>Driver Name</th>
                                    <th>Driver Email</th>
                                    <th>Driver Contact No</th>
									<th>Campaign name</th>
                                    <th>Camp Start Date</th>
									<th>Camp End Date</th>
									<!--<th>Total KM's Driven</th>-->
									
                                  </tr>
                                </thead>
								 <?php 
							$myDate = date('Y/m/d');	
									
						$sql="SELECT * FROM cust_campaign_details as b inner join cust_vinyler_dashboard as c on c.vd_camp_id=b.camp_id  inner join 
						cust_drivers as d  on 	b.camp_id=d.driv_camp_id 
						where b.camp_status='0' AND b.camp_active_status='1' AND c.active_or_inactive='2'  AND b.camp_end_date >= '$myDate'";
								$no=0;
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								while($row=mysqli_fetch_array($query))
								{
									$no++;
 										
									
									
								
									?>
                                <tbody>
                                  <tr>
								  
                                    <td><?php  echo $no;?></td>
                                    <td><?php echo $row['driv_name'];?></td>
                                    <td><?php echo $row['driv_email'];?></td>
                                    <td><?php echo $row['driv_contact'];?></td>
                                    <td><?php echo $row['camp_title'];?></td>
									<td><?php echo $row['camp_start_date'];?></td>
                                    <td><?php echo $row['camp_end_date'];?></td>
									<!--<td><?php echo $row['driv_camp_dist'];?></td>-->
                                  </tr>
                                  
                                </tbody>
								<?php
									}
								
								?>
                            </table>
	
<script>
		window.location.href="active_driver.php";
</script>