<?php 
include('include/db_config.php');
?>
<?php 
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename="."Wrap2Earn.xls");

header("Pragma: no-cache");
header("Expires: 0");

?>

<table class="table table-bordered order-table table" id="disp">
                                <thead>
                                  <tr>
                                    <th>Sl NO</th>
									<!--<th>Art Image</th>-->
                                    <th> Campaign Name</th>
                                    <th>Company</th>
                                    <th>Contact</th>
                                    <th>Email</th>
									<th>Requested No Of Cars</th>
									
									<th>Fullfilled cars</th>
									
									
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
									$camp_art=$row['camp_art'];
										
										
									?>
									<form action="insert_vinyl.php" method="POST">
                                  <tr>
                                    <td><?php echo $sl; ?></td>
						<!--<td><img src="../advertiser/<?php  $camp_art = str_replace("","",$camp_art); echo str_replace("|","",$camp_art);?>"  class="img-responsive" style="width:50px;" alt="No image"></td>-->
									<td><?php echo $row['camp_title'];?></td>
                                    <td><?php echo $row['company'];?></td>
									<td><?php echo $row['adv_contact'];?></td>
                                   
									<td><?php echo $row['adv_email'];?></td>
									<td><?php echo $row['camp_no_cars'];?></td>
									
									<td><?php echo $row['v'];?></td>
									
                                   </tr> 
									
									
								  </form>
								<?php } ?>
                                </tbody>
                              </table>