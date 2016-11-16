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
                                    <th>Camp Description</th>
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
								
							
									$myDate = date('Y/m/d');	
									$no=0;
									
									$sql="SELECT *  FROM cust_campaign_details AS a , cust_advertiser_info as b WHERE (a.camp_adv_id = b.adv_id) AND 
								(a.company !='' AND a.company_url !='' AND a.camp_title !='' AND a.company_desc !='' AND a.camp_objective !='' AND a.camp_category !='' AND a.camp_no_cars !='' 
								AND a.camp_start_date !='' AND a.camp_duration !='' AND a.camp_end_date !='' AND a.camp_amount !='' AND a.camp_city !='' AND a.camp_from !='' AND a.camp_logo !='' AND
								a.camp_art !='' AND a.camp_vinyl_pattern !='' AND a.camp_veh_type !='') ";	
						
						
							
							$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						
						
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
                                    <td><?php echo $row['camp_desc'];?></td>
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