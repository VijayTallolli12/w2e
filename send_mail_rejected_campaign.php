<?php 
include('include/db_config.php');
?>
<?php
$camp_id=$_GET['id'];

								  require 'email/PHPMailerAutoload.php';
								  
								$sql="select * from  cust_campaign_details a,cust_advertiser_info b 
								where b.adv_id=a.camp_adv_id AND a.camp_id='$camp_id'";
								
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									$no++;	
 										
									$email=$row['adv_email'];
									
									
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
										$mail->Body    = "Your Campaign has been rejected kindly review your campaign details";
										$mail->AltBody = '';
									
										

				if(!$mail->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
					echo '<script type="text/javascript">location.href="pending_camp_for_adv.php";</script>';
				} {
		echo '<script type="text/javascript">alert("Campaign Rejected mail has been sent"); location.href="pending_camp_for_adv.php";</script>';
				}	
				}				
									
								
									?>