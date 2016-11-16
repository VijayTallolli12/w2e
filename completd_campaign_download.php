<?php 
include('include/db_config.php');
?>

<table class="table table-bordered" border="1">
                                <thead>
                                  <tr>
                                    <th>Si No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Company</th>
									
									
                                  </tr>
                                </thead>
								 <?php 
								
									$myDate = date('Y/m/d');	
									
						$sql="SELECT a.camp_end_date,a.camp_adv_id,a.company,b.adv_name,b.adv_email,b.adv_contact,b.adv_id  FROM cust_campaign_details a, cust_advertiser_info b  where a.camp_adv_id=b.adv_id AND  '$myDate' > a.camp_end_date ";
						
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									$no++;	
 										
									
										
									
								
									?>
                                <tbody>
                                  <tr>
								  
                                    <td><?php  echo $no?></td>
                                    <td><?php echo $row['adv_name'];?></td>
                                    <td><?php echo $row['adv_email'];?></td>
                                    <td><?php echo $row['adv_contact'];?></td>
                                    <td><?php echo $row['company'];?></td>
									
									
                                  </tr>
                                  
                                </tbody>
								<?php
								
								}
								?>
									
		
                              </table>
<script>
		window.print()
</script>	
<script>
		window.location.href="completd_campaign.php";
</script>