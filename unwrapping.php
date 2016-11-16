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
                        <div class="panel-heading">Unwrap Completed Campaign</div>
                        <div class="panel-body table-responsive">
                       
						
                        	<table class="table table-bordered">
                                 <thead>
                                  <tr>
                                    <th>Si No</th>
                                    <th>Advertiser  Name</th>
                                    <th>Advertiser Email</th>
                                    <th>Advertiser Contact No</th>
									<th>Campaign name</td>
									<th>Duration</td>
									<th>Campaign End date</th>
									<!--<th>Impressions gained</th>-->
									<th>Unwrap</th>
									
									
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
									
									$myDate = date('Y-m-d');
								
								
								$sql="SELECT *
								FROM cust_advertiser_info as a,cust_campaign_details as b, cust_vinyler_dashboard as c 
								where a.adv_id=b.camp_adv_id AND b.camp_id=c.vd_camp_id AND b.camp_status='0' 
								AND b.camp_active_status='1' AND b.camp_end_date <= '$myDate'
								AND c.active_or_inactive='3'  limit $start,$limit ";
						
								$no=$start;
							
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								while($row=mysqli_fetch_array($query))
								{
									
										$no++;
									
					?>
                                <tbody>
                                  <tr>
								    <input type="hidden" id="vd_camp_id" value="<?php  echo $row['vd_camp_id'];?>">
                                    <td><?php  echo $no;?></td>
                                    <td><?php echo $row['adv_name'];?></td>
                                    <td><?php echo $row['adv_email'];?></td>
                                    <td><?php echo $row['adv_contact'];?></td>
                                    <td><?php echo $row['camp_title'];?></td>
									<td><?php echo $row['camp_duration'];?></td>
									<td><?php echo $row['camp_end_date'];?></td>
									<!--<td><?php echo $row['driv_impression'];?></td>-->
									
					<td><input type="button"  id="active" value="Unwrap"   class="btn btn-success" onclick="unwrap();"></td>
																												
                                   
									
                                  </tr>
                                  
                                </tbody>
								<?php
									
								}
								?>
                            </table>
							
								  <ul class="pagination pagination-lg">
								<?php
								$rows=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT *
								FROM cust_advertiser_info as a,cust_campaign_details as b, cust_vinyler_dashboard as c 
								where a.adv_id=b.camp_adv_id AND b.camp_id=c.vd_camp_id AND b.camp_status='0' 
								AND b.camp_active_status='1' AND b.camp_end_date <= '$myDate'
								AND c.active_or_inactive='3' "));
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
            
           <a href="unwrapping_download.php" class="btn btn-purple btn-md">Download</a>
            
        </div>
		<div id="disp">
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
	<script>
	function unwrap()
	{	
	 
			var vd_camp_id = document.getElementById("vd_camp_id").value;
			
	var url="update_unwrap.php?vd_camp_id="+vd_camp_id;
	 //alert(url);
 
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
	   }
	 }
	  
	  xmlhttp.open("GET",url,true);
	  xmlhttp.send();	  
	}
	</script>
</body>


</html>
