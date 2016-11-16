<?php 
include('include/db_config.php');
?>
<?php 
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename="."Wrap2Earn.xls");

header("Pragma: no-cache");
header("Expires: 0");

?>
<?php 
 

$from=$_POST["from"];
$from=date("Y-m-d", strtotime($from));
$to=$_POST["to"];
$to=date("Y-m-d", strtotime($to));



?>


	
                <div class="col-md-06" style="width:95%">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Driver Details</h3></div>
                        <div class="panel-body table-responsive">
                       
                        	<table class="table table-bordered" border="1">
                                <thead>
                                  <tr>
                                    <th>Sl</th>
                                    <th>Driver Name</th>
									<th>Driver E-Mail</th>
									<th>Driver Contact No</th>
									<th>CAR MAKE</th>
                                    <th>CAR MODEL</th>
                                    <th>REGISTRATION</th>
								<!--	<th>Start Date</th>
									<th>End Date</th>	-->												
                                  </tr>
                                </thead>
									<tbody>
										<?php
											$sql="SELECT * from cust_drivers where driv_reg_date between ('$from') AND ('$to')"; 
									
											$res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
											$sl=0;
												while($row=mysqli_fetch_array($res))
												{
												$sl++;
										?>  
												 <tr>
																<td class="data"><?php echo $sl;?></td>
																<td class="data"><?php echo $row['driv_name'];?></td>
																<td class="data"><?php echo $row['driv_email'];?></td>	
																<td class="data"><?php echo $row['driv_contact'];?></td>			
																<td class="data"><?php echo $row['driv_car_make'];?></td>				
																<td class="data"><?php echo $row['driv_car_model'];?></td>
																<td class="data"><?php echo $row['driv_reg_date'];?></td>
																<!--<td class="data"><?php echo $row['camp_start_date'];?></td>
																<td class="data"><?php echo $row['camp_end_date'];?></td>-->
																					
												</tr>
													
												<?php		
												}
												?>	
								
									</tbody>
									</table>
						</div>
                    </div>
                </div>		
							
							
							
							
							
							
							
							
						<div class="col-md-06" style="width:95%">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Advertiser Details</h3></div>
                        <div class="panel-body table-responsive">
                       
                        	<table class="table table-bordered" border="1">
                                <thead>
                                  <tr>
                                    <th>Sl</th>
                                    <th>Advertiser Name</th>
									<th>Advertiser E-Mail</th>
									<th>Advertiser Contact No</th>
									<th>Brand</th>
                                    <th>REGISTRATION</th>
								<!--	<th>Start Date</th>
									<th>End Date</th>	-->												
                                  </tr>
                                </thead>
									<tbody>
										<?php
											$sql="SELECT * from cust_advertiser_info where adv_date between ('$from') AND ('$to')"; 
									
											$res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
												$sl=0;
													while($row=mysqli_fetch_array($res))
													{
													$sl++;
										?>  
												 <tr>
																<td class="data"><?php echo $sl;?></td>
										<td class="data"><?php echo $row['adv_name'];?></td>
										<td class="data"><?php echo $row['adv_email'];?></td>	
										<td class="data"><?php echo $row['adv_contact'];?></td>			
										<td class="data"><?php echo $row['adv_brand'];?></td>				
										<td class="data"><?php echo $row['adv_date'];?></td>
										<!--<td class="data"><?php echo $row['camp_start_date'];?></td>
										<td class="data"><?php echo $row['camp_end_date'];?></td>-->
																					
												</tr>
													
												<?php		
												}
												?>	
								
									</tbody>
									</table>
						</div>
                    </div>
                </div>	
				

<script>
		window.location.href="subscribers.php";
</script>	