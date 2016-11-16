<?php
$dbhost='localhost';
$dbuser='boredfqm_wrap';
$dbpswd='wrap2earn';
$dbname='boredfqm_wrap2earn';

$con=@($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost, $dbuser, $dbpswd));
$me=((bool)mysqli_query($con, "USE " . $dbname));
?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .back{
      background: #5cb85c;
    font-size: 40px;
    color: white;
    padding:10px;
    }
    .div_btn
    {
    margin-top: 30px;
    }
  </style>
</head>
<body>
<div class="row">
<div class="col-md-12 back text-center" >
Payment has done successfully.
</div>
<div class="col-md-12  text-center div_btn">
<button class="btn btn-primary  btn-lg">Ok</button>
</div>
</div>


<?php 
$camp_id=$_GET["billnumbers"];
$status=$_GET["status"];
$id=$_GET["id"];

echo $id;
echo $camp_id;
echo $status;

if($status=='paid')
{
$sql_f="select * from cust_campaign_details a,cust_advertiser_info b where a.camp_adv_id=b.adv_id and a.camp_id='$camp_id'";
$result=@mysqli_query($GLOBALS["___mysqli_ston"], $sql_f) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
while($row=mysqli_fetch_array($result))
{
$camp_adv_id=$row["camp_adv_id"];
$camp_title=$row["camp_title"];
$adv_email=$row["adv_email"];
}
$sql_insert="insert into cust_camp_payment_details(camp_id,adv_id,product_info,amount,txnid,email
,date,status)values('$camp_id','$camp_adv_id','$camp_title','100','$id','$adv_email',NOW(),'$status')";
$res=@mysqli_query($GLOBALS["___mysqli_ston"], $sql_insert) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false))); 
}
?>
</body>
</html>