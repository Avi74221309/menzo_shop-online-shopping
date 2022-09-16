 <?php  
error_reporting(0);
session_start();

include("chowkdi_admin/config/connection.php");
include('include/page_url.php');
$total_prce = $_SESSION['total_price']; 
/*if(!isset($_SESSION['cart']))
  {
    header("location:login");
    exit;
  }*/
  if(isset($_SESSION['user_id']))
  {
    $sql=mysqli_query($con,"select * from tbl_reg_mst where email='$_SESSION[user_id]'");
    $fetch=mysqli_fetch_array($sql);
  }else{
    
    //$_SESSION[login]='no';
    header("location:registration");
    exit;
  } 
  
 $promo_query=mysqli_query($con,"select * from tbl_promocode where user_id='$fetch[0]'");
$prm_row=mysqli_fetch_array($promo_query);
$expiry_date=$prm_row['expiry_date'];
$dis1=($prm_row['promo_discount'])/100;
$promodisc=$prm_row['promo_discount'];
@$promo = $_REQUEST['promo_price'];
@$prmdisc=$_REQUEST['promo_disc'];
@$ship=$_REQUEST['charge'];
if(isset($_POST['payment']))
{
@$sql_pin=mysqli_query($con,"select pincode from pincode where pincode='$_POST[pinS]' and status='active'");
//$sql_pin2=mysqli_query($con,"select pincode from pincode where pincode='$_POST[pinS]' and status='active'");
@$fetch_pin=mysqli_fetch_array($sql_pin);
//$fetch_pin2=mysqli_fetch_array($sql_pin2);
if(@$fetch_pin['pincode']!=@$_POST['pinS'])
{
  $msg="Delivery is not available at  pincode -".$_POST[pinS];
echo "<script>window.location.href='payment-method.php?msg=$msg&charge=$_REQUEST[charge]';
</script>"; exit;
}
else if($_REQUEST['first_nameS']!='' && $_POST['addressS']!='' && $_POST['lname']!='' && $_POST['cityS']!='' && $_POST['pinS']!='' &&  $_POST['stateS']!='' && $_POST['countryS']!='' && $_POST['mobileS']!='')
{
echo  $shippingsql=mysqli_query($con,"update tbl_shipping set cust_id='$fetch[id]',
order_id='$_SESSION[ord_id]', 
first_name='$_POST[first_nameS]',
last_name='$_POST[lname]',
address='$_POST[addressS]',
city='$_POST[cityS]',
pincode='$_POST[pinS]',
state='$_POST[stateS]',
country='$_POST[countryS]',
mobile='$_POST[mobileS]',
del_notes='$_POST[delivery]',
add_date=now() where cust_id='$fetch[id]'"); 
  }
  $shipping_charge_rs = 0;


$query9=mysqli_query($con,"select * from tbl_cart where user_id='$fetch[0]' and session_id='".session_id()."'");
      while($fetch_data=mysqli_fetch_array($query9))
      {
          $shipping_charge_rs += $fetch_data['shipping_price'];
       if($fetch_data[discount]!='' && $fetch_data[deactive_discount]!='No' )
       {
if($_SESSION['clr_price'][$id]!='')
       {
         
          $price=$_SESSION['clr_price'][$id];
       }
       else
       {
         
          $price=$fetch_data[discount];
       }

    }
       else
       {
          $price=$fetch_data[product_price];
       }  
      
        
      $title=htmlspecialchars($fetch_data[product_name],ENT_QUOTES);
    
  ///  echo $qty;
	     $size=$_SESSION['size'][$id]; 
    //echo $fetch_data['stock_qty'];
             $coupon_detail = mysqli_fetch_array(mysqli_query($con,"select * from tbl_coupon where coupon_code='".$_SESSION['coupon_code']."' and status='Active'"));
            
            
            
           $order_info = mysqli_query($con,"INSERT INTO tbl_orderdetails SET ord_id='$_SESSION[ord_id]',
                          user_id='$fetch[0]',
                          
                          product_id='$fetch_data[product_id]',
                          coupon_id='".$coupon_detail[0]."',
                          color_id='".$fetch_data['color_id']."',
                          color_name='".$fetch_data['color_name']."',
                          size='".$fetch_data['size']."',
                          product_image='".$fetch_data['product_image']."',
                          coupon_title='".$coupon_detail['title']."',
                          coupon_code='".$coupon_detail['coupon_code']."',
                          coupon_amount='".$coupon_detail['coupon_amount']."',
                          coupon_shopping_amt='".$coupon_detail['shopping_amt']."',
                          
                          start_date='".$coupon_detail['start_date']."',
                          validity_date='".$coupon_detail['validity_date']."',
                         gift_wrap='$fetch_data[gift_wrap]',
                         gift_sender='$fetch_data[gift_sender]',
                         gift_receiver='$fetch_data[gift_receiver]',
                         user_message='$fetch_data[user_message]',
                         promo_discount='$prm_row[promo_discount]',
                          product_title='$title',
                          price='$fetch_data[price]',
                          colour='$fetch_data[colour]',
                           mrp='$fetch_data[total_price]',
                           shipping_charge='".$fetch_data['shipping_price']."',
                          discount='$fetch_data[discount]',
                          image='$fetch_data[image]',
                          qty='$fetch_data[qty]',
                          tracking_id='',
						  taxn_id='$referenceId',
						  
						  total_price='$_SESSION[total]',
                          add_date=now()");

         

           $ref="COD".rand(100,1000);           
mysqli_query($con,"update tbl_ordercust set 
tracking_id='$ref',
status='Success'
where id='$_SESSION[ord_id]'");

                        }
$refId=mysqli_fetch_array(mysqli_query($con,"select * from tbl_ordercust where id='$_SESSION[ord_id]'"));

        $data=mysqli_fetch_array(mysqli_query($con,"select * from tbl_billing where order_id='$_SESSION[ord_id]'"));
        
        $shipping=mysqli_fetch_array(mysqli_query($con,"select * from tbl_shipping where order_id='$_SESSION[ord_id]'"));
	
	
	if($fetch['gender']=='male')
	{
         $message="<html><head>
            <style>

  .bill-heading{font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;}
  .bill-info{font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;}

</style>
            </head>

<body>
<table width=\"800\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
  <tr>
    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
      <tr>
        <td height=\"50\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\"><img src='$baseurl/chowkdi_admin/css/logo.png' /></td>
      </tr>
      <tr>
        <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">Dear Mr.&nbsp;".$data['name']."</td>
      </tr>
      <tr>
        <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">  Billing  Details as per below . . . </td>
      </tr>
      
    <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333;  float:left; text-align:left; font-weight:bold; padding-left:4px;\">Name :</td>
    <td height=\"30\"align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; float:left;  text-align:left;padding-left:4px;\">Mr.&nbsp;".$data[name]."</td>
  </tr>  
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333;  float:left; text-align:left; font-weight:bold; padding-left:4px;\">Email :</td>
    <td height=\"30\"align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; float:left;  text-align:left;padding-left:4px;\">".$data[email]."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333;  float:left;  text-align:left; font-weight:bold; padding-left:4px;\">Mobile : </td>
     <td height=\"30\"align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; float:left;  text-align:left;padding-left:4px;\">".$data[mobile]."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; float:left;   text-align:left;font-weight:bold; padding-left:4px;\">Address : </td>
    <td height=\"40\"align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; float:left;  text-align:left; padding-left:4px;\">".$data[address].",&nbsp;".$data[state]."</td>
  </tr>
</table></td>
   <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td width=\"90\" height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;  float:left;  text-align:left;color:#333333; font-weight:bold; padding-left:4px;\">Order Id : </td>
    <td width=\"30\" height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; float:left;  text-align:left; padding-left:4px;\">CHOWKDI".$_SESSION['ord_id']."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333;  float:left;  text-align:left;font-weight:bold; padding-left:4px;\">City :</td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; text-align:left; color:#333333; float:left;  padding-left:4px;\">".$data[city]."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333;  float:left;  text-align:left;font-weight:bold; padding-left:4px;\">Pincode :</td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; text-align:left; color:#333333; float:left;  padding-left:4px;\">".$data[pincode]."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333;  float:left; font-weight:bold; padding-left:4px;\">&nbsp;</td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">&nbsp;</td>

  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\"></td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\"></td>
  </tr>
</table></td>
  </tr>
</table></td>
      </tr>
        <tr>
       <td height=\"20\">".str_repeat('.',200)."</td>
        </tr>
    
     <tr>
       <td height=\"25\">".str_repeat('.',200)."</td>
        </tr>
       <tr>
       <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">Shipping Details</td>
        </tr>
        <tr>
        <td height=\"25\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td width=\"30\" height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Name : </td>
    <td width=\"30\" height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">Mr.&nbsp;".$shipping['name']."</td>
  </tr>
   
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Mobile : </td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">".$shipping['mobile']."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Address : </td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">".$shipping['address'].",&nbsp;".$shipping['pincode'].",&nbsp;".$shipping['state']."</td>
  </tr>
</table></td>
   <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td width=\"40%\" height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Order Id : </td>
    <td width=\"30\" height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">CHOWKDI".$_SESSION[ord_id]."</td>
  </tr>
   <tr>
    <td width=\"40%\" height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Reference Id : </td>
    <td width=\"30\" height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">".$refId[tracking_id]."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">City : </td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">".$shipping['city']."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">&nbsp;</td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">&nbsp;</td>
  </tr>
  
</table></td>
  </tr>
</table></td>
      </tr>
     <tr>
       <td height=\"20\">".str_repeat('.',200)."</td>
        </tr>
    
     <tr>
       <td height=\"25\">".str_repeat('.',200)."</td>
        </tr>
     
    
     <tr>
       <td height=\"25\">&nbsp;</td>
        </tr>
     <tr>
       <td height=\"25\" ><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:#666666 solid 1px; \">
           <tr >
             <td width=\"11%\" height=\"35\" align=\"center\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;border-bottom: 1px solid #666666;\">Product Name </td>
        
       

        <td width=\"20%\" height=\"35\" align=\"center\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;border-bottom: 1px solid #666666;\">Image </td>
        
        <td width=\"12%\" height=\"35\" align=\"center\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;border-bottom: 1px solid #666666;\">Quantity</td>
        
             <td width=\"12%\" height=\"35\" align=\"center\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;border-bottom: 1px solid #666666;\">Total Price(Rs)</td>
            <td width=\"12%\" height=\"35\" align=\"center\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;border-bottom: 1px solid #666666;\">Discount(%)</td>
             <td width=\"11%\" align=\"center\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;border-bottom: 1px solid #666666;\">Net Price</td>



           </tr>
";
}
else
{
     $message="<html><head>
            <style>

  .bill-heading{font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;}
  .bill-info{font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;}

</style>
            </head>

<body>
<table width=\"800\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
  <tr>
    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
      <tr>
        <td height=\"50\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\"><img src='$baseurl/chowkdi_admin/css/logo.png' /></td>
      </tr>
      <tr>
        <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">Dear &nbsp;".$data['name']."</td>
      </tr>
      <tr>
        <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">  Billing  Details as per below . . . </td>
      </tr>
      
    <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333;  float:left; text-align:left; font-weight:bold; padding-left:4px;\">Name :</td>
    <td height=\"30\"align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; float:left;  text-align:left;padding-left:4px;\">&nbsp;".$data[name]."</td>
  </tr>  
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333;  float:left; text-align:left; font-weight:bold; padding-left:4px;\">Email :</td>
    <td height=\"30\"align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; float:left;  text-align:left;padding-left:4px;\">".$data[email]."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333;  float:left;  text-align:left; font-weight:bold; padding-left:4px;\">Mobile : </td>
     <td height=\"30\"align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; float:left;  text-align:left;padding-left:4px;\">".$data[mobile]."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; float:left;   text-align:left;font-weight:bold; padding-left:4px;\">Address : </td>
    <td height=\"40\"align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; float:left;  text-align:left; padding-left:4px;\">".$data[address].",&nbsp;".$data[pincode].",&nbsp;".$data[state]."</td>
  </tr>
</table></td>
   <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td width=\"90\" height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;  float:left;  text-align:left;color:#333333; font-weight:bold; padding-left:4px;\">Order Id : </td>
    <td width=\"30\" height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; float:left;  text-align:left; padding-left:4px;\">CHOWKDI".$_SESSION['ord_id']."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333;  float:left;  text-align:left;font-weight:bold; padding-left:4px;\">City :</td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; text-align:left; color:#333333; float:left;  padding-left:4px;\">".$data[city]."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333;  float:left; font-weight:bold; padding-left:4px;\">&nbsp;</td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">&nbsp;</td>

  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\"></td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\"></td>
  </tr>
</table></td>
  </tr>
</table></td>
      </tr>
        <tr>
       <td height=\"20\">".str_repeat('.',200)."</td>
        </tr>
    
     <tr>
       <td height=\"25\">".str_repeat('.',200)."</td>
        </tr>
       <tr>
       <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">Shipping Details</td>
        </tr>
        <tr>
        <td height=\"25\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td width=\"30\" height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Name : </td>
    <td width=\"30\" height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">&nbsp;".$shipping['name']."</td>
  </tr>
   
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Mobile : </td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">".$shipping['mobile']."</td>
  </tr>
   <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Pincode : </td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">".$shipping['pincode']."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Address : </td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">".$shipping['address'].",&nbsp;".$shipping['state']."</td>
  </tr>
</table></td>
   <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td width=\"40%\" height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Order Id : </td>
    <td width=\"30\" height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">CHOWKDI".$_SESSION[ord_id]."</td>
  </tr>
   <tr>
    <td width=\"40%\" height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Reference Id : </td>
    <td width=\"30\" height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">".$refId[tracking_id]."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">City : </td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">".$shipping['city']."</td>
  </tr>
  <tr>
    <td height=\"30\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">&nbsp;</td>
    <td height=\"30\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">&nbsp;</td>
  </tr>
  
</table></td>
  </tr>
</table></td>
      </tr>
     <tr>
       <td height=\"20\">".str_repeat('.',200)."</td>
        </tr>
    
     <tr>
       <td height=\"25\">".str_repeat('.',200)."</td>
        </tr>
     
    
     <tr>
       <td height=\"25\">&nbsp;</td>
        </tr>
     <tr>
       <td height=\"25\" ><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:#666666 solid 1px; \">
           <tr >
             <td width=\"11%\" height=\"35\" align=\"center\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;border-bottom: 1px solid #666666;\">Product Name </td>
        
       

        <td width=\"20%\" height=\"35\" align=\"center\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;border-bottom: 1px solid #666666;\">Image </td>
        
        <td width=\"12%\" height=\"35\" align=\"center\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;border-bottom: 1px solid #666666;\">Quantity</td>
        
             <td width=\"12%\" height=\"35\" align=\"center\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;border-bottom: 1px solid #666666;\">Total Price(Rs)</td>
            <td width=\"12%\" height=\"35\" align=\"center\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;border-bottom: 1px solid #666666;\">Discount(%)</td>
             <td width=\"11%\" align=\"center\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;border-bottom: 1px solid #666666;\">Net Price</td>



           </tr>
";
}

       $tot=0;
	  
	      $rec=mysqli_query($con,"select * from tbl_cart where user_id='$fetch[0]'");
		  while($fetch_rec=mysqli_fetch_array($rec))
		  {
		      
		  $ship2=100;
		 if($fetch_rec[discount]!='' && $fetch_rec[deactive_discount]!='No')
	        {
            if($_SESSION['clr_price'][$id]!='')
            {

        $price=$_SESSION['clr_price'][$id];
            }
            else
            {
		  $price=$fetch_rec[price];
    }
		  /// $shipping=$ship+$fetch_rec[shipping_charge];
		  if($_REQUEST['promo_price']!='')
{
    $gift=$fetch_rec['gift_wrap'];
 $tot = $promo-$gift;
}
else
{
   $a=$fetch_rec[qty]*$price;
  $gst+=$a*$fetch_rec['gst']/100;
  $gstmain=$fetch_rec['gst'];
$tot=$tot + ($fetch_rec[qty]*$price);
}
$gift=$fetch_rec['gift_wrap'];
		     }else{
		  $gift=$fetch_rec['gift_wrap'];
           if($_SESSION['clr_price'][$id]!='')
            {

        $price=$_SESSION['clr_price'][$id];
            }
            else
            {
      $price=$fetch_rec[price];
    }
if($_REQUEST['promo_price']!='')
{
 $tot = $promo;

}
else

{
 $a=$fetch_rec[qty]*$price;
  $gst+=$a*$fetch_rec['gst']/100;
   $gstmain=$fetch_rec['gst'];
 $tot=$tot + ($fetch_rec[qty]*$price);
}
///$tot3=$tot + $shipping;
            }
				$aftrcpdisc=round($tot*$promodisc/100); 
$subprice=round($tot-$aftrcpdisc);
$prcaftrgst=round($subprice*$gstmain/100);
      //echo $qty;
      //echo $fetch_rec['stock_qty'];
      $rec1=mysqli_fetch_array(mysqli_query($con,"select * from tbl_product where id IN($fetch_rec[product_id])"));
      
      
     $deduct_qty= $rec1['stock_qty']-$fetch_rec['qty'];

     $q=mysqli_query($con,"update tbl_product set stock_qty='$deduct_qty' where id='$fetch_rec[product_id]'");
  $message.="<tr>
             <td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:20px;\">".$fetch_rec[product_name]."</td>";


    if($fetch_rec['color_id']!=0)
    {
        $message.="<td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; \"><img src='$baseurl/chowkdi_admin/upload/product/".$fetch_rec[product_image]."' height=75 width=70 border=0 style='padding-left:85px'/><br><span style='color:$fetch_rec[color_name]; font-size:18px;padding-left:60px;'>(".ucwords($fetch_rec[color_name]).")</span>";
    if($fetch_rec['size']!='')
    {
        $message .= "<br> <span style='color:font-size:15px;margin-left:-170px;'>Size : (".ucwords($fetch_rec[size]).")";
    }
    $message.="</td>";
    }
 else
 {
       $message.="<td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; \"><img src='$baseurl/chowkdi_admin/upload/product/".$fetch_rec[image]."' height=75 width=70 border=0 style='padding-left:85px'/> </td>";
 }

      
        
    
        
       
        
       
       $message.="<td align=\"center\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">".$fetch_rec[qty]."</td>
             <td align=\"center\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\"> Rs &nbsp;".round($fetch_rec[total_price])."</td>
             <td align=\"center\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\"> &nbsp;".round($fetch_rec[discount])."</td>

<td align=\"center\"style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\"> Rs &nbsp;".round($fetch_rec[qty]*$fetch_rec[total_price])."</td>

             
           </tr>";
		  }
          	  if($prm_row['promo_discount']!=""){
           $message.="<tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
         </table></td>
        </tr>
     
     <tr>
       <td height=\"25\" align=\"right\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">&nbsp;</td>
        </tr>
        <tr>
        <td height=\"25\" align=\"right\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Total Amount (Rs)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".round($total_prce)."</td>
        </tr>
       
        
     <tr>
<td height=\"25\" align=\"right\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Promo Discount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$promodisc."%(".round($tot*$promodisc/100).")</td></tr>    
     <tr>
	    <tr>
<td height=\"25\" align=\"right\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Subtotal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".round($tot-$tot*$promodisc/100)."</td></tr>    
  
             
             
               <tr>

             <td height=\"25\" align=\"right\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:16px;\">Shipping Charge &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$ship."</td></tr>

     
			
            <tr><td height=\"25\" align=\"right\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Grand Total (Rs)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".round($total_prce).".00</td>
        
         </tr>
<tr>
       <td height=\"25\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">Thank You Visit Again</td>
        </tr>
     <tr>
       <td height=\"25\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">Have a Nice Day</td>
        </tr>
   
    
      <tr>
       <td height=\"25\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">... </td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>"; 

}else{
      $message.="<tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
         </table></td>
        </tr>
     
     <tr>
       <td height=\"25\" align=\"right\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">&nbsp;</td>
        </tr>";
        

             if($_SESSION['coupon_code']!='')
                {
                	$message.="<tr><td height=\"25\" align=\"right\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Coupon Code &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$coupon_detail['coupon_code']."</td>
        
         </tr>
         <tr><td height=\"25\" align=\"right\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Coupon Amount &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$coupon_detail['coupon_amount'].".00</td>
        
         </tr>";
                }
        
        $message.="<tr>
        <td height=\"25\" align=\"right\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Total Amount (Rs)  &nbsp; : &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".round($total_prce).".00</td>
        </tr>";
       

        if($shipping_charge_rs>0)
        {
            $message.="<tr>
        <td height=\"25\" align=\"right\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Shipping Charge (Rs)  &nbsp; : &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".round($shipping_charge_rs).".00</td>
        </tr>";
        }
    
             
             
               $message.="<tr>

             
            
            
     
		
            <tr><td height=\"25\" align=\"right\" bgcolor=\"#d3ced5\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; font-weight:bold; padding-left:4px;\">Grand Total (Rs) &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".round($total_prce-$_SESSION['coupon_amount']+$shipping_charge_rs).".00</td>
        
         </tr>
<tr>
       <td height=\"25\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">Thank You Visit Again</td>
        </tr>
     <tr>
       <td height=\"25\" align=\"left\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">Have a Nice Day</td>
        </tr>
   
    
      <tr>
       <td height=\"25\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#333333; padding-left:4px;\">... </td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>"; 
}

       //$to = "amitkumarbaghpur@gmail.com";
       $to= "$data[email],webdemand@gmail.com";
        $subject="Shopping Details From CHOWKDI";  
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers.= "From:CHOWKDI\r\n";///////changes will be done
         $headers .="CHOWKDI,$data[email] \r\n";
        if($_SESSION['cart'][$id]!='')
        {
        @mail($to,$subject,$message,$headers); 
        }    
              
        } 
       $rec=mysqli_query($con,"update tbl_promocode set status='Expire' where user_id='$fetch[0]' and email='$_SESSION[user_id]' ");
         
    $ord_hist=mysqli_query($con,"update tbl_ordercust set status='Success' where  id='$_SESSION[ord_id]'");

$ord_detail=mysqli_query($con,"update tbl_orderdetails set status='Success' where user_id='$fetch[0]' and ord_id='$_SESSION[ord_id]'");

        $rec=mysqli_query($con,"delete from  tbl_cart where user_id='$fetch[0]'");
		$reprm=mysqli_query($con,"delete from tbl_promocode where user_id='$fetch[0]'");
      
       unset($_SESSION['coupon_code']);
      unset($_SESSION['coupon_amount']);
      unset($_SESSION['cart_value']); 
      unset($_SESSION['shopping_amt']);

       unset($_SESSION['coupon_id']);
       unset($_SESSION['coupon_status']);

      unset($_SESSION['cart']);

       unset($_SESSION['tot']);
   
   
 
?>
 <style>
        .top-menu{float: left!important;padding-top: 15px}
        .nav-menu li a{padding: 0;margin-left: 50px;color: #000;padding-left: 20px}
        .nav-menu li a{padding: 0;margin-left: 50px}
        .nav-item >a{line-height: normal!important}
        .nav-item {background: transparent}
        .nav-menu li.active a{padding: 0;margin-left: 50px}
        .nav-item{background: transparent!important}
        .main-menu li{border: none!important;padding-bottom:15px!important}
        .main-menu li.active{background:#fff!important;color: #000}
        .nav-item li:hover{color: coral}
        .nav-item .active {background: transparent!important}
        .nav-item > a:hover{color:#000!important;background: transparent!important}
        login-btn a:hover{color: darkorange!important}
       
        .textt h1{font-size: 40px;margin-left: 30px}
      .form-input{padding-top: 10px}
        .textt1-head h1{font-size: 40px!important;color: #fff}
        .header-topp{background: #fff!important;padding: 25px 0 15px 0;background: #183883!important;}
        .address-content strong{border-bottom: 2px solid #e2e2e2;padding: 10px  0}
        .address-content{padding: 40px 0}
        form{padding: 0}
           .footer-one{border-top: 5px solid #183883;}
     
    </style>
    <?php include("include/header.php");  ?>
     <!---  <div class="slider1">
<div class="container most">
<div class="slider">
  <img src="img/pay.jpg">
</div>
</div>
</div>-->
      <div class="wrapper-2" style="margin-top:120px;"> 
         
              <div style="margin-right:15px" class="row"> 
 
       
       <div class="container">
           <div class="row">
               <div class="col-sm-12">
                   <div class="text-payment">
                   <h1 style="font-size: 36px">Payment Status</h1>
                       <p style="text-align: center;padding: 0 100px">
                                    <center style="font-size: 20px;    color: #737373; line-height:24px;" >Thank you for placing your order with CHOWKDI, Your order has been submitted successfully,</br> <font color="black" style="font-weight: bold;">Please pay Through PAYTM or UPI on 9654780350 (Shivam Narula) and Send us a screenshot on whatsapp with Order ID.</br>For COD Please Inform us on Whatsapp by clicking on Whatsapp Symbol.</font>

<br>
You will receive an order confirmation to the email address you listed on your order form !!
<br/>
<br>
Your Order Id is:  <strong style="color:#000;">CHOWKDI<?php echo $_SESSION['ord_id']; ?></strong>

<br>
<br><strong><h3>HAPPY SHOPPING !!!</h3></strong></br>

                           </p>
                     
                   
                   </div>
              </div>
         </div>
   </div></div></div>
       
       <?php  include("include/footer.php");  ?>
  
