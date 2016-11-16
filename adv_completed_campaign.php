<?php
include ('include/db_config.php');

$from=$_GET["da"];
$from=date("Y-m-d", strtotime($from));
$to=$_GET["te"];
$to=date("Y-m-d", strtotime($to));

?>
	
	
                <div class="col-md-06" style="width:95%">
                <?php
                //date_default_timezone_set('Asia/Calcutta');
				$date = date('d-m-Y');
                ?>
                	
                    
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body table-responsive">
                        
                        	<table class="table table-bordered">
                                <thead>
                                  <tr>
                                     <th>Sl No</th>
                                    <th>Advertiser</th>
									<th>Email</th>
									<th>Phone No</th>
                                    <th>Campaign Name</th>
                                    <th>Campaign Start Date</th> 
									<th>Campaign End Date</th> 									
                                  </tr>
                                </thead>
                                <tbody>
             <?php		
			$myDate = date('Y-m-d');			 
			  /*$sql="SELECT a.`adv_name`,a.`adv_email`,a.`adv_contact`,b.camp_title,b.camp_start_date,
			  b.camp_end_date from cust_advertiser_info as a,cust_campaign_details as b 
			  where a.adv_id=b.camp_adv_id and date(b.camp_start_date) between DATE('$from') AND DATE('$to') LIMIT 50"; */

							$sql="SELECT b.camp_id,a.adv_name,a.adv_email,a.adv_contact,b.camp_title,b.camp_duration,
							b.camp_start_date,b.camp_end_date,
								b.camp_end_date,d.driv_impression,c.vd_camp_id,active_or_inactive
								FROM cust_advertiser_info as a,cust_campaign_details as b, cust_vinyler_dashboard as c , 
								cust_driver_camp_details as d
								where a.adv_id=b.camp_adv_id AND b.camp_id=c.vd_camp_id AND b.camp_status='1' 
								AND b.camp_active_status='1'AND b.camp_id=d.driv_camp_id 
								AND b.camp_end_date <= '$myDate'  
								AND  c.active_or_inactive='4' and date(b.camp_start_date) between DATE('$from') AND DATE('$to') LIMIT 50";		

								$sql="SELECT *
								FROM cust_advertiser_info as a,cust_campaign_details as b, cust_vinyler_dashboard as c 
								where a.adv_id=b.camp_adv_id AND b.camp_id=c.vd_camp_id AND b.camp_status='0' 
								AND b.camp_active_status='1' AND b.camp_end_date <= '$myDate'
								AND c.active_or_inactive='2' and date(b.camp_start_date) between DATE('$from') AND DATE('$to')  LIMIT 50 
								
								union
								SELECT *
								FROM cust_advertiser_info as a,cust_campaign_details as b, cust_vinyler_dashboard as c 
								where a.adv_id=b.camp_adv_id AND b.camp_id=c.vd_camp_id AND b.camp_status='1' 
								AND b.camp_active_status='1' AND b.camp_end_date <= '$myDate'
								AND c.active_or_inactive='4'   and date(b.camp_start_date) between DATE('$from') AND DATE('$to')  LIMIT 50";									
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
										<td class="data"><?php echo $row['camp_title'];?></td>
										<td class="data"><?php echo $row['camp_start_date'];?></td>			
										<td class="data"><?php echo $row['camp_end_date'];?></td>	
															
						</tr>
							
					<?php		
					}
						?>	
							
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>		

             