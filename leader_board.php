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
            
            
                          
            
            
            
            
			
			
			
			<div class="warper container-fluid">
        	
                     
            
            <hr class="no-margn">
            
            <div class="row">           	
                
                <div class="col-md-12">                
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" style="font-family: Roboto;">Top 5 of the day :</div>
                        <div class="panel-body table-responsive">
                        
                        	<table class="table table-bordered">
                                <thead>
                                  <tr style="font-family: Roboto;">
                                    <th>Sl NO</th>
                                    <th>Driver Name</th>
                                    <th>Campaign Name</th>
                                    <th>Contact No</th>
                                    <th>Impression</th>
									<th>Miles</th>
									<th>Car Make</th>
									<th>Car Model</th>
									<th>Registered Date</th>
                                  </tr>
                                </thead>
                                <tbody>
								<?php 
								
								$query = "Select a.driv_name,a.driv_contact,a.driv_reg_date,b.camp_title,c.car_make,c.car_model,d.driv_impression,d.driv_camp_dist
									      FROM cust_drivers as a,cust_campaign_details as b, cust_car_details as c,cust_driver_camp_details as d
										  Where a.driv_id=d.driv_id and b.camp_id=d.driv_camp_id  and date(d.driv_camp_date) = CURDATE() and a.driv_car_make = c.car_make and a.driv_car_model = c.car_model
										  order by driv_impression desc limit 5";
								$result = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
										$sl=0;
								while($row=mysqli_fetch_array($result)) {								
								
								$sl++;							
									?>
                                  <tr style="font-family: Roboto;">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $row['driv_name'];?></td>
                                    <td><?php echo $row['camp_title'];?></td>
                                    <td><?php echo $row['driv_contact'];?></td>
                                    <td><?php echo $row['driv_impression'];?></td>
									<td><?php echo $row['driv_camp_dist'];?></td>
                                    <td><?php echo $row['car_make'];?></td>
                                    <td><?php echo $row['car_model'];?></td>
                                    <td><?php echo $row['driv_reg_date'];?></td>
                                  </tr>
									<?php } ?>
                                </tbody>
                              </table>
                        
                        </div>
                    </div>
                </div>			  
            
            </div>   

		 <div class="row">           	
                
                <div class="col-md-12">                
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" style="font-family: Roboto;">Top 5 of the Week :</div>
                        <div class="panel-body table-responsive">
                        
                        	<table class="table table-bordered">
                                <thead>
                                  <tr style="font-family: Roboto;">
                                    <th>Sl NO</th>
                                    <th>Driver Name</th>
                                    <th>Campaign Name</th>
                                    <th>Contact No</th>
                                    <th>Impression</th>
									<th>Miles</th>
									<th>Car Make</th>
									<th>Car Model</th>
									<th>Registered Date</th>
                                  </tr>
                                </thead>
                                <tbody>
								<?php 
								
								$query = "SELECT d.id, a.driv_name,a.driv_contact,a.driv_reg_date,b.camp_title,c.car_make,c.car_model,d.driv_impression,d.driv_camp_dist,b.camp_start_date,b.camp_end_date,date(d.driv_camp_date) FROM cust_drivers as a,cust_campaign_details as b, cust_car_details as c,cust_driver_camp_details as d
										  Where a.driv_id=d.driv_id and b.camp_id=d.driv_camp_id  and YEARWEEK(`driv_camp_date`, 1) = YEARWEEK(CURDATE(), 1) and a.driv_car_make = c.car_make and a.driv_car_model = c.car_model
										  order by driv_impression desc limit 5";
								$result = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
										$sl=0;
								while($row=mysqli_fetch_array($result)) {								
								
								$sl++;
							/*	$sql="Select a.driv_name,a.driv_contact,a.driv_camp_date,a.driv_reg_date,b.camp_title,c.car_make,c.car_model,d.driv_impression,d.driv_camp_dist,b.camp_start_date,b.camp_end_date,date(d.driv_camp_date) 
									  FROM cust_drivers as a,cust_campaign_details as b, cust_car_details as c,cust_driver_camp_details as d
									  Where a.driv_id=d.driv_id and b.camp_id=d.driv_camp_id  and date(d.driv_camp_date) = CURDATE() and a.driv_car_make = c.car_make and a.driv_car_model = c.car_model
									  order by driv_impression desc limit 5";
								$result=mysql_query($sql);								
								while($row=mysql_fetch_array($result))
								{*/
									?>
                                  <tr style="font-family: Roboto;">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $row['driv_name'];?></td>
                                    <td><?php echo $row['camp_title'];?></td>
                                    <td><?php echo $row['driv_contact'];?></td>
                                    <td><?php echo $row['driv_impression'];?></td>
									<td><?php echo $row['driv_camp_dist'];?></td>
                                    <td><?php echo $row['car_make'];?></td>
                                    <td><?php echo $row['car_model'];?></td>
                                    <td><?php echo $row['driv_reg_date'];?></td>
                                  </tr>
									<?php } ?>
                                </tbody>
                              </table>
                        
                        </div>
                    </div>
                </div>			  
            
            </div> 

			 <div class="row">           	
                
                <div class="col-md-12">                
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" style="font-family: Roboto;">Top 5 of the Month :</div>
                        <div class="panel-body table-responsive">
                        
                        	<table class="table table-bordered">
                                <thead>
                                  <tr style="font-family: Roboto;">
                                    <th>Sl NO</th>
                                    <th>Driver Name</th>
                                    <th>Campaign Name</th>
                                    <th>Contact No</th>
                                    <th>Impression</th>
									<th>Miles</th>
									<th>Car Make</th>
									<th>Car Model</th>
									<th>Registered Date</th>
                                  </tr>
                                </thead>
                                <tbody>
								<?php 
								
								$query = "SELECT d.id, a.driv_name,a.driv_contact,a.driv_reg_date,b.camp_title,c.car_make,c.car_model,d.driv_impression,d.driv_camp_dist,b.camp_start_date,b.camp_end_date,date(d.driv_camp_date) FROM cust_drivers as a,cust_campaign_details as b, cust_car_details as c,cust_driver_camp_details as d
										  Where a.driv_id=d.driv_id and b.camp_id=d.driv_camp_id  and date(driv_camp_date) between  DATE_FORMAT(CURDATE() ,'%Y-%m-01') AND CURDATE() and a.driv_car_make = c.car_make and a.driv_car_model = c.car_model
										  order by driv_impression desc limit 5";
								$result = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
										$sl=0;
								while($row=mysqli_fetch_array($result)) {								
								
								$sl++;
							/*	$sql="Select a.driv_name,a.driv_contact,a.driv_camp_date,a.driv_reg_date,b.camp_title,c.car_make,c.car_model,d.driv_impression,d.driv_camp_dist,b.camp_start_date,b.camp_end_date,date(d.driv_camp_date) 
									  FROM cust_drivers as a,cust_campaign_details as b, cust_car_details as c,cust_driver_camp_details as d
									  Where a.driv_id=d.driv_id and b.camp_id=d.driv_camp_id  and date(d.driv_camp_date) = CURDATE() and a.driv_car_make = c.car_make and a.driv_car_model = c.car_model
									  order by driv_impression desc limit 5";
								$result=mysql_query($sql);								
								while($row=mysql_fetch_array($result))
								{*/
									?>
                                  <tr style="font-family: Roboto;">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $row['driv_name'];?></td>
                                    <td><?php echo $row['camp_title'];?></td>
                                    <td><?php echo $row['driv_contact'];?></td>
                                    <td><?php echo $row['driv_impression'];?></td>
									<td><?php echo $row['driv_camp_dist'];?></td>
                                    <td><?php echo $row['car_make'];?></td>
                                    <td><?php echo $row['car_model'];?></td>
                                    <td><?php echo $row['driv_reg_date'];?></td>
                                  </tr>
									<?php } ?>
                                </tbody>
                              </table>
                        
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
