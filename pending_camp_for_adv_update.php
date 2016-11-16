<?php 
include('include/db_config.php');
?>
<?php
$camp_id=$_GET['id'];

	$sql="UPDATE  cust_campaign_details SET camp_status='1'  where camp_id='$camp_id'";
	mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	
	


$sql1="SELECT *
		FROM cust_advertiser_info as a, cust_campaign_details as b 
		where a.adv_id=b.camp_adv_id AND a.adv_name!='' AND a.adv_email!='' 
		AND a.adv_contact!='' AND a.adv_date!='' AND b.camp_status='1' 
		AND b.camp_active_status='0' AND b.camp_id='$camp_id'";
								
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
								
								$row=mysqli_fetch_array($query);
							
									
 										
									$email=$row['adv_email'];
									$adv_name=$row['adv_name'];
									$camp_reg_date=$row['camp_reg_date'];
									$camp_start_date=$row['camp_start_date'];
										
									//	echo $email;
									
								require 'email/PHPMailerAutoload.php';
								$mail = new PHPMailer;

										//$mail->SMTPDebug = 3;                               // Enable verbose debug output

										$mail->isSMTP();                                      // Set mailer to use SMTP
										$mail->Host = 'mail.boredbees.com';  				  // Specify main and backup SMTP servers
										$mail->SMTPAuth = true;                               // Enable SMTP authentication
										$mail->Username = 'akshay@boredbees.com';             // SMTP username
										$mail->Password = 'akshay';                           // SMTP password
										$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
										$mail->Port = 587;                                    // TCP port to connect to

										$mail->From = 'vinayak@boredbees.com';
										$mail->FromName = 'Wrap To Earn';
										$mail->addAddress($email);     					// Add a recipient
										//$mail->addAddress('ellen@example.com');               // Name is optional
										$mail->addReplyTo('vinayak@boredbees.com', 'Wrap To Earn');
										//$mail->addCC('cc@example.com');
										//$mail->addBCC('bcc@example.com');

										//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
										//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
										$mail->isHTML(true);                                    // Set email format to HTML

										$mail->Subject = 'Wrap to Earn';
										$mail->Body    = "Hi $adv_name ,
						<br>
						<br>
						Great news! The campaign that you submitted on the Wrap2Earn 
						http://wrap2earn.technoclock.com/  on $camp_reg_date has been approved
						<br>
						<br>
						We recommend that you sign in and familiarize yourself with your 
						very own Wrap2Earn Dashboard http://wrap2earn.technoclock.com/advertiser/advertiser-login.php.
						Here you can see a summary of your campaign details & get an 
						understanding of the kind of analytics you will see once your 
						campaign is active.
						<br>
						<br>
						Your campaign is now available to all the 
						Wrap2Earn users to view either on the Wrap2Earn website 
						http://wrap2earn.technoclock.com/drivers/selectcamp.php and our App 
						{Insert google play store link here}. Go have a look – we hope 
						you like how we’ve displayed your ad campaign.
						<br>
						<br>
						Next steps: We understand the importance of your brand image 
						and will focus on onboarding drivers that will help fulfill 
						your campaign requirements and objectives so that we can start 
						your campaign on $camp_start_date . Stay tuned!
						In the mean time, If you need support or have any questions that
						need answering please get in touch with us on support@wrap2earn.com
						in  and a Wrap2Earn representative will be 
						more than happy to help.
						<br>
						We look forward working with you and 
						making your campaign a huge success!
						<br>
						<br>
					Thank you,<br>
					<br>
					The Wrap2Earn Team
					Wrap. Drive. Earn.
					<br>
					<br>
					<img src='http://wrap2earn.technoclock.com/crm/images/32.png'> 

									";
					
		$mail->AltBody = '';
									
										

					
							
		if(!$mail->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				echo '<script type="text/javascript">location.href="pending_camp_for_adv.php";</script>';
				} {
		echo '<script type="text/javascript">alert("Campaign Approved mail has been sent"); location.href="pending_camp_for_adv.php";</script>';
				}							
								
									?>

                                 
