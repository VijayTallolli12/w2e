<?php 
include('include/db_config.php');
?>
<?php
include("loginstatus.php");
?>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Wrap2Earn</title>

	<meta name="description" content>
	<link rel="icon" type="image/png" href="assets/images/avtar/logoss.png" >

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



    .myclass {
        height: 40px;
        position: relative;
		    width: 50%;
        border: 4px solid #cdcdcd;
        border-color: rgba(0,0,0,.14);
        background-color: AliceBlue ;   ;
        font-size: 20px;
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
                        <div class="panel-heading">Click To Pay Campaign Amount </div>
                        <div class="panel-body table-responsive">
                       
						
    
<form action="paymnet_insert.php" method="post">

<table class="table table-bordered order-table table">
                              
								 <?php 
								 
									
									
									$myDate = date('Y/m/d');	
									
									$camp_id = $_GET['camp_id'];
									
								$sql="select SUM(c.amount) as paid_amount,a.adv_id,a.adv_name,a.adv_email,a.adv_contact,b.camp_id,b.company,b.camp_title,b.camp_objective,b.camp_amount
								from cust_advertiser_info as a inner join  cust_campaign_details as b on a.adv_id = b.camp_adv_id left join 
										cust_camp_payment_details as c on c.camp_id=b.camp_id where b.camp_id='$camp_id'";
										
									
					
						
	
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									
									$no++;	
 									
									
									?>
                                <tbody>
                               
								
								
									<input type="hidden" name="camp_id" value="<?php echo $row['camp_id'];?>" >
									<input type="hidden" name="adv_id" value="<?php echo $row['adv_id'];?>" >
									<tr>
									<th>Name</th>
                                   	<td><input type="text" name="name" readonly value="<?php echo $row['adv_name'];?>" class="myclass"></td>
									</tr>
									<tr>
									 <th>Email</th>
					                <td><input type="text" name="email" readonly value="<?php echo $row['adv_email'];?>" class="myclass"></td>
									</tr>
									<tr>
									 <th>Contact No</th>
					                <td><input type="text" name="contact" readonly value="<?php echo $row['adv_contact'];?>" class="myclass"></td>
									</tr>
									<tr>
									<th>Campaign Name</th>
									<td><input type="text" name="campaign" readonly value="<?php echo $row['camp_title'];?>" class="myclass"></td>
									</tr>
									<tr>
									<th>Company Name</th>
									<td><input type="text" name="company" readonly value="<?php echo $row['company'];?>" class="myclass"></td>
									</tr>
									<tr>
									<th>Product Information</th>
									<td><textarea name="product"  readonly class="myclass"><?php echo $row['camp_objective'];?></textarea></td>
									</tr>
									<tr>
									<th>Total Amount</th>
									<td><input type="text" name="t_amt" readonly value="<?php echo $row['camp_amount'];?>" class="myclass"></td>
									</tr>
									<tr>
									<th>Paid Amount</th>
									<td><input type="text" name="p_amt" readonly value="<?php echo $row['paid_amount'];?>" class="myclass"></td>
									</tr>
									<tr>
									<th>Paying Amount</th>
									<td><input type="number" name="paying_amount"  class="myclass" ></td>
									</tr>
								<?php
									}
								?>
                                  
                                </tbody>
								
									
		
                              </table>
							  <input type="submit" name="submit"   class="btn btn-purple btn-md">
</form>


							  
								
                        </div>
						
                    </div>
                </div>
            
         
            
        </div>
		
<?php
if(isset($_POST['submit']))
{
	$camp_id=$_POST['camp_id'];
	$adv_id=$_POST['adv_id'];
	$product=$_POST['product'];
	$paying_amount=$_POST['paying_amount'];
	
	$email=$_POST['email'];
	
	$id = rand(0,100000000);
	
	$myDate = date('YYYY/mm/dd');
	
	$sql1="insert into cust_camp_payment_details (camp_id,adv_id,product_info,amount,txnid,email,date) values 
	('$camp_id','$adv_id','$product','$paying_amount','$id','$email','$myDate')";
	
	$query1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	
}
?>
		
		
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
