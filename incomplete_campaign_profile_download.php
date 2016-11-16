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
                                    <th>Sl No</th>
									<th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Company</th>
                                    <th>Campaign Name</th>
                                    <th>Company Description</th>
									<th>Camp Objective</td>
									<th>Camp Category</th>
									<th>Camp Brand</th>
									<th>Camp no of cars</th>	
									<th>Camp start Date</th>
									<th>Camp Duration</th>									
									<th>Camp End Date</th>
									<th>Camp amount</th>	
									<th>City</th>
									<th>From </th>									
                                    <th>To </th>
									<th>Vehicle Type </th>	
                                  </tr>
                                </thead>
								 <?php 
								$sql="SELECT *  FROM cust_campaign_details AS a , cust_advertiser_info as b WHERE (a.camp_adv_id = b.adv_id) AND 
								(a.company='' OR a.company_url='' OR a.camp_title='' OR a.company_desc='' OR a.camp_objective='' OR a.camp_category='' OR a.camp_no_cars='' 
								OR a.camp_start_date='' OR a.camp_duration='' OR a.camp_end_date='' OR a.camp_amount='' OR a.camp_city='' OR a.camp_from='' OR a.camp_logo='' OR
								a.camp_art='' OR a.camp_vinyl_pattern='' OR a.camp_veh_type='')";		
						
						
							
							$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						
						$no=0;
								while($row=mysqli_fetch_array($query))
								{
									
															
											
	
									$no++;	
								?>
                                <tbody>
                                  <tr>
								  
                                    <td><?php  echo $no;?></td>
									<td><?php echo $row['adv_name'];?></td>
									<td><?php echo $row['adv_email'];?></td>
                                    <td><?php echo $row['adv_contact'];?></td>
                                    <td><?php echo $row['company'];?></td>
                                  
                                    <td><?php echo $row['camp_title'];?></td>
                                    <td><?php echo $row['company_desc'];?></td>
									<td><?php echo $row['camp_objective'];?></td>
									<td><?php echo $row['camp_category'];?></td>
									<td><?php echo $row['camp_brand'];?></td>
									<td><?php echo $row['camp_no_cars'];?></td>
									<td><?php echo $row['camp_start_date'];?></td>
									<td><?php echo $row['camp_duration'];?></td>
									<td><?php echo $row['camp_end_date'];?></td>
									<td><?php echo $row['camp_amount'];?></td>
									<td><?php echo $row['camp_city'];?></td>
									<td><?php echo $row['camp_from'];?></td>
									<td><?php echo $row['camp_to'];?></td>
									<td><?php echo $row['camp_veh_type'];?></td>
									
									
									
                                  </tr>
                                  
                                </tbody>
								<?php
									}
								
								?>
</table>