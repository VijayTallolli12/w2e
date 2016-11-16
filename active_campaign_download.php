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
									<th>No of Cars</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Duration</th>
									<th>Impressions gained</th>
									<th>Total Km</th>
									
									
                                  </tr>
                                </thead>
								
								 <?php 
								
									$myDate = date('Y/m/d');	
									
									
									
							$sql="SELECT a.adv_name,a.adv_email,a.adv_contact,b.camp_id,b.camp_title,b.camp_start_date,
							b.camp_end_date,b.camp_duration,b.camp_no_cars,coalesce(sum( d.driv_impression),0) as impression,coalesce(sum( d.driv_camp_dist),0) as driv_camp_dist
						from cust_advertiser_info a inner join  cust_campaign_details b on a.adv_id=b.camp_adv_id inner join 
						cust_vinyler_dashboard c on b.camp_id=c.vd_camp_id left join cust_driver_camp_details as d on b.camp_id = d.driv_camp_id
						where b.camp_status='0'
				AND b.camp_active_status='1' AND  c.active_or_inactive='2' AND  b.camp_end_date >= '$myDate' group by b.camp_id";
						
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									$end_date=$row['camp_end_date'];
									
									
									
									
									$no++;	
 									
									
									?>
                                <tbody>
                                  <tr>
								  
                                    
									<td><?php  echo $no?></td>
                                    <td><?php echo $row['adv_name'];?></td>
                                    <td><?php echo $row['adv_email'];?></td>
                                    <td><?php echo $row['adv_contact'];?></td>
              						<td><?php echo $row['camp_title'];?></td>
									<td><?php echo $row['camp_no_cars'];?></td>
									<td><?php echo $row['camp_start_date'];?></td>
									<td><?php echo $row['camp_end_date'];?></td>
									<td><?php echo $row['camp_duration'];?></td>
									<td><?php echo $row['impression'];?></td>
									<td><?php echo $row['driv_camp_dist'];?></td>
									
                                  </tr>
                                  
                                </tbody>
								<?php
									
								}
								?>
							  
							  
	
<script>
		window.location.href="active_campaign.php";
</script>