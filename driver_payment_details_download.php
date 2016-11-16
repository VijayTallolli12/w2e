<?php 
include('include/db_config.php');
?>

<?php 
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename="."Wrap2Earn.xls");

header("Pragma: no-cache");
header("Expires: 0");

?>
<table class="table table-bordered order-table table">
                                <thead>
                                  <tr>
                                    <th>Sl No</th>
									<th>Driver Name</th>
                                    <th>Driver Email</th>
                                    <th>Contact No</th>
									<th>Company</th>
									<th>Campaign Name</th>
									<th>Driver Earn</th>
									<th>Driver Impression</th>
									<th>Total Km</th>
									
									
									
									
                                  </tr>
                                </thead>
								
								 <?php 
								
									$myDate = date('Y/m/d');	
									
									
	$sql="SELECT a.driv_id,b.driv_name,b.driv_email,driv_contact,c.company,c.camp_title,SUM(a.driv_camp_earn) as driv_earn ,SUM(a.driv_impression) as driv_impression,	
	SUM(a.driv_camp_dist) as driv_camp_dist FROM cust_driver_camp_details 
					as a ,cust_drivers as b , cust_campaign_details as c where a.driv_camp_id = c.camp_id AND a.driv_id = b.driv_id group by a.driv_id";	
						
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									$driv_earn=$row['driv_earn'];
                                                                   $driv_earn1= number_format($driv_earn, 2, '.', '');

                                                                   $driv_impression=$row['driv_impression'];
                                                                   $driv_impression1= number_format($driv_impression, 2, '.', '');

                                                                    $driv_camp_dist=$row['driv_camp_dist'];
                                                                   $driv_camp_dist1= number_format($driv_camp_dist, 2, '.', '');
									
									$no++;	
 									
									
									?>
                                <tbody>
                                  <tr>
								  
                                   
									<td><?php  echo $no?></td>
                                    <td><?php echo $row['driv_name'];?></td>
                                    <td><?php echo $row['driv_email'];?></td>
                                    <td><?php echo $row['driv_contact'];?></td>
              						<td><?php echo $row['company'];?></td>
									<td><?php echo $row['camp_title'];?></td>
									<td><?php echo  $driv_earn1; ?></td>
									<td><?php echo $driv_impression1; ?></td>
									<td><?php echo $driv_camp_dist1; ?></td>
									
									
									
                                  </tr>
                                  
                                </tbody>
								<?php
									
								}
								?>
									
		
                              </table>
								