<?php
session_start();
if(!isset($_SESSION['wrap2earn_login_id']))
{
      header("Location:index.php");  
}
?>