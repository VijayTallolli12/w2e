<?php 
include('include/db_config.php');
?>
<?php 
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename="."Wrap2Earn.xls");

header("Pragma: no-cache");
header("Expires: 0");

$from=$_POST["from"];
$from=date("Y-m-d", strtotime($from));
$to=$_POST["to"];
$to=date("Y-m-d", strtotime($to));
?>
	<table class="table table-bordered">
                                <thead>
                                  <tr>
                                     <th>Sl</th>
                                    <th>ADVERISER</th>
									<th>E-MAIL</th>
									<th>CONTACT</th>
                                    <th>BRAND</th>
									<th>CATEGEORY</th>
                                    <th>DATE</th> 									
                                  </tr>
                                </thead>
                                <tbody>
             <?php			
			  $sql="SELECT  * from cust_advertiser_info where adv_date between '$from' and '$to'";  
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
										<td class="data"><?php echo $row['adv_category'];?></td>			
										<td class="data"><?php echo $row['adv_date'];?></td>	
															
						</tr>
							
					<?php		
					}
						?>	
							
                                </tbody>
                              </table>