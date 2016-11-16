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
                                    <th>Sign up Date</th>
									
									
                                  </tr>
                                </thead>
								 <?php 
								$sql="select  a.adv_id,a.adv_name,a.adv_email,a.adv_contact,a.adv_date,a.adv_brand,a.adv_category,a.adv_date from cust_advertiser_info as a ,cust_campaign_details as b where a.adv_id=b.camp_adv_id AND b.camp_id='' ";
								
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									$no++;	
 										
									if($row['adv_name']!="" AND $row['adv_email']!="" AND $row['adv_contact']!="" 
									AND $row['adv_brand']!="" AND $row['adv_category']!="" AND $row['adv_date']!="")	 
									{
										
									
								
									?>
                                <tbody>
                                  <tr>
								  
                                    <td><?php  echo $no?></td>
                                    <td><?php echo $row['adv_name'];?></td>
                                    <td><?php echo $row['adv_email'];?></td>
                                    <td><?php echo $row['adv_contact'];?></td>
                                    <td><?php echo $row['adv_date'];?></td>
                                  </tr>
                                  
                                </tbody>
								<?php
								}
								}
								?>
									
		
                              </table>
<script>
		window.print()
</script>	
<script>
		window.location.href="adv_in_comp_profile.php";
</script>