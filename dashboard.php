<?php 
include('include/db_config.php');
?>
<?php
include("loginstatus.php");
?>
<html lang="en">
<head>
   <link rel="icon" type="image/png" href="assets/images/avtar/logoss.png" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Wrap2Earn</title>

	<meta name="description" content="">
	

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css" /> 

	<!-- Calendar Styling  -->
    <link rel="stylesheet" href="assets/css/plugins/calendar/calendar.css" />
    
    <!-- Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
    
    <!-- Base Styling  -->
    <link rel="stylesheet" href="assets/css/app/app.v1.css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
    .trpad
    {
     color: #c05279;    font-family: Roboto;
    }
    .dashboard-stats.rounded.panel {
    border-radius: 10px ! important;
      }
    .rpad{
     padding: 10px ! important;cursor: auto ! important;text-align: center;font-style:inherit;text-transform: none;
    }
    .subrpad{
    font-size: 16px;color: #0a0a0a;font-family: cursive;font-style:roboto;
    }
    </style>
</head>
<body data-ng-app>

	
    <!-- Preloader -->
    
    <!-- Preloader -->
    	
    
	<aside class="left-panel">
    		
            <?php include ("header.php") ?>
            
    </aside>
    <!-- Aside Ends-->
    
    <section class="content">
    	
        <header class="top-head container-fluid">
            <button type="button" class="navbar-toggle pull-left">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            
            
           
            
           
        </header>
        <!-- Header Ends -->
        
        
        <div class="warper container-fluid">
        	
            <!--<div class="page-header"><h1>Dashboard <small>Let's get a quick overview...</small></h1></div>-->
            
            
            <div class="row">
            
            	
            </div>
             
			<div class="warper container-fluid">
        	
                     
            
            <hr class="no-margn">
            
            <div class="row">           	
                
                <div class="col-md-12">                
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" style="font-family: Roboto;">Advertiser:</div>
                        <div class="panel-body table-responsive">
						
						
                        
                     <div class="col-md-6 col-lg-3">
				<div class="panel panel-default clearfix dashboard-stats rounded rpad">
                	<?php 
									$sql="SELECT COUNT(adv_name) as a FROM cust_advertiser_info";
							
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								//$num=mysql_num_rows($query);
								
									$row_new=mysqli_fetch_array($query);
									
								?>
                      <span class="trpad">  Completed  Advertisers Signup</span><br><span class="subrpad"><?php echo $row_new['a'];?></span>      
                    </div>
                </div>
                    <div class="col-md-6 col-lg-3">
				<div class="panel panel-default clearfix dashboard-stats rounded rpad">
                	<?php 
									$sql="SELECT COUNT(camp_id) as a FROM cust_campaign_details";
							
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								//$num=mysql_num_rows($query);
								
									$row_new=mysqli_fetch_array($query);
									
								?>
                      <span class="trpad">  Total Number of  Campaign</span><br><span class="subrpad"><?php echo $row_new['a'];?></span>      
                    </div>
                </div>    
                <div class="col-md-6 col-lg-3">
				<div class="panel panel-default clearfix dashboard-stats rounded rpad">
                	<?php 
									$myDate = date('Y/m/d');		
						
						
						$sql="SELECT a.adv_name,a.adv_email,a.adv_contact,b.camp_id,b.camp_title,b.camp_start_date,
							b.camp_end_date,b.camp_duration,coalesce(sum( d.driv_impression),0) as impression
						from cust_advertiser_info a inner join  cust_campaign_details b on a.adv_id=b.camp_adv_id inner join 
						cust_vinyler_dashboard c on b.camp_id=c.vd_camp_id left join cust_driver_camp_details as d on b.camp_id = d.driv_camp_id
						where b.camp_status='0'
						AND b.camp_active_status='1' AND  c.active_or_inactive='2' AND  b.camp_end_date >= '$myDate' group by b.camp_id";
							
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$row_new=mysqli_fetch_array($query);
								
								$active_campaign=mysqli_num_rows($query);
									
									
									
					?>
                      <span class="trpad">  Total Number of Active Campaign</span><br><span class="subrpad"><?php echo $active_campaign;?></span>      
                    </div>
                </div>   
                
                	<div class="col-md-6 col-lg-3">
				<div class="panel panel-default clearfix dashboard-stats rounded rpad">
                	<?php 
									$myDate = date('Y/m/d');		
						$sql=" SELECT a.camp_no_cars, count(c.driv_camp_id) as v
								FROM cust_campaign_details a,cust_drivers as c
								WHERE a.camp_id=c.driv_camp_id AND  a.camp_status='0' AND a.camp_active_status='1'  AND a.camp_id NOT 
								IN (SELECT vd_camp_id FROM cust_vinyler_dashboard)  having a.camp_no_cars = v
								union
								SELECT  a.camp_no_cars,a.company from cust_campaign_details as a,cust_advertiser_info as b,
								cust_vinyler_dashboard as d where a.camp_adv_id=b.adv_id AND d.vd_camp_id=a.camp_id 
								 AND (d.active_or_inactive='0' OR d.active_or_inactive='1') ";
							
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								
										
									$no_of_vinel=mysqli_num_rows($query);
									
									
					?>
                      <span class="trpad">  Total Number of Vinyl Campaign</span><br><span class="subrpad"><?php echo $no_of_vinel;?></span>      
                    </div>
                </div>
                
                
				
				
				<div class="col-md-6 col-lg-3">
				<div class="panel panel-default clearfix dashboard-stats rounded rpad">
                	<?php 
									$myDate = date('Y/m/d');		
						$sql="select  COUNT(camp_id) as d
								from  cust_campaign_details where camp_status='1' AND
								camp_active_status='0'  ";
							
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$row_new=mysqli_fetch_array($query);
										
									
									
									
					?>
                      <span class="trpad">  Total Number of Inactive Campaign</span><br><span class="subrpad"><?php echo $row_new['d'];?></span>      
                    </div>
                </div>
				
				<div class="col-md-6 col-lg-3">
				<div class="panel panel-default clearfix dashboard-stats rounded rpad">
                	<?php 
									$myDate = date('Y/m/d');	
								$sql="SELECT COUNT( b.camp_id ) AS m
									FROM cust_advertiser_info AS a, cust_campaign_details AS b, cust_vinyler_dashboard AS c
									WHERE a.adv_id = b.camp_adv_id
									AND b.camp_id = c.vd_camp_id
									AND b.camp_status =  '0'
									AND b.camp_active_status =  '1'
									AND b.camp_end_date <=  '$myDate'
									AND c.active_or_inactive =  '2'
									LIMIT 50 
									UNION 
									SELECT COUNT( b.camp_id ) AS m
									FROM cust_advertiser_info AS a, cust_campaign_details AS b, cust_vinyler_dashboard AS c
									WHERE a.adv_id = b.camp_adv_id
									AND b.camp_id = c.vd_camp_id
									AND b.camp_status =  '1'
									AND b.camp_active_status =  '1'
									AND b.camp_end_date <=  '$myDate'
									AND c.active_or_inactive =  '4'";
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$camp1 = 0;
								while($row=mysqli_fetch_array($query))
								{
									$camp1=$row['m']+$camp1;
									
								}
										
									
									
									
					?>
                      <span class="trpad">  Total Number of Completed Campaign</span><br><span class="subrpad"> <?php echo $camp1;?></span>           
                    </div>
                </div>
				<div class="col-md-6 col-lg-3">
				<div class="panel panel-default clearfix dashboard-stats rounded rpad">
                	<?php 
						$myDate = date('Y/m/d');	
									$no=0;
									
								$sql="SELECT COUNT(a.camp_id ) AS n  FROM cust_campaign_details AS a , cust_advertiser_info as b WHERE (a.camp_adv_id = b.adv_id) AND 
								(a.company !='' AND a.company_url !='' AND a.camp_title !='' AND a.company_desc !='' AND a.camp_objective !='' AND a.camp_category !='' AND a.camp_no_cars !='' 
								AND a.camp_start_date !='' AND a.camp_duration !='' AND a.camp_end_date !='' AND a.camp_amount !='' AND a.camp_city !='' AND a.camp_from !='' AND a.camp_logo !='' AND
								a.camp_art !='' AND a.camp_vinyl_pattern !='' AND a.camp_veh_type !='')";	
						
							$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						
						
								while($row=mysqli_fetch_array($query))
								{
									
								$camp_id1=$row['n'];
								}
									
					?>
					<span class="trpad">  Total Number of Completed Campaign Builder</span><br><span class="subrpad"><?php echo $camp_id1;?></span>   
                    </div>
                </div>

						<div class="col-md-6 col-lg-3">
				<div class="panel panel-default clearfix dashboard-stats rounded rpad">
                	<?php 
						$myDate = date('Y/m/d');	
									$no=0;
									
								$sql="SELECT COUNT(a.camp_id ) AS e  FROM cust_campaign_details AS a , cust_advertiser_info as b WHERE (a.camp_adv_id = b.adv_id) AND 
								(a.company='' OR a.company_url='' OR a.camp_title='' OR a.company_desc='' OR a.camp_objective='' OR a.camp_category='' OR a.camp_no_cars='' 
								OR a.camp_start_date='' OR a.camp_duration='' OR a.camp_end_date='' OR a.camp_amount='' OR a.camp_city='' OR a.camp_from='' OR a.camp_logo='' OR
								a.camp_art='' OR a.camp_vinyl_pattern='' OR a.camp_veh_type='')";		
						
						
							
							$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						
						
								while($row=mysqli_fetch_array($query))
								{
									
										
											
								$camp_id=$row['e'];
			
								}
							
									
					?>
					<span class="trpad">  Total Number of Incompleted Campaign Builder <br><span class="subrpad"> <?php echo $camp_id;?></span>   
                    </div>
                </div>


					  </div>
                    </div>
                </div>			  
            
            </div>   
			
			<div class="row">           	
                
                <div class="col-md-12">                
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" style="font-family: Roboto;">Drivers:</div>
                        <div class="panel-body table-responsive">
						
						
                        
                     
					<div class="col-md-6 col-lg-3">
                	<div class="panel panel-default clearfix dashboard-stats rounded rpad">                    	
                      <?php 
									//$sql="SELECT COUNT(driv_name) as a FROM cust_drivers";
							
								$sql="SELECT COUNT(driv_id) as a FROM cust_drivers";
								
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$row_new=mysqli_fetch_array($query);
								?>
                      <span class="trpad">  Total Number of Driver Sign-up</span><br><span class="subrpad"><?php echo $row_new['a'];?></span> 
		
                    </div>
                </div>
                        
                      <div class="col-md-6 col-lg-3">
                	<div class="panel panel-default clearfix dashboard-stats rounded rpad">                    	
                      <?php 
									$sql="SELECT   COUNT(driv_id) as a FROM cust_drivers  WHERE  driv_camp_category = '' or driv_camp_duration ='' or driv_vinyl_type =''";
								
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$row_new=mysqli_fetch_array($query);
								?>
                      <span class="trpad">  Incomplete Driver Sign-up </span><br><span class="subrpad"><?php echo $row_new['a'];?></span> 
		
                    </div>
                </div>
				<div class="col-md-6 col-lg-3">
                	<div class="panel panel-default clearfix dashboard-stats rounded rpad">                    	
                      <?php 
									//$sql="SELECT COUNT(driv_name) as a FROM cust_drivers";
							
								
								$sql="SELECT   COUNT(driv_id) as a FROM cust_drivers  WHERE  driv_camp_category != '' AND driv_camp_duration !='' AND driv_vinyl_type !=''";
								
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$row_new=mysqli_fetch_array($query);
								?>
                      <span class="trpad">  Completed  Driver Sign-up</span><br><span class="subrpad"><?php echo $row_new['a'];?></span> 
		
                    </div>
                </div>
				<div class="col-md-6 col-lg-3" style="min-height: 90px;">
				<div class="panel panel-default clearfix dashboard-stats rounded rpad">
                	<?php 
									$myDate = date('Y/m/d');		
						$sql="SELECT COUNT(driv_car_type) as g FROM  cust_drivers where   driv_car_type='commercial' ";
							
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$row_new=mysqli_fetch_array($query);
										
									
									
									
					?>
                      <span class="trpad">  Total Number of Commercial  Cars </span><br><span class="subrpad"> <?php echo $row_new['g'];?></span>      
                    </div>
                </div>
				
				<div class="col-md-6 col-lg-3">
				<div class="panel panel-default clearfix dashboard-stats rounded rpad">
                	<?php 
									$myDate = date('Y/m/d');		
				$sql="SELECT COUNT(d.driv_id)as m FROM cust_campaign_details as b, cust_vinyler_dashboard as c , cust_drivers as d  where 
								b.camp_id=d.driv_camp_id AND b.camp_status='0' 
								AND b.camp_active_status='1' AND c.active_or_inactive='2' AND c.vd_camp_id=b.camp_id ";
							
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$row_new=mysqli_fetch_array($query);
										
									
									
									
					?>
                      <span class="trpad">  Total Number of Driver Active Campaign </span><br><span class="subrpad"><?php echo $row_new['m'];?></span>      
                    </div>
                </div>
				<div class="col-md-6 col-lg-3">
				<div class="panel panel-default clearfix dashboard-stats rounded rpad">
                	<?php 
									$myDate = date('Y/m/d');		
						$sql="SELECT a.driv_name,a.driv_email,a.driv_contact,b.camp_start_date,b.camp_end_date,b.camp_title, 
						COUNT(a.driv_id) AS m FROM cust_drivers as a, cust_campaign_details as b WHERE a.driv_camp_id=b.camp_id 
						AND b.camp_status='1' AND camp_active_status='0'";
							
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$row_new=mysqli_fetch_array($query);
										
									
									
									
					?>
                      <span class="trpad">  Total Number of Driver Inactive Campaign</span><br><span class="subrpad"> <?php echo $row_new['m'];?></span>      
                    </div>
                </div>
			
			
				<div class="col-md-6 col-lg-3">
				<div class="panel panel-default clearfix dashboard-stats rounded rpad">
                	<?php 
									$myDate = date('Y-m-d');		
						
						
						$sql="SELECT SUM(b.camp_no_cars) as kk
								FROM cust_advertiser_info as a,cust_campaign_details as b, cust_vinyler_dashboard as c 
								where a.adv_id=b.camp_adv_id AND b.camp_id=c.vd_camp_id AND b.camp_status='0' 
								AND b.camp_active_status='1' AND b.camp_end_date <= '$myDate'
								AND c.active_or_inactive='2' 
								
								union
								SELECT SUM(b.camp_no_cars) as kk
								FROM cust_advertiser_info as a,cust_campaign_details as b, cust_vinyler_dashboard as c 
								where a.adv_id=b.camp_adv_id AND b.camp_id=c.vd_camp_id AND b.camp_status='1' 
								AND b.camp_active_status='1' AND b.camp_end_date <= '$myDate'
								AND c.active_or_inactive='4' ";
							
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$camp1 = 0;
								while($row=mysqli_fetch_array($query))
								{
									$camp1=$row['kk']+$camp1;
									
								}
									
									
									
					?>
                      <span class="trpad"> Total Number of Drivers  Completed Campaigns</span><br><span class="subrpad"><?php echo $camp1;?></span>      
                    </div>
                </div>
			
				
				
				
				
				

