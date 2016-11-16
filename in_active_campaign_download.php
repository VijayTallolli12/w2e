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
									
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
									<th>Campaign Name</th>
									<th>Start Date</th>
									<th>Duration</th>
									<th>Requested No Of Cars</th>
									<th>Total Signed up</th>
									
									
									
                                  </tr>
                                </thead>
								 <?php 
								
									$myDate = date('Y/m/d');	
								$sql="select a.adv_name,a.adv_email,a.adv_contact,b.camp_id,b.company,b.camp_title,b.camp_no_cars,b.camp_start_date,
								b.camp_duration,count(c.driv_camp_id) as v
								from cust_advertiser_info a inner join cust_campaign_details b on a.adv_id = b.camp_adv_id AND b.camp_status='1' 
								AND b.camp_active_status='0' left join cust_drivers c on b.camp_id = c.driv_camp_id group by b.camp_id";	
									
						/*$sql="SELECT a.adv_name,a.adv_email,a.adv_contact,b.camp_id,b.camp_art,b.camp_title,
						b.company,b.camp_no_cars,count(c.driv_camp_id) as v FROM cust_advertiser_info as a,
						cust_campaign_details as b, cust_drivers as c where a.adv_id=b.camp_adv_id AND 
						b.camp_id=c.driv_camp_id AND a.adv_name!='' AND a.adv_email!='' AND 
						a.adv_contact!='' AND a.adv_date!='' AND b.camp_status='1' AND b.camp_active_status='0' 
						group by b.camp_id ";*/
						
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
									
                                  
                                </tbody>
								<?php
									
								}
								?>
		
                              </table>
	
<script>
		window.location.href="in_active_campaign.php";
</script>