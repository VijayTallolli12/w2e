<?php 
include('include/db_config.php');
?>
<?php 
								require 'email/PHPMailerAutoload.php';
								$sql="select * from  cust_drivers limit 50";
								
								$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
								$no=0;
								while($row=mysqli_fetch_array($query))
								{
									$no++;	
 										
									if($row['driv_name']=="" OR  $row['driv_gender']=="" OR $row['driv_age']=="" OR $row['driv_email']=="" 
									OR $row['driv_contact']=="" OR $row['driv_word']=="" OR $row['driv_word_other']=="" OR $row['driv_car_reg_no']==""
									OR $row['driv_car_reg_year']=="" OR  $row['driv_car_make']=="" OR
									$row['driv_car_model']=="" OR $row['driv_prim_usage']=="" OR $row['driv_travel_city']=="" OR $row['driv_frequent_areas']=="" OR
									$row['driv_travel_distance']=="" OR $row['driv_car_color']=="" OR	$row['driv_color_other']=="" OR
									$row['driv_car_condition']=="" OR $row['driv_car_fuel']=="" OR $row['driv_car_type']=="" OR
									$row['driv_varification_image1']=="" OR	$row['driv_varification_image2']=="" OR	$row['driv_varification_image3']=="" OR
									$row['driv_license']==""  OR $row['driv_pancard']=="" OR	$row['driv_camp_category']=="" OR
									$row['driv_reg_date']=="" OR $row['driv_camp_duration']=="" 	 OR	$row['driv_camp_id']=="" OR
									$row['driv_vinyl_type']=="" OR	$row['driv_add_one']=="" OR	$row['driv_add_two']=="" OR
									$row['driv_city']=="" )	 
									
									{
										
									$email=$row['driv_email'];
									
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
										$mail->Body    = "Please Full Fill your profile ";
										$mail->AltBody = '';
									
										if(!$mail->send()) {
								echo 'Message could not be sent.';
								echo 'Mailer Error: ' . $mail->ErrorInfo;
								
							} 
									}
								}
								
									?>