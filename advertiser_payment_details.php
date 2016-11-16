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

	<meta name="description" content>
	

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
    <!--[if lt IE 9])>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif])-->

<script type="text/javascript">
  (function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);
   
   </script>

<style type="text/css">
#content
{
	width: 900px;
	margin: 0 auto;
	font-family:Arial, Helvetica, sans-serif;
}
.page
{
float: right;
margin: 0;
padding: 0;
}
.page li
{
	list-style: none;
	display:inline-block;
}
.page li a, .current
{
display: block;
padding: 5px;
text-decoration: none;
color: #8A8A8A;
}
.current
{
	font-weight:bold;
	color: #000;
}
.button
{
padding: 5px 15px;
text-decoration: none;
background: #03A9F4;
color: #F3F3F3;
font-size: 13PX;
border-radius: 2PX;
margin: 0 4PX;
display: block;
float: left;
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
        	
         
            
            
           
             
            
             <div class="col-md-12">
                	
                    
                    <div class="panel panel-default">
                        <div class="panel-heading"> Advertiser Payment Details </div>
                        <div class="panel-body table-responsive">
                       
						
                        	<br>
<div align="center"><b><style color="black" font-size="25px">Search:</style>
	</b><input type="search" class="light-table-filter" data-table="order-table" placeholder="Type to search" style="margin-left: 81%;">
</div>
<br><table class="table table-bordered order-table table">
                                <thead>
                                  <tr>

									<th>Advertiser Name</th>
                                    <th> Email</th>
                                    <th>Contact No</th>
									<th>Company</th>
									<th>Campaign Name</th>
									<th>Total Campaign Amount</th>
									<th>Campaign Paid Amount</th>
									<th>Expenditure</th>
									<th>Impression Gained</th>
									
									
									
									
									
                                  </tr>
                                </thead>
								
								 <?php 
								 
									$start=0;
									$limit=50;

									if(isset($_GET['id']))
									{
										$id=$_GET['id'];
										$start=($id-1)*$limit;
									}
									else
									{
										$id = 1;
									}
								
									$myDate = date('Y/m/d');	
									
									
								/*$sql="SELECT a.adv_name,a.adv_email,a.adv_contact,b.company,b.camp_title,b.camp_amount, SUM(d.driv_camp_earn) as driv_earn FROM 
								cust_advertiser_info as a inner join cust_campaign_details as b on b.camp_adv_id = a.adv_id inner join 
								cust_camp_payment_details as c on c.camp_id = b.camp_id left join cust_driver_camp_details as d  on d.driv_camp_id = b.camp_id limit $start,$limit";	*/
								
								$sql="SELECT SUM(d.driv_impression) as driv_impression,SUM(d.driv_camp_earn) as earn,a.adv_name,a.adv_email,a.adv_contact,b.company,b.camp_title,b.camp_amount,(select SUM(c.amount)  from  
								cust_camp_payment_details c where c.camp_id = b.camp_id AND c.adv_id = a.adv_id ) as amt  from  
								cust_advertiser_info a inner join cust_campaign_details b on a.adv_id = b.camp_adv_id  
inner join cust_driver_camp_details  d on b.camp_id = d.driv_camp_id AND d.adv_id = a.adv_id group by d.driv_camp_id,d.adv_id limit $start,$limit";
 
						
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									$no++;	
 									
									$earn=$row['earn'];
                                                                   $earn1= number_format($earn, 2, '.', '');
                                                                   
                                                                   $driv_impression=$row['driv_impression'];
                                                                   $driv_impression1= number_format($driv_impression, 2, '.', '');
									?>
                                <tbody>
                                  <tr>
								  
                                    <td><?php echo $row['adv_name'];?></td>
                                    <td><?php echo $row['adv_email'];?></td>
                                    <td><?php echo $row['adv_contact'];?></td>
              						<td><?php echo $row['company'];?></td>
									<td><?php echo $row['camp_title'];?></td>
									<td><?php echo $row['camp_amount'];?></td>
									<td><?php echo $row['amt'];?></td>
									<td><?php echo  $earn1; ?></td>
									<td><?php echo  $driv_impression1; ?></td>
									
                                  </tr>
                                  
                                </tbody>
								<?php
									
								}
								?>
									
		
                              </table>
									<ul class="pagination pagination-lg">
								<?php
								$rows=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT a.adv_name,a.adv_email,a.adv_contact,b.company,b.camp_title,b.camp_amount,c.amount, 
																SUM(d.driv_camp_earn) as driv_earn FROM 
																	cust_advertiser_info as a inner join cust_campaign_details as b on b.camp_adv_id = a.adv_id inner join 
													cust_camp_payment_details as c on c.camp_id = b.camp_id left join cust_driver_camp_details as d  on d.driv_camp_id = b.camp_id"));
								$total=ceil($rows/$limit);

								if($id>1)
								{
									?>

								<a href='?id=<?php echo ($id-1)?>' class='button'>PREVIOUS</a>
								<?php
								}
								if($id!=$total)
								{
								?>

									<a href='?id=<?php echo($id+1)?>' class='button'>NEXT</a>
								<?php
								}
									for($i=1;$i<=$total;$i++)
										{
											if($i==$id) { 
								?>
											<!--<li class='current'><?php echo $i; ?></li> -->
											<?php
											}
											
											else { 
											?>
											<li><a href='?id=<?php echo $i; ?>'><?php echo $i; ?></a></li>
											<?php
											}
										}
									
									?>
							</ul>
                        </div>
						
                    </div>
                </div>
            
           <a href="advertiser_payment_details_download.php" class="btn btn-purple btn-md">Download</a>
            
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
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject'])=r;i[r])=i[r])||function(){
    (i[r]).q=i[r]).q||[])).push(arguments)},i[r]).l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0]);a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
    
    ga('create', 'UA-56821827-1', 'auto');
    ga('send', 'pageview');
    
    </script>
</body>


</html>
