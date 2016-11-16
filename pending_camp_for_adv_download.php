<?php 
include('include/db_config.php');
?>
<?php 
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename="."Wrap2Earn.xls");

header("Pragma: no-cache");
header("Expires: 0");

?>


	
                               <table class="table table-bordered" id="disp" border="1">
                                <thead>
                                  <tr>
                                    <th>Si No</th>
									
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Company</th>
									<th>Company URL</th>
									<th>Campaign Name</th>
									<th>Camp Description</th>
									<th>Camp Object</th>	
									<th>Categoty</th>
									
									<th>No of Cars</th>	
									<th>Start Date</th>
									<th>Duration </th>
									<th>End date</th>	
									<th>Amount </th>
                                                                        <th>Paid Amount </th>
									<th>City</th>
									<th>Camp From</th>	
									<th>Camp To</th>
									<th>Vehicle Type</th>
									<!--<th>Camp Logo</th>
									<th>Camp ART</th>-->
									
									
									
                                  </tr>
                                </thead>
								 <?php 
								
									$myDate = date('Y/m/d');	
						$sql="SELECT a.adv_name,a.adv_email,a.adv_contact,b.camp_id,b.camp_art,b.company_url,
						b.company,b.camp_title, b.company_desc,b.camp_objective,b.camp_category,b.camp_no_cars,
						b.camp_start_date, b.camp_duration,b.camp_end_date,b.camp_amount,b.camp_city,b.camp_from,b.camp_to,
						b.camp_veh_type,b.camp_logo FROM cust_advertiser_info as a, cust_campaign_details as b 
						where a.adv_id=b.camp_adv_id AND a.adv_name!='' AND a.adv_email!='' AND a.adv_contact!='' 
				AND a.adv_date!='' AND b.camp_status='0' AND b.camp_active_status='0' ";	
									
					
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									$no_of_cars=$row['camp_no_cars'];
									
									
									
									
									$no++;	
 									
									
									?>
                                <tbody>
                                  <tr>
								  
                                    
									<td><?php  echo $no?></td>
                                    <td><?php echo $row['adv_name'];?></td>
                                    <td><?php echo $row['adv_email'];?></td>
                                    <td><?php echo $row['adv_contact'];?></td>
                                    <td><?php echo $row['company'];?></td>
									<td><?php echo $row['company_url'];?></td>
									<td><?php echo $row['camp_title'];?></td>
									<td><?php echo $row['company_desc'];?></td>
									<td><?php echo $row['camp_objective'];?></td>
									<td><?php echo $row['camp_category'];?></td>
									
									<td><?php echo $row['camp_no_cars'];?></td>
									<td><?php echo $row['camp_start_date'];?></td>
									<td><?php echo $row['camp_duration'];?></td>
									<td><?php echo $row['camp_end_date'];?></td>
									<td><?php echo $row['camp_amount'];?></td>
                                                               <?php 
									$amount=0;
									$sql1="SELECT amount FROM `cust_camp_payment_details` WHERE camp_id='$camp_id' AND adv_id='$adv_id'";
						$query1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
						while($row1=mysqli_fetch_array($query1))
								{
									$amount=$row1['amount'];
								}
									?>
									<td><?php echo $amount?></td>
									<td><?php echo $row['camp_city'];?></td>
									<td><?php echo $row['camp_from'];?></td>
									<td><?php echo $row['camp_to'];?></td>
									<td><?php echo $row['camp_veh_type'];?></td>
									<!--<td><?php echo $row['camp_logo'];?></td>
									<td><?php echo $row['camp_art'];?></td>-->
									
                                  </tr>
                                  
                                </tbody>
								<?php
									
								}
								?>
									
		
                              </table>
<script>


		window.location.href="pending_camp_for_adv.php";
</script>