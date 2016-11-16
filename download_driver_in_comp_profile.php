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
									<th>Driver Gender</th>
									<th>Driver Age</th>
                                    <th>Driver Email</th>
                                    <th>Driver Contact No</th>
									<th>Car Reg Year</th>
									<th>Car make</th>
									<th>Car Model</th>
									<th>Prime Usage</th>
                                    <th>Travel City</th>
									<th>Frequently Area</th>
									<th>Travel Distance</th>
									<th>Car Color</th>
									<th>Car Color Othher</th>
									<th>Car Condition</th>
									<th>Car Fuel</th>
									<th>Car Type</th>		
									<th>Register date</th>
									<th>Camp Duration</th>
									<th>Suburb</th>
                                  </tr>
                                </thead>
								 <?php 
								/*$sql="select * from  cust_drivers  ";
								
								$query=mysql_query($sql);
								$no=0;
								while($row=mysql_fetch_array($query))
								{
									$no++;		
 										
									if($row['driv_name']=="" OR  $row['driv_gender']=="" OR $row['driv_age']=="" OR $row['driv_email']=="" 
									OR $row['driv_contact']=="" OR $row['driv_word']=="" OR $row['driv_word_other']=="" OR $row['driv_car_reg_no']==""
									OR $row['driv_car_reg_year']=="" OR  $row['driv_car_make']=="" OR
									$row['driv_car_model']=="" OR $row['driv_prim_usage']=="" OR $row['driv_travel_city']=="" OR $row['driv_frequent_areas']=="" OR
									$row['driv_travel_distance']=="" OR $row['driv_car_color']=="" OR	$row['driv_color_other']=="" OR
									$row['driv_car_condition']=="" OR $row['driv_car_fuel']=="" OR $row['driv_car_type']=="" OR
									$row['driv_varification_image1']=="" OR	$row['driv_varification_image2']=="" OR	$row['driv_varification_image3']=="" OR
									$row['driv_license']==""  OR	$row['driv_pancard']=="" OR	$row['driv_camp_category']=="" OR
									$row['driv_reg_date']=="" OR	$row['driv_camp_duration']=="" 	 OR	$row['driv_camp_id']=="" OR
									$row['driv_vinyl_type']=="" 	 OR	$row['driv_add_one']=="" OR	$row['driv_add_two']=="" OR
									$row['driv_city']=="" )	 
									
									{*/
									$sql="SELECT   * FROM cust_drivers  WHERE  driv_camp_category = '' or driv_camp_duration ='' or driv_vinyl_type ='' ";
									$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									$no++;	
										
									
								
									?>
                                <tbody>
                                  <tr>
								  
                                    <td><?php  echo $no?></td>
                                    <td><?php echo $row['driv_name'];?></td>
									<td><?php echo $row['driv_gender'];?></td>
									<td><?php echo $row['driv_age'];?></td>
                                    <td><?php echo $row['driv_email'];?></td>
                                    <td><?php echo $row['driv_contact'];?></td>
									<td><?php echo $row['driv_car_reg_no'];?></td>
									<td><?php echo $row['driv_car_reg_year'];?></td>
									<td><?php echo $row['driv_car_make'];?></td>
									<td><?php echo $row['driv_car_model'];?></td>
									<td><?php echo $row['driv_prim_usage'];?></td>
									<td><?php echo $row['driv_travel_city'];?></td>
									<td><?php echo $row['driv_frequent_areas'];?></td>
									<td><?php echo $row['driv_travel_distance'];?></td>
									<td><?php echo $row['driv_car_color'];?></td>
									<td><?php echo $row['driv_color_other'];?></td>
									<td><?php echo $row['driv_car_condition'];?></td>
									<td><?php echo $row['driv_car_fuel'];?></td>
									<td><?php echo $row['driv_car_type'];?></td>									
									<td><?php echo $row['driv_reg_date'];?></td>
									<td><?php echo $row['driv_camp_duration'];?></td>
                                    <td><?php echo $row['driv_city'];?></td>
									
									
                                  </tr>
                                  
                                </tbody>
								<?php
								}
								
								?>
									
		
                              </table>
	
<script>
		window.location.href="driver_in_comp_profile.php";
</script>