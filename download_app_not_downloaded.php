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
                                    <th>Frequently driving area</th>
									<th>Car make</th>
									<th>Car reg no</th>
									<th>Downloaded status</th>
                                  </tr>
                                </thead>
								 <?php 
								$sql="select * from  cust_drivers where app_status='web' ";
								
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									
									if($row['driv_name']!="" AND  $row['driv_gender']!="" AND $row['driv_age']!="" AND $row['driv_email']!="" 
									AND $row['driv_contact']!="" AND $row['driv_word']!="" AND $row['driv_word_other']!="" AND $row['driv_car_reg_no']!=""
									AND $row['driv_car_reg_year']!="" AND  $row['driv_car_make']!="" AND
									$row['driv_car_model']!="" AND $row['driv_prim_usage']!="" AND $row['driv_travel_city']!="" AND $row['driv_frequent_areas']!="" OR
									$row['driv_travel_distance']!="" AND $row['driv_car_color']!="" AND	$row['driv_color_other']!="" AND
									$row['driv_car_condition']!="" AND $row['driv_car_fuel']!="" AND $row['driv_car_type']!="" AND
									$row['driv_varification_image1']!="" AND	$row['driv_varification_image2']!="" AND	$row['driv_varification_image3']!="" OR
									$row['driv_license']!=""  AND $row['driv_pancard']!="" AND	$row['driv_camp_category']!="" AND
									$row['driv_reg_date']!="" AND $row['driv_camp_duration']!="" 	 AND	$row['driv_camp_id']!="" AND
									$row['driv_vinyl_type']!="" AND	$row['driv_add_one']!="" AND	$row['driv_add_two']!="" AND
									$row['driv_city']!="" )	 
									{
									$no++;
									?>
                                <tbody>
                                  <tr>
								  
                                    <td><?php  echo $no?></td>
                                    <td><?php echo $row['driv_name'];?></td>
                                    <td><?php echo $row['driv_email'];?></td>
                                    <td><?php echo $row['driv_contact'];?></td>
                                    <td><?php echo $row['driv_frequent_areas'];?></td>
									<td><?php echo $row['driv_car_make'];?></td>
                                    <td><?php echo $row['driv_car_reg_no'];?></td>
									<td><?php echo $row['app_status'];?></td>
                                  </tr>
                                  
                                </tbody>
								<?php
									}
								}
								?>
									
		
                              </table>
	
<script>
		window.location.href="app_not_downloaded.php";
</script>