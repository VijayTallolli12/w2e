<?php 
include('include/db_config.php');
?>
<?php
include("loginstatus.php");
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from freakpixels.com/portfolio/brio/forms-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Dec 2015 05:16:25 GMT -->
<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Wrap2Earn</title>

	<meta name="description" content="">
	<link rel="icon" type="image/png" href="assets/images/avtar/logoss.png" >

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css" /> 
    
    <!-- DateTime Picker  -->
    <link rel="stylesheet" href="assets/css/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css" />
    
    <!-- Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap Validator  -->
    <link rel="stylesheet" href="assets/css/bootstrap-validator/bootstrap-validator.html" />
    
    <!-- Base Styling  -->
    <link rel="stylesheet" href="assets/css/app/app.v1.css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

	<!-- Preloader -->
    
    <!-- Preloader -->		
    
	<aside class="left-panel">
	
     <?php include ("header.php") ?>
	 
    </aside>
	
    
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
        	
           
            
            
            <div class="row">
                <div class="col-md-12">
				<div class="col-md-1"></div>
				<div class="col-md-10">
                	<div class="panel panel-default">
                        <div class="panel-heading">Private Driver</div>
                        <div class="panel-body">
                        
                        	<form   method="post" action="private_driver_download.php">
                            
                                <div class="form-group has-feedback">
                                <label class="col-sm-1 control-label">From Date</label>
                                <div class="col-sm-5">
                                  <div class="input-group date" id="datepicker">
                                        <input type="text" class="form-control" name="from" id="from" data-date-format="MM/DD/YYYY" data-bv-field="monthDayYear">
                                        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span>
                                        </span>
                                    </div><i class="form-control-feedback bv-icon-input-group" data-bv-icon-for="monthDayYear" style="display: none;"></i>
                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="monthDayYear" data-bv-result="NOT_VALIDATED" style="display: none;">The date is required and cannot be empty</small><small class="help-block" data-bv-validator="date" data-bv-for="monthDayYear" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a valid date</small></div>
								<label class="col-sm-1 control-label">To Date </label>
                                <div class="col-sm-5">
                                  <div class="input-group date" id="datepicker1">
                                        <input type="text" class="form-control" name="to" id="to" data-date-format="MM/DD/YYYY" data-bv-field="monthDayYear">
                                        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span>
                                        </span>
                                    </div><i class="form-control-feedback bv-icon-input-group" data-bv-icon-for="monthDayYear" style="display: none;"></i>
                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="monthDayYear" data-bv-result="NOT_VALIDATED" style="display: none;">The date is required and cannot be empty</small><small class="help-block" data-bv-validator="date" data-bv-for="monthDayYear" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a valid date</small></div>
                                <br>
								<br>
                                </div>
								<div class="col-md-12">
								
									<div class="col-md-5"></div>
									<input type="button" name="button"  class="btn btn-purple btn-md" value ="Display" onclick ="display();">
									<input type="submit" name="submit" class="btn btn-purple btn-md" value = "Download" >
								</div>
							
                        	</form>
                        </div>
                    </div>
					
                </div>
				<div class="col-md-1"></div>
            </div>
            </div>
            <div id="disp">
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
    
    <!-- moment -->
    <script src="assets/js/moment/moment.js"></script>
    
    <!-- DateTime Picker -->
    <script src="assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
    
	<!-- Bootstrap Validator -->
    <script src="assets/js/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
    <script src="assets/js/plugins/bootstrap-validator/bootstrapValidator-conf.js"></script>
    
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

<!-- Mirrored from freakpixels.com/portfolio/brio/forms-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Dec 2015 05:16:28 GMT -->
</html>
<script>
function display()
{
	
	 var g = document.getElementById("from").value;
	
	 var h = document.getElementById("to").value;
	 
	 
	 if(g != "" && h != "")
	 {
		 var url="private_driver_date.php?da="+g+"&te="+h;
				
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

<script type="text/javascript">
  $(function() {
    $('#datepicker').datetimepicker({
    });
  });
  
  $(function() {
    $('#datepicker1').datetimepicker({
    });
  });
</script>
