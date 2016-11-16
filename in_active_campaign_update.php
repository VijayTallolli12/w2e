<?php 
include('include/db_config.php');
?>
<?php
$camp_id=$_GET['id'];


	$sql="UPDATE  cust_campaign_details SET camp_status='0',camp_active_status='1' where camp_id='$camp_id'";
	mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	
?>

                        
                                <thead>
                                 <thead>
                                 <tr>
                                    <th>Si No</th>
									
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
									<th>Campaign Name</th>
									<th>Start Date</th>
									<th>Duration</th>
									<th>Requested No Of Cars</th>
									<th>Total Signed up</th>
									<th>Status</th>
									
                                  </tr>
                                </thead>
								 <?php 
								
									$myDate = date('Y/m/d');	
									
									
				$sql="select a.adv_name,a.adv_email,a.adv_contact,b.camp_id,b.company,b.camp_title,b.camp_no_cars,b.camp_start_date,
								b.camp_duration,count(c.driv_camp_id) as v
								from cust_advertiser_info a inner join cust_campaign_details b on a.adv_id = b.camp_adv_id AND b.camp_status='1' 
								AND b.camp_active_status='0' left join cust_drivers c on b.camp_id = c.driv_camp_id group by b.camp_id";
						
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									$no_of_cars=$row['camp_no_cars'];
									$requestd_of_cars=$row['v'];
									
									
									
									$no++;	
 									
									
									?>
                                <tbody>
                                  <tr>
								  
                                    
									<td><?php  echo $no?></td>
                                    <td><?php echo $row['adv_name'];?></td>
                                    <td><?php echo $row['adv_email'];?></td>
                                    <td><?php echo $row['adv_contact'];?></td>
									<td><?php echo $row['camp_title'];?></td>
									<td><?php echo $row['camp_start_date'];?></td>
									<td><?php echo $row['camp_duration'];?></td>
									<td><?php echo $row['camp_no_cars'];?></td>
									<td><?php echo $row['v'];?></td>
									<?php
									if($no_of_cars==$requestd_of_cars)
									{
										?>
									<td><input type="button"  id="active" value="Send To Vinlyer" class="btn btn-success" onclick="send_vinlyer(<?php echo  $row['camp_id'];?>);">
									<?php
									}
									else
									{
									
									?>
									<td><input type="button"  id="active" value="Send To Vinlyer" disabled class="btn btn-danger" onclick="send_vinlyer(<?php echo  $row['camp_id'];?>);">
									<?php
									}
									?>
                                  </tr>
                                  
                                </tbody>
								<?php
									
								}
								?>
									
<script>
window.location="in_active_campaign.php";
</script>