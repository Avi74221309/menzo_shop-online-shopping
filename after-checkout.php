<?php
session_start();
include("chowkdi_admin/config/connection.php");
  @$_SESSION['cart'][$id];

 $currency='Rs';
if(isset($_POST['details']))
{

if(!$_SESSION['ord_id'])
{

$sql=mysqli_query($con,"select * from tbl_ordercust")or die(mysql_error());
if(mysqli_num_rows($sql)==0)
{
$ord_id="CHOWKDI";

//echo $ord_id;
}

}


$sql2=mysqli_query($con,"SELECT MAX(id) as max_id FROM tbl_ordercust ");

$arr=mysqli_fetch_array($sql2);
@$vid=$arr[max_id]+1;

$ord_id="CHOWKDI"."$vid";

//echo $ord_id;
}////end 
$_SESSION['show_order_id']=$ord_id;		


$sql3=mysqli_query($con,"select * from tbl_reg_mst where email='$_SESSION[user_id]'");
$fetch=mysqli_fetch_array($sql3);
if($ord_id==''){
$sql2=mysqli_query($con,"SELECT MAX(id) as max_id FROM tbl_ordercust ");
$arr=mysqli_fetch_array($sql2);
$vid=$arr[max_id]+1;
$ord_id="CHOWKDI"."$vid";

mysqli_query($con,"insert into tbl_ordercust set user_id='$fetch[id]',
ord_id='$ord_id',session_id='',paypal_id='',paypal_status='',cheque_number='',bank='',amount='',shipping='',payment_type='',trans_status='',tracking_id='',
add_date=now()");
$ord_id2=mysqli_insert_id($con);	
$_SESSION['ord_id']=$ord_id2;

}else {
mysqli_query($con,"insert into tbl_ordercust set user_id='$fetch[id]',session_id='',paypal_id='',paypal_status='',cheque_number='',bank='',amount='',shipping='',payment_type='',trans_status='',tracking_id='',
ord_id='$ord_id',
add_date=now()");

$ord_id2=mysqli_insert_id($con);	
$_SESSION['ord_id']=$ord_id2;

}


///



$sql=mysqli_query($con,"select * from tbl_reg_mst where email='$_SESSION[user_id]'");
$fetch=mysqli_fetch_array($sql);
$check=mysqli_query($con,"select * from tbl_billing where cust_id='$fetch[id]'");
//print_r($_POST);
//echo "Total rows is ".mysqli_num_rows($check);
if(mysqli_num_rows($check)==0)
{			
$ins="update tbl_reg_mst set address='$_POST[addressB]',
city='$_POST[cityB]',
mobile='$_POST[mobileB]',
pin='$_POST[pinB]',0000
state='$_POST[stateB]',
country='$_POST[countryB]' where id='$fetch[id]'";
//echo $ins;
mysqli_query($con,$ins);
}
if($_SESSION['billing_done']=='')
{
$sql="insert into tbl_billing set cust_id='$fetch[id]',
order_id='$_SESSION[ord_id]',
name='$_POST[last_nameB]',
last_name='',
address='$_POST[addressB]',
city='$_POST[cityB]',
pincode='$_POST[pinB]',
state='$_POST[stateB]',
country='$_POST[countryB]',
mobile='$_POST[mobileB]',
email='$_POST[emailB]',
transaction_id='',
add_date=now()";
//echo $sql; die;
mysqli_query($con,$sql);
$_SESSION['bill_id']=mysqli_insert_id($con);


//shipping
$sql="insert into tbl_shipping set cust_id='$fetch[id]',
order_id='$_SESSION[ord_id]',	
name='$_POST[first_nameS]',
last_name='',
address='$_POST[addressS]',
city='$_POST[cityS]',
pincode='$_POST[pinS]',
state='$_POST[stateS]',
country='$_POST[countryS]',
mobile='$_POST[mobileS]',
del_notes='$_POST[delivery]',
add_date=now()"; 
//echo $sql; die;
mysqli_query($con,$sql);
$_SESSION['ship_id']=mysqli_insert_id($con);
$_SESSION['billing_done']='done';


////

}else{ 

$sql="insert into tbl_billing set cust_id='$fetch[id]',
order_id='$_SESSION[ord_id]',	
name='$_POST[last_nameB]',
last_name='',
address='$_POST[addressB]',
city='$_POST[cityB]',
pincode='$_POST[pinB]',
state='$_POST[stateB]',
country='$_POST[countryB]',
mobile='$_POST[mobileB]',
email='$_POST[emailB]',
transaction_id='',
add_date=now()"; 
//echo $sql; 
//die;

mysqli_query($con,$sql);
$ins="update tbl_reg_mst set address='$_POST[addressB]',
city='$_POST[cityB]',
mobile='$_POST[mobileB]',
pin='$_POST[pinB]',
state='$_POST[stateB]',
country='$_POST[countryB]' where id='$fetch[id]'";

mysqli_query($con,$ins);
$sql="insert into  tbl_shipping set cust_id='$fetch[id]',
order_id='$_SESSION[ord_id]',
name='$_POST[first_nameS]',
last_name='',
address='$_POST[addressS]',
city='$_POST[cityS]',
pincode='$_POST[pinS]',
state='$_POST[stateS]',
country='$_POST[countryS]',
mobile='$_POST[mobileS]',
del_notes='$_POST[delivery]',
add_date=now()"; 

mysqli_query($con,$sql);

}
header("location:payment");
exit;
			
		
?>
