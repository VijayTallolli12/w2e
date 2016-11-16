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
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">Pending Campaign Activation</div>
                        <div class="panel-body table-responsive">
                        
                        	<br>
<div align="center"><b><style color="black" font-size="25px">Search:</style>
	</b><input type="search" class="light-table-filter" data-table="order-table" placeholder="Type to search" style="margin-left: 81%;">
</div>
<br><table class="table table-bordered order-table table" id="disp">
                                <thead>
                                  <tr>
                                    <th>Sl NO</th>
									<th>Art Image</th>
                                    <th> Campaign Name</th>
                                    <th>Company</th>
                                    <th>Contact</th>
                                    <th>Email</th>
									<th>Requested No Of Cars</th>
									
									<th>Fullfilled Cars</th>
									<th>Status</th>
									
                                  </tr>
                                </thead>
                                <tbody>
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
									
								$query = "SELECT a.camp_id,d.vd_camp_id,a.camp_title,a.company,a.camp_no_cars,a.camp_art,b.adv_contact,b.adv_email,
								d.active_or_inactive,count(c.driv_camp_id) as v from cust_campaign_details as a,cust_advertiser_info as b , 
								cust_drivers as c,cust_vinyler_dashboard as d where a.camp_adv_id=b.adv_id AND d.vd_camp_id=a.camp_id AND a.camp_id=c.driv_camp_id 
								group by a.camp_id limit $start,$limit";
								
								$result = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
								
										$sl=$limit;
										
										while($row=mysqli_fetch_array($result))
										{
										$active_or_inactive=$row['active_or_inactive'];
										$sl++;
										$camp_art=$row['camp_art'];
										
										
									?>
									<form action="insert_vinyl.php" method="POST">
                                  <tr>
                                    <td><?php echo $sl; ?></td>
									<td><img src="../advertiser/<?php  $camp_art = str_replace("","",$camp_art); echo str_replace("|","",$camp_art);?>"  class="img-responsive" style="width:50px;" alt="No image"></td>
									<td><?php echo $row['camp_title'];?></td>
                                    <td><?php echo $row['company'];?></td>
									<td><?php echo $row['adv_contact'];?></td>
                                   
									<td><?php echo $row['adv_email'];?></td>
									<td><?php echo $row['camp_no_cars'];?></td>
									
									<td><?php echo $row['v'];?></td>
									<?php
									if($active_or_inactive=='0')
									{
										?>
									<td><input type="button"  id="active" value="Processing" disabled style="color:gray;"  onclick="send_vinlyer(<?php echo  $row['camp_id'];?>);">
									<?php
									}
									else if($active_or_inactive=='1')
									{
									
									?>
									<td><input type="button"  id="active" value="Send To Live"  class="btn btn-success" onclick="go_live(<?php echo  $row['camp_id'];?>);send_mail(<?php echo  $row['camp_id'];?>);">
									<?php
									}
									else
									{
									?>
									<td><input type="button"  id="active" value="SENT" disabled  class="btn btn-danger" onclick="go_live(<?php echo  $row['camp_id'];?>);">
									<?php
									}
									?>
                                   </tr> 
									
									
								  </form>
								<?php } ?>
                                </tbody>
                              </table>
							  
							    <ul class="pagination pagination-lg">
								<?php
								$rows=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT p.* , e.* FROM cust_vinyler_dashboard p    RIGHT OUTER JOIN 
								(SELECT  a.adv_email,a.adv_contact,b.camp_id,b.camp_art,b.camp_title,b.company,b.camp_no_cars,count(c.driv_camp_id) 
								as v FROM cust_advertiser_info as a, cust_campaign_details as b, cust_drivers as c where a.adv_id=b.camp_adv_id 
								AND b.camp_id=c.driv_camp_id AND b.camp_status='0' AND b.camp_active_status='1'  group by b.camp_id) as e
								ON p.vd_camp_id = e.camp_id"));
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
            
            </div> 
            
              <a href="campaign_for_vinyl_download.php" class="btn btn-purple btn-md">Download</a>
            
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
	function go_live(e)
	{	
	 

	 		 
	 var url="campaign_for_vinly_update.php?id="+e;
	 
	
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
	<script>
function send_mail(e)
{
	window.location.href="s_mail_send_to_live.php?id="+e;
	
}
</script>