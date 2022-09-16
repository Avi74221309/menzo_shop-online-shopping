<?php  
error_reporting(0);
session_start();
include("chowkdi_admin/config/connection.php");
include('include/page_url.php'); 
	if($_GET[id]!='')
	{  
	$info=mysqli_fetch_array(mysqli_query($con,"select t1.* , t2.* from tbl_ordercust as t1, tbl_billing as t2 where t1.id = t2.order_id and t1.id='$_GET[id]'"));
	//echo "select t1.* , t2.* from tbl_ordercust as t1, tbl_billing as t2 where t1.id = t2.order_id and t1.id='$_GET[id]'";
	$info2=mysqli_fetch_array(mysqli_query($con,"select t1.* , t2.* from tbl_ordercust as t1,  tbl_billing as t2 where t1.id = t2.order_id and t1.id='$_GET[id]'"));
		//echo "select t1.* , t2.* from tbl_ordercust as t1,  tbl_billing as t2 where t1.id = t2.order_id and t1.id='$_GET[id]'";	die();	
	}
	
	
	//echo $_SESSION['size'][$id];die;


?>
<!doctype html>

<html lang="en">


<head>
      	<title>Chowkdi </title>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!--meta info-->

	
		<!--stylesheet include-->

		<link rel="stylesheet" type="text/css" media="all" href="css/colorpicker.css">

		<link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css">

		<link rel="stylesheet" type="text/css" media="all" href="css/settings.css">

		<link rel="stylesheet" type="text/css" media="all" href="css/owl.carousel.css">

		<link rel="stylesheet" type="text/css" media="all" href="css/owl.transitions.css">

		<link rel="stylesheet" type="text/css" media="all" href="css/jquery.custom-scrollbar.css">

		 <link rel="stylesheet" type="text/css" media="all" href="css/style.css">

		<!--font include-->

		<link href="css/font-awesome.min.css" rel="stylesheet">

		<script src="js/modernizr.js"></script>

	</head>
    

<body style="background-color:#fffFFF;"><br>

<div>      
     
    
<strong><h3>Order Details </h3></strong>				
			
				
		
		
				
							<table width="100%" border="0px" cellspacing="0" cellpadding="0">
