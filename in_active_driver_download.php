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
                                    <th>Driver Name</th>
                                    <th>Driver Email</th>
                                    <th>Driver Contact No</th>
									<th>Campaign name</th>
                                    <th>Camp Start date</th>
									<th>Camp End date</th>
									
									
                                  </tr>
                                </thead>
								 <?php 
								 
								 
								
								$sql="SELECT a.driv_name,a.driv_email,a.driv_contact,b.camp_start_date,b.camp_end_date,b.camp_title 
								FROM cust_drivers as a, cust_campaign_details as b WHERE a.driv_camp_id=b.camp_id AND b.camp_status='1' 
								AND camp_active_status='0' limit 50";
								$no=0;
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								while($row=mysqli_fetch_array($query))
								{
									$no++;
 										
									
									
								
									?>
                                <tbody>
                                  <tr>
								  
                                    <td><?php  echo $no;?></td>
                                    <td><?php echo $row['driv_name'];?></td>
                                    <td><?php echo $row['driv_email'];?></td>
                                    <td><?php echo $row['driv_contact'];?></td>
                                    <td><?php echo $row['camp_title'];?></td>
									<td><?php echo $row['camp_start_date'];?></td>
                                    <td><?php echo $row['camp_end_date'];?></td>
									
                                  </tr>
                                  
                                </tbody>
								<?php
									}
								
								?>
									
		
                              </table>
	
<script>
		window.location.href="in_active_driver.php";
</script>