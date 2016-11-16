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
  <link rel="icon" type="image/png" href="assets/images/avtar/logoss.png" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Wrap2Earn</title>

	<meta name="description" content="">
	

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
 <style>
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
          <div class="panel panel-default">
                        <div class="panel-heading"> Pending Campaign Edit</div>
                        <div class="panel-body table-responsive">
       
        <div class="warper container-fluid">
		<form action="campaign_update.php" method="POST">
        	 <table class="table table-bordered order-table table" >
                                
								
                         
								 <?php 
								
									$myDate = date('Y/m/d');	
							
					$camp_id=$_GET['id'];

					$sql="SELECT * FROM cust_campaign_details where camp_id='$camp_id'";
						$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

						$row=mysqli_fetch_array($query);
 									$category=$row['camp_category'];
									$veh_type=$row['camp_veh_type'];
									
									?>
                                  <tr>
								  <input  type="hidden" name="camp_id" value="<?php echo $camp_id;?>" class="myclass">
                                    <tr>
									   <th>Company Name</th>
									    <td><input  type="text" name="company" value="<?php echo $row['company'];?>" class="form-control"></td>
									</tr>
									<tr>
									<th>Company Url</th>
									<td><input  type="text" name="cmp_url" value="<?php echo $row['company_url'];?>" class="form-control"></td>
<tr>
									<th>Business Industry</th>
								<!--<td><input  type="text" name="category" value="<?php echo $row['camp_category'];?>" class="form-control">
									
									<select   name='category' class="form-control">
							<option value='' disabled > Campaign Duration </option>
							
									<option <?php if($row['camp_category']==$category){echo 'selected';}?> value='<?php echo $i;?>'><?php echo $row['camp_category'];?></option>
									
							
						     </select>-->
							 
							<td>
                      <select class="form-control" name="category"  value="<?php echo $category;?>">
                        <option value="">select Industry</option>
								<?php
								   $sql1="select * from cust_category";
								$result1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
								while($row1=mysqli_fetch_array($result1))
								{
								?>
								  <option value="<?php echo $row1['main_category'];?>"
								<?php if($category==$row1['main_category'])
								{?>
								selected<?php }?> > <?php echo $row1['main_category']?></option>
								  <?php
								}
								?>
                      </select>
                    
							 
							 
									</td>
									</tr>
									</tr>
									<tr>
									<th>Campaign Name</th>
									<td><input  type="text" name="camp_title" value="<?php echo $row['camp_title'];?>" class="form-control"></td>
									</tr>
<tr>
									<th>Campaign  Start Date</th>
									<td> <div class="input-group date" id="datepicker1">
                                        <input type="text" name="s_date" style="width:100%;"  value="<?php echo date('d-m-Y',strtotime($row['camp_start_date']));?>" class="form-control form-control" id="datepicker" onchange='calculate()' data-date-format="DD-MM-YYYY" data-bv-field="monthDayYear">
                                        <span class="input-group-addon" style="padding-left: 11px;"><span class="glyphicon-calendar glyphicon"></span>
                                        </span>
                                   </div></td>
									</tr>
									<tr>
									<th>Campaign  Duration</th>
									<td>
									 <select  id='months' name='duration' onchange='calculate()' class="form-control">
							<option value='' disabled > Campaign Duration </option>
							<?php 
								for($i=1;$i<13;$i++)
								{ ?>
									<option <?php if($row['camp_duration']==$i){echo 'selected';}?> value='<?php echo $i;?>'><?php echo $i.'  Month/s';?></option>
							<?php	}
								?>
						     </select>
									</td>
									</tr>
									<tr>
									<th>Campaign End Date</th>
									<td>
									<div class="input-group date" id="datepicker2" readonly>
                                        <input type="text" name="end_date"  style="width:100%;" readonly value="<?php echo date('d-m-Y',strtotime($row['camp_end_date']));?>" class="form-control form-control" id="end_date"  data-date-format="DD-MM-YYYY" data-bv-field="monthDayYear">
                                        <span class="input-group-addon" readonly style="padding-left: 11px;"><span class="glyphicon-calendar glyphicon"></span>
                                        </span>
									</div>
									
									
									</tr>
