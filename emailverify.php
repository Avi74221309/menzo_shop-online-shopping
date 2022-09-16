<?php
include("chowkdi_admin/config/connection.php");
if($_GET['code'])
{
	$email=base64_decode($_GET['code']);
	
	$sql=mysqli_query($con,"UPDATE tbl_reg_mst set status='Active' where email='$email'");

		$to=$email;
		$subject="Confirm Email Activation";
		$message="Your Email Id has been successfully Verified with Chowkdi.";
		$message.="\\n Thank You...";
		$mailheader="From:CHOWKDI";
		$mailheader.=$sender_email;
		@mail($to,$subject,$message,$mailheader);
		
		echo "<script>alert('Your Account Has Been Activated.');
		window.location.href='http://www.chowkdi.com';</script>";
	

}
?>