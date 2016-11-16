<?php
include ('include/db_config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="assets/images/avtar/logoss.png" >
	<title>Subscribers Report</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="">
	
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css"
        type="text/css" media="all" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"
        type="text/javascript"></script>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
		<script src="js/jquery.blockUI.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#from').datepicker({
				dateFormat: 'dd-mm-yy',
			});
        });
		  $(function () {
            $('#to').datepicker({
				dateFormat: 'dd-mm-yy',
			});
        });
    </script>
	
	
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css" /> 

	<!-- Calendar Styling  -->
    <link rel="stylesheet" href="assets/css/plugins/calendar/calendar.css" />
    
    <!-- Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
    
    <!-- Base Styling  -->
    <link rel="stylesheet" href="assets/css/app/app.v1.css" />

	

</head>

<body data-ng-app>
   
    	<!-- Preloader -->
    
    <!-- Preloader -->	
    
	<aside class="left-panel">
    		
            <div class="user text-center">
                  <img src="assets/images/logoss.png" class="img-circle" alt="...">
                  <h4 class="user-name">Wrap2Earn</h4>
                  
                  <div class="dropdown user-login">
                  <button class="btn btn-xs dropdown-toggle btn-rounded" type="button" data-toggle="dropdown" aria-expanded="true">
                    <i class="fa fa-circle status-icon available"></i> Available <i class="fa fa-angle-down"></i>
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" href="#"><i class="fa fa-circle status-icon busy"></i> Busy</a></li>
                    <li role="presentation"><a role="menuitem" href="#"><i class="fa fa-circle status-icon invisibled"></i> Invisible</a></li>
                    <li role="presentation"><a role="menuitem" href="#"><i class="fa fa-circle status-icon signout"></i> Sign out</a></li>
                  </ul>
                  </div>	 
            </div>
            
            
            
            <nav class="navigation">
            	<ul class="list-unstyled">
                	<li><a href="index.php"><i class="fa fa-bookmark-o"></i><span class="nav-label">Dashboard</span></a></li>                  
                    <li class="has-submenu"><a href="#"><i class="fa fa-flag-o"></i> <span class="nav-label">Wrap2Earn Info</span></a>
                    	<ul class="list-unstyled">
                        	<li><a href="subscribers.php">Number of Subscribers</a></li>
                            <li><a href="buttons.html">Number of Drivers</a></li>
                            <li><a href="advertisers.php">Number of Advertisers</a></li>
                            <li><a href="adv_vth_campain.php">Advertisers With Campians</a></li>
                            <li><a href="adv_vth_lie_campain.php">Advertisers With lie Campians</a></li>
                            <li><a href="adv_vth_cmp_campain.php">Advertisers With Completed Campians</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </nav>
            
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
            <ul class="nav-toolbar">             
            </ul>
        </header>
        <!-- Header Ends -->
        
	   <div class="container" style="min-height:550px;">
    	<div class="row">
    	<div class="col-lg-4 col-lg-offset-4">
        	<h3 class="text-center">Advertisers Reports<!-- Report One --></h3>
            <hr class="clean">
        	<form role="form" method="post" action="adv_download.php">              
              <div class="form-group input-group">
              	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				<input type="text" name="from" id="from" class="form-control"  placeholder="From Date" required >
              </div>
              <div class="form-group input-group">
              	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				<input type="text" name="to" id="to" class="form-control"  placeholder="To Date" required >
              </div>
		<input type="button" name="button"  class="btn btn-purple btn-md" value ="Display" onclick ="display();">
        	 <input type="submit" name="submit" class="btn btn-purple btn-md" value = "Download" >			
            </form>
            <hr>			
        </div>
        </div>	
		<div id="disp">
		</div>
            
	</div>
               
        <!-- Warper Ends Here (working area) -->
        
      </section>
    <!-- Content Block Ends Here (right box)-->
    
    
    <!-- JQuery v1.9.1 -->
	<!--<script src="assets/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>-->
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

<script>
function display()
{
	
	 var g = document.getElementById("from").value;
	
	 var h = document.getElementById("to").value;
	 
	 
	 if(g != "" && h != "")
	 {
		 var url="adv.php?da="+g+"&te="+h;
				 
		 var xmlhttp;
		 if (window.XMLHttpRequest)
		 { // code for IE7+, Firefox, Chrome, Opera, Safari
		   xmlhttp=new XMLHttpRequest();
		 }
		 else
		 { // code for IE6, IE5
		   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		 }
		 xmlhttp.onreadystatechange=function()
		 {
		   if (xmlhttp.readyState==4 && xmlhttp.status==200)
		   {	
			 //alert(xmlhttp.responseText);	   
			 document.getElementById("disp").innerHTML=xmlhttp.responseText;
			 $.unblockUI();
		   }
		 }
		  
		  xmlhttp.open("GET",url,true);
		  xmlhttp.send();
	 }
	 else
	 {
		 alert("Please select all fields");
	 }
}
</script>
