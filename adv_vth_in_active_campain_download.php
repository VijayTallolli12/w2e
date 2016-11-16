<?php 
include('include/db_config.php');
?>
<?php 
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename="."Wrap2Earn.xls");

header("Pragma: no-cache");
header("Expires: 0");

?>

<table class="table table-bordered order-table table">
                                <thead>
                                  <tr>
                                    <th>Sl NO</th>
									<!--<th> Art Work</th>-->
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
								
								$query = "SELECT p.* , e.* FROM cust_vinyler_dashboard p    RIGHT OUTER JOIN 
								(SELECT  a.adv_email,a.adv_contact,b.camp_id,b.camp_art,b.camp_title,b.company,b.camp_no_cars,count(c.driv_camp_id) 
								as v FROM cust_advertiser_info as a, cust_campaign_details as b, cust_drivers as c where a.adv_id=b.camp_adv_id 
								AND b.camp_id=c.driv_camp_id AND b.camp_status='0' AND b.camp_active_status='1'  group by b.camp_id) as e
    ON p.vd_camp_id = e.camp_id";
								$result = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
										$sl=0;
								while($row=mysqli_fetch_array($result)) {								
								
								$sl++;
										$camp_no_cars=$row['camp_no_cars'];
										$no_of_camp_id=$row['v'];
										$camp_id=$row['camp_id'];
										
									?>
									<form action="insert_vinyl.php" method="POST">
                                  <tr>
                                    <td><?php echo $sl; ?></td>
									<!--<td><img src="../advertiser/<?php echo $row['camp_art'];?>"  class="img-responsive"/ style="width:50px;"></td>-->
                                    <td><?php echo $row['camp_title'];?></td>
									<td><?php echo $row['company'];?></td>
                                    <td><?php echo $row['adv_contact'];?></td>
									<td><?php echo $row['adv_email'];?></td>
									<td><?php echo $camp_no_cars;?></td>
									<td><?php echo $no_of_camp_id;?></td>
									<input type="hidden" name="camp_id" value="<?php echo $camp_id ;?>">
									
                                    
									
									
									
									
                                  </tr>
								  </form>
								<?php } ?>
                                </tbody>
                              </table>