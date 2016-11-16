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

									<th>Advertiser Name</th>
                                    <th> Email</th>
                                    <th>Contact No</th>
									<th>Company</th>
									<th>Campaign Name</th>
									<th>Total Campaign Amount</th>
									<th>Campaign Paid Amount</th>
									<th>Expenditure</th>
									<th>Impression Gained</th>
									<th>Total Km</th>
									
									
									
									
									
                                  </tr>
                                </thead>
								
								 <?php 
								
									$myDate = date('Y/m/d');	
									
									
	$sql="SELECT coalesce(sum( d.driv_camp_dist),0) as driv_camp_dist, SUM(d.driv_impression) as driv_impression,SUM(d.driv_camp_earn) as driv_earn,a.adv_name,a.adv_email,a.adv_contact,b.company,b.camp_title,b.camp_amount,(select SUM(c.amount)  from  
								cust_camp_payment_details c where c.camp_id = b.camp_id AND c.adv_id = a.adv_id ) as amt  from  
								cust_advertiser_info a inner join cust_campaign_details b on a.adv_id = b.camp_adv_id  
inner join cust_driver_camp_details  d on b.camp_id = d.driv_camp_id AND d.adv_id = a.adv_id group by d.driv_camp_id,d.adv_id  ";	
						
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									
									
									$no++;	
									$earn=$row['earn'];
                                                                   $earn1= number_format($earn, 2, '.', '');
                                                                   
                                                                   $driv_impression=$row['driv_impression'];
                                                                   $driv_impression1= number_format($driv_impression, 2, '.', '');
 									
									
									?>
                                <tbody>
                                  <tr>
								  
                                   
									
                                    <td><?php echo $row['adv_name'];?></td>
                                    <td><?php echo $row['adv_email'];?></td>
                                    <td><?php echo $row['adv_contact'];?></td>
              						<td><?php echo $row['company'];?></td>
									<td><?php echo $row['camp_title'];?></td>
									<td><?php echo $row['camp_amount'];?></td>
									<td><?php echo $row['amt'];?></td>
									<td><?php echo $row['driv_earn'];?></td>
									<td><?php echo  $earn1; ?></td>
									<td><?php echo  $driv_impression1; ?></td>
									
									
									
									
                                  </tr>
                                  
                                </tbody>
								<?php
									
								}
								?>
									
		
                              </table>