<tr>
									<th>Requested no of Cars</th>
									<td><input  type="number" name="no_of_cars" value="<?php echo $row['camp_no_cars'];?>"  id="number" class="form-control" onchange='calculate()'>
									
									</td>
									</tr>
									<tr>
									<th>Company Details</th>
									<td><input  type="text" name="cmp_desc" value="<?php echo $row['company_desc'];?>" class="form-control"></td>
									</tr>
									<tr>
									<th>Campaign Objective</th>
									<td><input  type="text" name="obj" value="<?php echo $row['camp_objective'];?>" class="form-control"></td>
									</tr>
<tr>
									<th>Campaign  City</th>
									<td><input  type="text" name="city" value="<?php echo $row['camp_city'];?>" class="form-control"></td>
									</tr>
									
									
									<tr>
									<th>Vehicle Type</th>
								
									
									<td>
									<select class="form-control" name="veh_type"  >
											<option value='Commercial' <?php if($veh_type == 'Commercial') echo 'selected';?> > Commercial</option>
											<option value='Private'  <?php if($veh_type == 'Private') echo 'selected';?>> Private </option>
											<option value='Both'  <?php if($veh_type == 'Both') echo 'selected';?>>Commercial &  Private</option>
											
										</select>
									</td>
									</tr>
									
									<tr>
									<th>Campaign Amount</th>
									<td><input  type="text" name="amount" readonly value="<?php echo $row['camp_amount'];?>" id="camp_amt" class="form-control"></td>
									</tr>
									
									<tr>
									<th>Campaign Logo</th>
									<td><input  type="text" name="logo" value="<?php echo $row['camp_logo'];?>" class="form-control"></td>
									</tr>
									<tr>
									<th>Campaign Art</th>
									<td><input  type="text" name="art" value="<?php echo $row['camp_art'];?>" class="form-control"></td>
									</tr>
									
									
									
                                   
                                  </tr>
                                  
                                
								
				
                              </table>
           
							<input type="submit" name="submit" class="btn btn-purple btn-md" value = "Update" >
            </form>
			
			
			
            <div class="row">
                <div class="col-md-12">
				<div class="col-md-1"></div>
				<div class="col-md-10">
                	
					
                </div>
				<div class="col-md-1"></div>
            </div>
            </div>
            <div id="disp">
			</div>
            
            
            
        </div>
		</div>
		
		
		
        <!-- Warper Ends Here (working area) -->
        
        
       <footer class="container-fluid footer">
        		© All rights reserved |&nbsp;<!--<a href="http://boredbees.com/" target="_blank">Design by  Boredbees Tech Solutions</a>-->
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


<script type="text/javascript">
  $(function() {
    $('#datepicker1').datetimepicker({
    });
  });
  
  
  $(function() {
    $('#datepicker2').datetimepicker({
    });
  });
  
  
  function calculate(){
	 
var dt = $("#datepicker").val();
//$('#show_start_date').val(dt);
	var mn = $('#months').val();
        var mns = mn+' Month/s';
	var m = parseInt(mn);

	var v = m+1;
	var from = $("#datepicker").val().split("-");
	var Year1 = from[2];
	var date1 = from[0];
	var mon = from[1];	
	
	var d = new Date(Year1+'-'+mon+'-'+date1 );
	var newdate = new Date(new Date(d).setMonth(d.getMonth()+m));
	
	var newmonth= newdate.getMonth()+1;
	var newdates = newdate.getDate();
	var ddd = newdates +'-'+newmonth+'-'+newdate.getFullYear();
    //var datess = newdate.formatDate(mm-dd-yy);

       // var nam = $('#i3').val();
       // var ty = $('#type').val();
	
	$('#end_date').val(ddd);
       // $('#end_date_show').val(ddd);
	//$('#end_date_hide').val(ddd);
	//$('#show_duration').val(mns)
	//alert(ddd);
	//var m = parseInt($('#months').val());
	 var cars = parseInt($('#number').val());
	var total = mn*cars*6500;
	var price = parseInt(total);
	$('#camp_amt').val(total);
       $('#camp_amt1').html(total);
        $('#camp_amt2').html(total);
	$('#camp_amt_hide').val(total);
	$('#amount').val(price);
	$('#show_name').val(nam);
	$('#show_type').val(ty);
	//alert(price);
}


</script>
