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
									<th>Impression Gained</th>
									<th>Driver Km</th>
									
									
									
									
									
                                  </tr>
                                </thead>
								
								 <?php 
								
									$myDate = date('Y/m/d');
										$driv_id =$_GET['driv_id'];
									
									
				$sql="SELECT a.driv_camp_id,b.driv_name,b.driv_email,driv_contact,c.company,c.camp_title,a.driv_camp_earn,a.driv_camp_dist,a.driv_impression FROM cust_driver_camp_details 
					as a ,cust_drivers as b , cust_campaign_details as c where a.driv_camp_id = c.camp_id AND a.driv_id = b.driv_id AND a.driv_id = '$driv_id' ";	
						
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									//end_date=$row['camp_end_date'];
									
									
									

									
									
									//$start_date = date_create($myDate);
								
								//	$today =$camp_start_date1  - $start_date;
									
									
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
									<td><?php echo $row['driv_camp_earn'];?></td>
									<td><?php echo $row['driv_impression'];?></td>
									<td><?php echo $row['driv_camp_dist'];?></td>
									
									
									
									
                                  </tr>
                                  
                                </tbody>
								<?php
									
								}
								?>
									
		
                              </table>