<div class="col-md-6 col-lg-3" style="min-height: 90px;">
				<div class="panel panel-default clearfix dashboard-stats rounded rpad">
                	<?php 
									$myDate = date('Y/m/d');		
						$sql="SELECT COUNT(driv_car_type) as g FROM  cust_drivers where   driv_car_type='private' ";
							
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$row_new=mysqli_fetch_array($query);
										
									
									
									
					?>
                      <span class="trpad">  Total Number of Private  Cars </span><br><span class="subrpad"> <?php echo $row_new['g'];?></span>      
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3" style="min-height: 90px;">
						<div class="panel panel-default clearfix dashboard-stats rounded rpad">   
								<?php 
										$sql="SELECT SUM(driv_camp_dist) as a FROM cust_driver_camp_details";
								
									$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
									//$num=mysql_num_rows($query);
									
										$row_new=mysqli_fetch_array($query);
                                                                                  $number=$row_new['a'];

										$formatted_number = number_format($number, 2, '.', '');
									?>
						  <span class="trpad">  Total KM Drivens </span><br><span class="subrpad"> <?php echo $formatted_number ;?>       </span> 
								  
						</div>
					</div>

					  </div>
                    </div>
                </div>			  
            
            </div>

			
			
			<div class="row">           	
                
                <div class="col-md-12">                
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" style="font-family: Roboto;">Wrap2Earn:</div>
                        <div class="panel-body table-responsive">
						
						
                        
                     <div class="col-md-6 col-lg-3">
						<div class="panel panel-default clearfix dashboard-stats rounded rpad">                    	
						  <?php 
										$sql="SELECT SUM(driv_impression) as a FROM cust_driver_camp_details";
								
									$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
									//$num=mysql_num_rows($query);
									
										$row_new=mysqli_fetch_array($query);
                                                                                $driv_imp=$row_new['a'];

										$driver_impression= number_format($driv_imp, 2, '.', '');

										
									?>
				<span class="trpad">  Total  Impression Gained</span><br><span class="subrpad"> <?php echo $driver_impression;?>       </span>   
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="panel panel-default clearfix dashboard-stats rounded rpad">                    	
						  <?php 
										$sql="SELECT SUM(`camp_amount`) as g FROM cust_campaign_details";
								
									$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
									//$num=mysql_num_rows($query);
									
										$row_new=mysqli_fetch_array($query);
										$total=$row_new['g'];
										if($total=='')
										{
										
									?>
						  <span class="trpad">  Total Wrap2Earn Earnings</span><br><span class="subrpad">  0 </span> 
						  <?php
						  }
						  else
						  {
						  ?>  
						   <span class="trpad">  Total Wrap2Earn Earnings</span><br><span class="subrpad">  <?php echo $row_new['g'];?>       </span>
						   <?php
						   }
						   ?>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="panel panel-default clearfix dashboard-stats rounded rpad">                    	
						  <?php 
										$sql="SELECT SUM(amount) as h FROM cust_camp_payment_details ";
								
									$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
									//$num=mysql_num_rows($query);
									
										$row_new=mysqli_fetch_array($query);
										$realized_amount=$row_new['h'];
										if($realized_amount=='')
										{
									?>
									
						<span class="trpad">  Total Realized Earnings </span><br><span class="subrpad">  0 </span>  
						<?php
						}
						else
						{
						?>
					 <span class="trpad">  Total Realized Earnings</span><br><span class="subrpad"> <?php echo $row_new['h'];?>       </span>  
					 <?php
						}
					?> 
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="panel panel-default clearfix dashboard-stats rounded rpad">                    	
						  <?php 
										$unrealied_amount=$total - $realized_amount;
										
									?>
						  <span class="trpad"> Total Unrealized Earnings </span><br><span class="subrpad">  <?php echo $unrealied_amount; ?>       </span>   
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="panel panel-default clearfix dashboard-stats rounded rpad">                    	
						  <?php 
										$sql="SELECT SUM(`driv_camp_earn`) as g FROM cust_driver_camp_details  ";
								
									$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
									//$num=mysql_num_rows($query);
									
										$row_new=mysqli_fetch_array($query);
                                                                            $earn=$row_new['g'];

										$driver_earn= number_format($earn, 2, '.', '');
                                                        
                                                                                
										
									?>
						  <span class="trpad"> Total Driver Earnings </span><br><span class="subrpad">  <?php echo $driver_earn;?>       </span>   
						</div>
					</div>	
                        
                      


					  </div>
                    </div>
                </div>			  
            
            </div>
		

			
        </div>
            
        </div>
        <!-- Warper Ends Here (working area) -->
        
        
         <footer class="container-fluid footer">
        		@Wrap2Earn 2016 | All rights are reserved.<!--<a href="http://boredbees.com/" target="_blank">Design by  Boredbees Tech Solutions</a>-->
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer>
        
    
    </section>
    <!-- Content Block Ends Here (right box)-->
    
    
    <!-- JQuery v1.9.1 -->
	<script src="assets/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins/underscore/underscore-min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    
    <!-- Globalize -->
    <script src="assets/js/globalize/globalize.min.js"></script>
    
    <!-- NanoScroll -->
    <script src="assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    
    <!-- Chart JS -->
    <script src="assets/js/plugins/DevExpressChartJS/dx.chartjs.js"></script>
    <script src="assets/js/plugins/DevExpressChartJS/world.js"></script>
   	<!-- For Demo Charts -->
    <script src="assets/js/plugins/DevExpressChartJS/demo-charts.js"></script>
    <script src="assets/js/plugins/DevExpressChartJS/demo-vectorMap.js"></script>
    
    <!-- Sparkline JS -->
    <script src="assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- For Demo Sparkline -->
    <script src="assets/js/plugins/sparkline/jquery.sparkline.demo.js"></script>
    
    <!-- Angular JS -->
    <script src="../../../ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.14/angular.min.js"></script>
    <!-- ToDo List Plugin -->
    <script src="assets/js/angular/todo.js"></script>
    
    
    
    <!-- Calendar JS -->
    <script src="assets/js/plugins/calendar/calendar.js"></script>
    <!-- Calendar Conf -->
    <script src="assets/js/plugins/calendar/calendar-conf.js"></script>
	
    
    
    <!-- Custom JQuery -->
	<script src="assets/js/app/custom.js" type="text/javascript"></script>
    

    
	<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
    
    ga('create', 'UA-56821827-1', 'auto');
    ga('send', 'pageview');
    
    </script>
</body>


</html>
