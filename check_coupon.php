<?php
@session_start();
include('chowkdi_admin/config/connection.php');
if(isset($_POST['check_coupon']))
{
$coupon_code = $_POST['coupon_code'];
$cart_value = $_POST['cart_value'];

$sql = mysqli_query($con,"select * from tbl_coupon where coupon_code='".$coupon_code."' and status='Active'");
if(mysqli_num_rows($sql)==0)
{
	  unset($_SESSION['coupon_code']);
      unset($_SESSION['coupon_amount']);
      unset($_SESSION['cart_value']); 
      unset($_SESSION['shopping_amt']);

       unset($_SESSION['coupon_id']);
	 $_SESSION['coupon_status']='<p style="color:red">Invalid Coupon Code</p>';
	 header('location:cart');
}
else
{
	$get_info = mysqli_fetch_array($sql);
	if($cart_value<$get_info['shopping_amt'])
	{ 
		 unset($_SESSION['coupon_code']);
      unset($_SESSION['coupon_amount']);
      unset($_SESSION['cart_value']); 
      unset($_SESSION['shopping_amt']);

       unset($_SESSION['coupon_id']);

		//echo '<p style="color:red">Minimum Shopping Amount Will Be '.$get_info['shopping_amt'].' for Applying This Code</p>';
		$_SESSION['coupon_status'] = '<p style="color:red">Minimum Shopping Amount Will Be '.$get_info['shopping_amt'].' for Applying This Coupon Code</p>';
		 header('location:cart');
	}
	else
	{
		$coupon_amounts = $cart_value*$get_info['coupon_amount']/100;
		
		$_SESSION['coupon_code']=$coupon_code;
		$_SESSION['coupon_amount']=$get_info['coupon_amount'];
		$_SESSION['cart_value']=$cart_value;
		$_SESSION['shopping_amt']=$get_info['shopping_amt'];
		$_SESSION['coupon_status']='<p style="color:green">Coupon Applied Successfully. You Got. '.$get_info['coupon_amount'].' Flat Off By <font style="color:red;">'.$_SESSION['coupon_code'].'</font></p>';
		$_SESSION['coupon_id']=$get_info[0];
		header('location:cart');
		//echo '<p style="color:green">Coupon Applied Successfully</p>';
	}
}
}
?>