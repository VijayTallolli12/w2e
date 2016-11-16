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
	
	
                <div class="col-md-06" style="width:95%" >
                <?php
                //date_default_timezone_set('Asia/Calcutta');
				$date = date('d-m-Y');
                ?>
                	
                    
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body table-responsive">
                        
                        	<table class="table table-bordered" border="1">
                                <thead>
                                  <tr>
                                     <th>Si No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Driver Car Type</th>
									<th>Driver Reg Date</th>									
                                  </tr>
                                </thead>
                                <tbody>
            <?php			
			  $sql="SELECT  * from cust_drivers where driv_car_type='commercial' AND driv_reg_date between '$from' and '$to' ";  
			  
			  $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
					$sl=0;
						while($row=mysqli_fetch_array($res))
						{
						$sl++;
						
			?>  
						 <tr>
										<td><?php  echo $sl?></td>
                                    <td><?php echo $row['driv_name'];?></td>
                                    <td><?php echo $row['driv_email'];?></td>
                                    <td><?php echo $row['driv_contact'];?></td>
									<td><?php echo $row['driv_car_type'];?></td>
									<td><?php echo $row['driv_reg_date'];?></td>
															
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
		window.location.href="comercial_driver.php";
</script>
         


