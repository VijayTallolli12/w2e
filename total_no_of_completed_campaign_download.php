<?php 
include('include/db_config.php');
?>
<?php 
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename="."Wrap2Earn.xls");

header("Pragma: no-cache");
header("Expires: 0");

?>
<table class="table table-bordered">
                                 <thead>
                                  <tr>
                                    <!--<th>Sl No</th>-->
                                    <th>Advertiser  Name</th>
                                    <th>Advertiser Email</th>
                                    <th>Advertiser Contact No</th>
									<th>Campaign name</td>
									<th>No of Cars</th>
									<th>Start Date</th>
									<th>Duration</td>
									<th>Campaign End Date</th>
									<th>Total Campaign Amount</th>
									<th>Campaign Paid Amount</th>
									<th>Expenditure</th>
									
									
									
									
                                  </tr>
                                </thead>
								  <tbody>
								 <?php 
									$myDate = date('Y-m-d');
								
									$sql="
								 SELECT b.camp_id,a.adv_name,a.adv_email,a.adv_contact,b.camp_title,b.camp_duration,b.camp_end_date,m.amount,b.camp_amount,
								 c.active_or_inactive,b.camp_no_cars,b.camp_start_date,
								 SUM(d.driv_camp_earn) as g 
								 FROM cust_advertiser_info as a inner join cust_campaign_details as b on a.adv_id=b.camp_adv_id inner join 
								 cust_vinyler_dashboard as c on  b.camp_id=c.vd_camp_id  left join  cust_driver_camp_details as d on b.camp_id = d.driv_camp_id
								left join cust_camp_payment_details as m on m.camp_id=b.camp_id	where   b.camp_status='0' 
								AND b.camp_active_status='1' AND b.camp_end_date <= '$myDate' AND c.active_or_inactive='2' 
								union
								SELECT b.camp_id,a.adv_name,a.adv_email,a.adv_contact,b.camp_title,b.camp_duration,b.camp_end_date,m.amount,b.camp_amount,
								c.active_or_inactive,
								b.camp_no_cars,b.camp_start_date,
								SUM(d.driv_camp_earn) as g FROM cust_advertiser_info as a inner join cust_campaign_details as b on a.adv_id=b.camp_adv_id 
								inner join  cust_vinyler_dashboard as c on  b.camp_id=c.vd_camp_id  left join  
								cust_driver_camp_details as d on b.camp_id = d.driv_camp_id 
								left join cust_camp_payment_details as m on m.camp_id=b.camp_id
								where   b.camp_status='1' 
								AND b.camp_active_status='1' AND b.camp_end_date <= '$myDate'
								AND c.active_or_inactive='4'";		

										
									
						
							$no=0;
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								while($row=mysqli_fetch_array($query))
								{
									$active_or_inactive=$row['active_or_inactive'];
									
										$no++;
										
									$camp_id=$row['camp_id'];
										
									
					?>
                              
								<?php 
								if($camp_id!='0')
									{
										?>
                                  <tr>
								   
                                    <!--<td><?php  echo $no;?></td>-->
                                    <td><?php echo $row['adv_name'];?></td>
                                    <td><?php echo $row['adv_email'];?></td>
                                    <td><?php echo $row['adv_contact'];?></td>
                                    <td><?php echo $row['camp_title'];?></td>
									<td><?php echo $row['camp_no_cars'];?></td>
									<td><?php echo $row['camp_start_date'];?></td>
									<td><?php echo $row['camp_duration'];?> Months</td>
									<td><?php echo $row['camp_end_date'];?></td>
									<td><?php echo $row['camp_amount'];?></td>
										<td><?php echo $row['amount'];?></td>
									
										<td><?php echo $row['g'];?></td>
								
                                  </tr>
                                 <?php
								}
									?>								 
                                
								<?php
									
								}
								?>
								</tbody>	
                            </table>
							
							
							
