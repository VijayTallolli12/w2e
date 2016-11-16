<?php 
include('include/db_config.php');
?>
<?php
$camp_id=$_GET['id'];

								require 'email/PHPMailerAutoload.php';
								$mail = new PHPMailer;
	$sql = "SELECT a.camp_id,a.camp_city,b.adv_name,e.comp_file,
					b.adv_email,a.camp_start_date
					from 
					cust_campaign_details as a,cust_advertiser_info as b , 
					cust_drivers as c,cust_vinyler_dashboard as d,
					cust_vinyl_completed as e where 
					a.camp_adv_id=b.adv_id AND d.vd_camp_id=a.camp_id AND
					a.camp_id=c.driv_camp_id AND a.camp_id=e.comp_camp_id
					AND d.active_or_inactive='2' AND a.camp_id='$camp_id' group by a.camp_id
					";
					
					$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								
								$row=mysqli_fetch_array($query);
								
									
 									
										$name=$row['adv_name'];
										$camp_start_date=$row['camp_start_date'];
										$email=$row['adv_email'];
										$camp_city=$row['camp_city'];
										$comp_file=$row['comp_file'];
										
								
									
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
										$mail->addReplyTo('dilip@luculent.in', 'Wrap To Earn');
										//$mail->addCC('cc@example.com');
										//$mail->addBCC('bcc@example.com');

										//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
										//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
										$mail->isHTML(true);                                    // Set email format to HTML

										$mail->Subject = 'Wrap2Earn - Campaign start date';
										$mail->Body    = " Hi $name,
					<br>
					<br>
					Ready. Wrap. Go!
					<br>
					<br>
					The day is almost upon us. All the cars that have registered
					to drive for your advertising campaign have been wrapped in 
					your artwork. Your campaign goes live on 
					$camp_start_date We have attached pictures of 
					some of the cars that will be seen by potential customers 
					all of $camp_city.
					<br>
					<br>
					Keep up to date with the performance of your campaign – Real 
					time tracking, Impressions generated & kilometers driven by 
					logging in to your very own Wrap2Earn Dashboard 
					http://wrap2earn.technoclock.com/advertiser/advertiser-login.php. 
					For your better understanding, we 
					have attached a snapshot of how to interpret this information. 
					<br>
					<br>
					some of the pictures of the wrapped cars 
					<br>
					<br>
					
					<img src='http://wrap2earn.technoclock.com/../vinyl/$comp_file'> 
					<br>
					<br>
					
					At anytime, If you need support or have any questions that 
					need answering please get in touch with us on dilip@luculent.in  
					or 9448501206 and a Wrap2Earn representative will 
					be more than happy to help.
					
					<br>
					<br>
					We look forward working with you and making your campaign a huge success!
					<br>
					<br>
				Thank you,
				<br>
				<br>
				The Wrap2Earn Team
				Wrap. Drive. Earn.
				<br>
				<br>

<img src='http://wrap2earn.technoclock.com/crm/images/32.png'> ";
	$mail->AltBody = '';
					
					$mail->AltBody = '';
					$mail->send();

					
				$camp_id=$_GET['id'];	
					
			/* 2^nd Mail Function */
$sql1="SELECT e.vn_email,e.vn_contact,e.vn_date,c.driv_name,c.driv_email,a.camp_id,d.vd_camp_id,a.camp_title,a.company,a.camp_no_cars,a.camp_art,b.adv_contact,a.camp_start_date,
								b.adv_email,d.active_or_inactive,count(c.driv_camp_id) as v from cust_campaign_details as a,cust_advertiser_info as b ,
								cust_drivers as c,cust_vinyler_dashboard as d,cust_vinyler_info as e  where a.camp_adv_id=b.adv_id AND d.vd_camp_id=a.camp_id AND a.camp_id=c.driv_camp_id 
								AND d.active_or_inactive='2' AND a.camp_id='$camp_id' AND e.vn_id=d.vd_vinyler_id
								group by c.driv_id";

								
								$query2=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
								
								while($row=mysqli_fetch_array($query2))
								{
								
									$driv_email1=$row['driv_email'];
									$driv_name1=$row['driv_name'];
									$company1=$row['company'];
									$camp_title1=$row['camp_title'];
									$no_of_cars1=$row['camp_no_cars'];
									$sign_up_cars1=$row['v'];
									$camp_start_date1=$row['camp_start_date'];
									$vinyl_email_id1=$row['vn_email'];
									$vin_timing1=$row['vn_date'];
									$vn_contact1=$row['vn_contact'];
									
									
									
								/* require 'email/PHPMailerAutoload.php';*/
								$mail1 = new PHPMailer;
 
										//$mail->SMTPDebug = 3;                               // Enable verbose debug output

										$mail1->isSMTP();                                      // Set mailer to use SMTP
										$mail1->Host = 'mail.boredbees.com';  				  // Specify main and backup SMTP servers
										$mail1->SMTPAuth = true;                               // Enable SMTP authentication
										$mail1->Username = 'akshay@boredbees.com';             // SMTP username
										$mail1->Password = 'akshay';                           // SMTP password
										$mail1->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
										$mail1->Port = 587;                                    // TCP port to connect to

										$mail1->From = 'vinayak@boredbees.com';
										$mail1->FromName = 'Wrap To Earn';
										$mail1->addAddress($driv_email1);     					// Add a recipient
										//$mail->addAddress('ellen@example.com');               // Name is optional
										$mail1->addReplyTo('vinayak@boredbees.com', 'Wrap To Earn');
										//$mail->addCC('cc@example.com');
										//$mail->addBCC('bcc@example.com');

										//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
										//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
										$mail1->isHTML(true);                                    // Set email format to HTML

										$mail1->Subject = 'Wrap2Earn - Wrap your car!';
										$mail1->Body    = "Hi $driv_name1 ,
						<br>
						<br>
						This is to inform you that all cars in the $company1 campaign have been successfully wrapped! As 
						initially planned, the campaign will officially launch on $camp_start_date1, meaning from that 
						date on you will be able to start earning based on how much you drive! 
						<br>
						<br>
						Please refer to the user guide sent to your email for basic information regarding the App. The basic idea is 
						simple - always remember to start the navigation in the App every time you get in your car to drive, 
						and to stop once you complete a trip. This will ensure you get paid for every trip you make. 
						<br>
						<br>
						If at anytime, you need support or have any questions that need answering please get in touch with us on 
						drivers@wrap2earn.com or 9448501206 and a Wrap2Earn representative will be more than
						happy to help. Good luck, and happy driving!
						<br>
						<br>
					Thank you,<br>
					<br>
					The Wrap2Earn Team
					Wrap. Drive. Earn.
					<br>
					<br>
			<img src='http://wrap2earn.technoclock.com/crm/images/32.png'> ";
					
		$mail1->AltBody = '';
		if(!$mail1->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				echo '<script type="text/javascript">location.href="pending_camp_for_adv.php";</script>';
				} {
		echo '<script type="text/javascript">alert("Campaign Wrapped mail has been sent Advertsiser AND Drivers"); location.href="campaign_for_vinyl.php";</script>';
				}		
								
								}					
												
				?>