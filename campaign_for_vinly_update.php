<?php 
include('include/db_config.php');
?>
<?php
$camp_id=$_GET['id'];
$myDate = date('Y/m/d');

$sql="select * from cust_campaign_details where camp_id='$camp_id'";
$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$row=mysqli_fetch_array($query);
{
	

$duration=$row['camp_duration'];
	//echo $duration;
	$duration = '+'.$duration .' months';
	
$effectiveDate = date('Y-m-d', strtotime($myDate . $duration) );
//echo $effectiveDate;

/*$up_query="update cust_campaign_details SET camp_start_date='$myDate',camp_end_date='$effectiveDate' where camp_id='$camp_id'";
mysql_query($up_query);

$up_query1="update cust_vinyler_dashboard SET active_or_inactive='2' where vd_camp_id='$camp_id'";
mysql_query($up_query1);*/

$up_query1="UPDATE cust_campaign_details a JOIN cust_vinyler_dashboard b ON a.camp_id='$camp_id' AND b.vd_camp_id='$camp_id' 
	SET a.camp_start_date='$myDate',a.camp_end_date='$effectiveDate',b.active_or_inactive='2'";
mysqli_query($GLOBALS["___mysqli_ston"], $up_query1);


?>
<?php
	}
?>
<thead>
                                  <tr>
                                    <th>Sl NO</th>
									<th>Art Image</th>
                                    <th> Campaign Name</th>
                                    <th>Company</th>
                                    <th>Contact</th>
                                    <th>Email</th>
									<th>Requested No Of Cars</th>
									
									<th>Fullfilled cars</th>
									<th>Status</th>
									
                                  </tr>
                                </thead>
                                <tbody>
								<?php 
								
								$query = "SELECT a.camp_id,d.vd_camp_id,a.camp_title,a.company,a.camp_no_cars,a.camp_art,b.adv_contact,b.adv_email,d.active_or_inactive,count(c.driv_camp_id) as v from cust_campaign_details as a,cust_advertiser_info as b , cust_drivers as c,cust_vinyler_dashboard as d where a.camp_adv_id=b.adv_id AND d.vd_camp_id=a.camp_id AND a.camp_id=c.driv_camp_id  group by a.camp_id";
								$result = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
										$sl=0;
										
										while($row=mysqli_fetch_array($result))
										{
										$active_or_inactive=$row['active_or_inactive'];
										$sl++;
									
										
										
									?>
									<form action="insert_vinyl.php" method="POST">
                                  <tr>
                                    <td><?php echo $sl; ?></td>
									<td><img src="../advertiser/<?php echo $row['camp_art'];?>"  class="img-responsive"/ style="width:50px;"></td>
									<td><?php echo $row['camp_title'];?></td>
                                    <td><?php echo $row['company'];?></td>
									<td><?php echo $row['adv_contact'];?></td>
                                   
									<td><?php echo $row['adv_email'];?></td>
									<td><?php echo $row['camp_no_cars'];?></td>
									
									<td><?php echo $row['v'];?></td>
									<?php
									if($active_or_inactive=='0')
									{
										?>
									<td><input type="button"  id="active" value="Processing" disabled style="color:gray;"  onclick="send_vinlyer(<?php echo  $row['camp_id'];?>);">
									<?php
									}
									else if($active_or_inactive=='1')
									{
									
									?>
									<td><input type="button"  id="active" value="Send To Live"  class="btn btn-success" onclick="go_live(<?php echo  $row['camp_id'];?>);">
									<?php
									}
									else
									{
									?>
									<td><input type="button"  id="active" value="SENT" disabled  class="btn btn-danger" onclick="go_live(<?php echo  $row['camp_id'];?>);">
									<?php
									}
									?>
                                   </tr> 
									
									
								  </form>
								<?php } ?>
                                </tbody>
<script>
window.location="campaign_for_vinyl.php";
</script>