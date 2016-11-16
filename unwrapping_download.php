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
                                    <th>Si No</th>
                                    <th>Advertiser  Name</th>
                                    <th>Advertiser Email</th>
                                    <th>Advertiser Contact No</th>
									<th>Campaign name</td>
									<th>Duration</td>
									<th>Campaign End date</th>
									<th>Impressions gained</th>
									
									
									
                                  </tr>
                                </thead>
								
								 <?php 
									$myDate = date('Y-m-d');
								
								
								
								$sql="SELECT *
								FROM cust_advertiser_info as a,cust_campaign_details as b, cust_vinyler_dashboard as c 
								where a.adv_id=b.camp_adv_id AND b.camp_id=c.vd_camp_id AND b.camp_status='0' 
								AND b.camp_active_status='1' AND b.camp_end_date <= '$myDate'
								AND c.active_or_inactive='3'  ";
						
								$no=0;
							
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								while($row=mysqli_fetch_array($query))
								{
									
										$no++;
									
					?>
                                <tbody>
                                  <tr>
								    <input type="hidden" id="vd_camp_id" value="<?php  echo $row['vd_camp_id'];?>">
                                    <td><?php  echo $no;?></td>
                                    <td><?php echo $row['adv_name'];?></td>
                                    <td><?php echo $row['adv_email'];?></td>
                                    <td><?php echo $row['adv_contact'];?></td>
                                    <td><?php echo $row['camp_title'];?></td>
									<td><?php echo $row['camp_duration'];?></td>
									<td><?php echo $row['camp_end_date'];?></td>
									<td><?php echo $row['driv_impression'];?></td>
									
					
																												
                                   
									
                                  </tr>
                                  
                                </tbody>
								<?php
									
								}
								?>
                            </table>