<tr>
                                  <td background="" style="background-repeat:repeat-x;" height="40" class="head_pro"></td>
                                </tr>
          <tr>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr >
        <td height="15" bgcolor="#000000" class="pro_name" style="color:#00000;"><strong><font color="#fffFFF">Billing Details </font></strong></td>
      </tr>
      <tr>
             <td>&nbsp;</td>
             </tr>
      <tr style="border:#666666 solid 1px;">
        <td><table width="100%" border="0" cellspacing="1" cellpadding="0">
        
          <tr>
             <td height="30" align="left" bgcolor="#fff" bordercolor="000" class="heading-info" style="text-align:left;">Name</td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">&nbsp;<?php echo $info['name'];?></td>
            <td width="233" height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">Order ID </td>
            <td width="260" height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info[ord_id];?></td>
          </tr>
          <tr>
             <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">Mobile</td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info[mobile];?></td>
            <td width="233" height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">City</td>
            <td width="260" height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info[city];?></td>
         </tr>
          <tr>
           <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">Email</td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info[email];?></td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">Address</td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info[address];?></td>
           
          </tr>
          <tr>
           <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">Pin Code</td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info[pincode];?></td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">State</td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info[state];?></td>
            </tr>
            <tr>
            
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">country</td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info[country];?></td>
           
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
     
	  
      <tr>
        <td height="1" class="pro_name" style="color:#000000; " bgcolor="#000000" ><strong><font color="#fffFFF">Shipping  Details</font></strong> </td>
      </tr>
      <tr>
             <td>&nbsp;</td>
             </tr>
      <tr style="border:#666666 solid 1px;" >
        <td><table width="100%" border="0" cellspacing="1" cellpadding="0" >
         
          <tr>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">Name</td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">&nbsp;<?php echo $info2[name];?></td>
            <td width="232" height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">Order ID </td>
            <td width="260" height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info2[ord_id];?></td>
          </tr>
          <tr>
             <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">Mobile</td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info2[mobile];?></td>
          <td width="232" height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">City</td>
            <td width="260" height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info2[city];?></td>
             </tr>
          <tr>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">Address</td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info2[address];?></td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">Pin Code</td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info2[pincode];?></td>
          </tr>
          <tr>
           <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">State</td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info2[state];?></td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;">country</td>
            <td height="30" align="left" bgcolor="#fff" class="heading-info" style="text-align:left;"><?php echo $info2[country];?></td>
           
          </tr>
        </table></td>
      </tr>
     <tr>
        <td>&nbsp;</td>
      </tr>
    
      <tr>
	     <td height="25" ><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:#666666 solid 1px;  ">
           <tr style=" padding:6px;" >
            <td width="16%" align="center" bgcolor="#000000" class="pro_name" style="border-bottom: 1px solid #666666;"><font color="#fffFFF">Image</font></td>
             <td width="11%" height="20" align="center" bgcolor="#000000" class="pro_name" style="border-bottom: 1px solid #666666;"><font color="#fffFFF">Product Name</font></td>
              
              <td width="15%" height="20" align="center" bgcolor="#000000" class="pro_name" style="border-bottom: 1px solid #666666;"><font color="#fffFFF">Quantity</font></td>
               
                <td width="15%" height="20" align="center" bgcolor="#000000" class="pro_name" style="border-bottom: 1px solid #666666;"><font color="#fffFFF">MRP</font></td>
                <td width="11%" height="20" align="center" bgcolor="#000000" class="pro_name" style="border-bottom: 1px solid #666666;"><font color="#fffFFF">Discount(%)</font></td>
             <td width="13%" height="20" align="center" bgcolor="#000000" class="pro_name" style="border-bottom: 1px solid #666666;"><font color="#fffFFF">Net  Price</font></td>
           </tr>
          
           <?php 
	       $shipping_price = 0;
		   $sqlprice=mysqli_query($con,"select * from tbl_orderdetails where ord_id='$_GET[id]'");
		   
		   while($deal_data=mysqli_fetch_array($sqlprice))
		   {
		   
		      
			 $amount=$deal_data['price']*$deal_data['qty'];
			 $coupon_code=$deal_data['coupon_code'];
			 $coupon_amount = $deal_data['coupon_amount'];
			 $shipping_price += $deal_data['shipping_charge'];
			 
		 $dis_price=$amount-($amount*$deal_data['discount']/100);
	
			 $des=($deal_data['price']*$deal_data['discount'])/100;
$dprice=$deal_data['price']-$des;

			$sql="select * from tbl_shop_product where id='".$deal_data['product_id']."'";
			
			$res=mysqli_query($con,$sql);
			$result=mysqli_fetch_array($res);
			 $tot=0;
		   //echo "select * from tbl_orderdetails where ord_id='$_GET[id]";
		   $sqlprice1=mysqli_query($con,"select * from tbl_orderdetails where ord_id='$_GET[id]'") or die(mysql_error());
       
		   while($deal_data1=mysqli_fetch_array($sqlprice1))
		   {
			if($deal_data1['discount']!='')
	        {
			
		      $price1=$deal_data1['price']-($deal_data1['price']*$deal_data1['discount']/100);
			 $price=$deal_data1['qty']*$price1;
			$tot+=$price;
		     }
			 else
			 {
			
		     $price=$deal_data1['price']*$deal_data1['qty'];
		     $tot+=$price;
            }
			
		   ?><?php } ?>
           
           <tr>
             <td>&nbsp;</td>
             </tr>
           <tr>

              <?php
              if($deal_data['color_id']!=0)
              {
                  ?>
                                <td align="center" >
                   <img src="<?=$baseurl?>/chowkdi_admin/upload/product/<?php echo $deal_data['product_image'];  ?>" width="75" height="75"><br>
                    <span style="color:<?=$deal_data['color_name']?>; font-size:18px;padding-left:50px;">(<?=ucwords($deal_data['color_name'])?>)</span>
                    
                    <?php
                    if($deal_data['size']!='')
                    {
                        ?>
                        <br>
                        <span style="font-size:15px;padding-left:50px;">Size : (<?=ucwords($deal_data['size'])?>)</span>
                        <?php
                    }
                   ?>
            
             </td>
                  <?php
              }
                  else
                  {
                      ?>
                                    <td align="center" >
                       <img src="<?=$baseurl?>/chowkdi_admin/upload/product/<?php echo $deal_data['image'];  ?>" width="75" height="75"><br>
                       
            
             </td>
          <?php
                  }
              
              ?>
             <td class="heading-info" align="center" style="padding-left:30px;" > <?php echo ucwords($deal_data['product_title']);?> </td>
           
             
               <td align="center"  class="heading-info" style="padding-left:20px;"><?php echo $deal_data['qty'];?></td>
               
           
             <td align="center" class="heading-info" style="padding-left:20px;"><span><?php echo $deal_data['currency'];?><?php echo $deal_data['price'];?></span></td>
             <td align="center" class="heading-info" style="padding-left:20px;"><?php echo round($deal_data['discount']);?></td>
              <td align="center" class="heading-info" style="padding-left:20px;"><span>Rs. <?php echo $deal_data['mrp'] ;?>.00</span></td>
             
           </tr>
          <?php }

 $sqlprice5=mysqli_query($con,"select * from tbl_orderdetails where ord_id='$_GET[id]'");
       while($deal_data5=mysqli_fetch_array($sqlprice5))
       {
        $total_price_dt += $deal_data5[qty]*$deal_data5[mrp];
       }

          ?>
           
           <tr>
                   
                   <?php
                   if($coupon_code!='')
                   {
                       ?>
                       <td style="width:25%;"><strong style="color:#000;"> Coupon Code : <span><?=$coupon_code?></span></strong></td>
                       <td style="width:25%;"><strong style="color:#000;">Coupon Amount : <?=round($coupon_amount).'.00'?></strong></td>
                      
                      
                       <?php
                   }else
                   {
                   ?>
                <td>&nbsp;</td>
                
                
             <td nowrap="nowrap" class="bill-heading" ></td>
             <?php }
             if($shipping_price>0)
             {
             
             ?>
              <td style="width:25%;"><strong style="color:#000;">Shipping Charge : <?=round($shipping_price).'.00'?></strong></td>
             <?php } ?>
         <td nowrap="nowrap" class="pro_name" style="width:25%;" ><strong style="color:#000;">Total Price:<?php echo round($total_price_dt-$coupon_amount+$shipping_price).'.00'; ?></strong></td>
           </tr>
           
         </table></td>
        </tr>
     
      
    </table>
                   
                    
  </tr>
  
        </table>
														
			
					
				
                    
                 
					
					
			
			


	</div>
	
</body>

</html>
