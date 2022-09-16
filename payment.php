<?php

@session_start();

include("chowkdi_admin/config/connection.php");

$currency3 = 'Rs';

if(isset($_SESSION['user_id']))
  {
    $sql=mysqli_query($con,"select * from tbl_reg_mst where email='$_SESSION[user_id]'");
    
    $fetch=mysqli_fetch_array($sql);
  }else{
    
    //$_SESSION[user_id]='no';
    header("location:registeration");
   
  }



if(@$_SESSION['cart'][$id]==''){
header("location:product");
      
 
}

     
include("include/header.php");



@$_SESSION['cart'][$id];


?>
<!--<div class="slider1">
<div class="container most">
<div class="slider">
  <img src="img/safe-payment.jpg" class="img-responsive">
</div>
</div>
</div>    
     -->
 <head>
   <style type="text/css">

.none table tr td 
{
border-color: #fff;
}

 </style>
 </head> 
 <br>
 <br>
 <br>


         <div class="container" style="">
 
         <div class="row">

         <div class="box-heading" style="color:#FFFFFF"><h3 >Payment</h3></div>
          <div id="column-left" class="col-md-12 col-sm-12 col-xs-12 none">
             <form action="<?=$baseurl?>/pay/pay.php" method="post">  <table width="95%" border="0" cellspacing="0" cellpadding="0">
              <tr><td height="5"></td></tr>
               <tr>
                <tr>
                 <td  style="border: #999999 solid 1px;padding: 14px 0px 0;font-size: 16px;">
      <table width="100%" style="border-color:#fff;" cellspacing="0" cellpadding="0" >
           
             <tr>
                <td width="35%" bgcolor="#fff" class="cart-head" height="30" align="left"><strong>&nbsp;<font color="#000">Product Name</font></strong></td>
                <td width="30%" bgcolor="#fff" class="cart-head" style="padding-left:3px;"><strong><font color="#000">Unit Price(<?php echo @$currency3; ?>)</font></strong></td>
                <td width="15%" bgcolor="#fff" class="cart-head"><strong><font color="#000">Qty</font></strong></td>
                <td width="20%" bgcolor="#fff" class="cart-head"><strong><font color="#000">Subtotal(<?php echo @$currency3; ?>)</font></strong></td>
              </tr> 
              
      <?php 
     
      
        $total_price=0;
        $shipping_charge = 0;
      foreach(@$_SESSION['cart'][$id] as $ids)
      {
       
        $product_cart = mysqli_fetch_array(mysqli_query($con,"select * from tbl_cart where id='".(int)$ids."' and user_id='".$fetch[0]."'"));

        $rec=mysqli_query($con,"select * from tbl_product where id='".(int)$product_cart['product_id']."'");

        $fetch_rec=mysqli_fetch_array($rec);
         
         @$total = $product_cart[total_price]*$product_cart[qty];
         $total_price += $total;
         $shipping_charge += $product_cart['shipping_price'];



      ?> 
            <tr>
             <td align="center" height="">&nbsp;</td>
              </tr>
               <tr>
                   <?php
                   if($product_cart['color_id']!=0)
                   {
                       ?>
                        <td height="60" valign="top" align="left"><?php if($fetch_rec['image']!='') { ?><img src="<?=$baseurl?>/chowkdi_admin/upload/product/<?php echo $product_cart['product_image'];?>" height="50px" width="50" style="margin-top: -14px;" /><?php } ?> <?php echo $fetch_rec['product_name'];?>
                      
                        <br>
                        <span style="color:<?=$product_cart['color_name']?>; font-size:18px;padding-left:50px;">(<?=ucwords($product_cart['color_name'])?>)</span>
                    
                          <?php
                                            if($product_cart['size']!='')
                                            {
                                                ?>
                                            <br><span style="font-size:15px; padding-left:50px;">(<?=ucwords($product_cart['size'])?>)</span>
                                            <?php }
                                            ?>
                        </td>
                       <?php
                   }
                   else
                   {
                       ?>
                        <td height="60" valign="top" align="left"><?php if($fetch_rec['image']!='') { ?><img src="<?=$baseurl?>/chowkdi_admin/upload/product/<?php echo $fetch_rec['image'];?>" height="50px" width="50" style="margin-top: -14px;" /><?php } ?> <?php echo $fetch_rec['product_name'];?></td>
                       <?php
                   }
                   ?>
                   
               

                <td valign="top"   style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;" style="padding-left:10px;"><span class="login-txt1"><?php echo $currency3; ?>  <?php echo $product_cart['total_price']." "; ?></span></td>
                <td valign="top"   style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;" style="padding-left:5px;"><span class="login-txt1"><?php echo $product_cart['qty'] ?></span></td>
             
                
                <td valign="top"   style="font-family:Arial, Helvetica, sans-serif; ccolor:black;font-size:14px;"><span class="login-txt1"> <?php   echo $total." ";   ?> </span></td>
              </tr>
            
              <tr>
                <td colspan="6" height="1" ></td>
              </tr>
             
              <?php @$total2[] = $s2*$price;

              }
                 @$_SESSION['total_price']=$total_price;  
               ?>
            </table> 
           </td>
          </tr>
            <tr>
            <td align="center" height="30">&nbsp;</td>
            </tr>
       <tr>
            <td align="right" height="30" style="border:#999999 solid 1px; padding:0px;"><table width="100%" border="0" cellspacing="0" cellpadding="5">
  <?php
          $bill=mysqli_fetch_array(mysqli_query($con,"select * from tbl_billing where order_id='$_SESSION[ord_id]'"));
     
          $ship=mysqli_fetch_array(mysqli_query($con,"select * from tbl_shipping where order_id='$_SESSION[ord_id]'"));
          //print_r($bill);
  ?>
      <tr >
        <td style="padding-left: 80px;" width="50%" bgcolor="#000" class="cart-head" height="30px" align="left"><strong><font color="#FFFFFF">Billing Details </font></strong></td>
        <td width="50%" bgcolor="#000" class="cart-head" height="30px" align="left"><strong>&nbsp;<font color="#FFFFFF">Shipping Details </font></strong></td>
      </tr>
      <tr >
        <td style="padding-left: 80px; padding-top:20px;" height=""><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="39%" height="35"   style="font-family:Arial, Helvetica, sans-serif;background-color:#fff; color:#000; font-size:14px;" align="left"> Name</strong></td>
            <td width="61%"   style="font-family:Arial, Helvetica, sans-serif; color:#000;background-color:#fff; font-size:14px;" align="left"><?php echo $bill['name'];?></td>
          </tr>
        
          <tr>
            <td   style="font-family:Arial, Helvetica, sans-serif; background-color:#fff; color:#000; font-size:14px;" height="35"  align="left"> Address</strong></td>
            <td   style="font-family:Arial, Helvetica, sans-serif; background-color:#fff; color:#000; font-size:14px;" align="left"><?php echo $bill['address'];?></td>
          </tr>
          <tr>
            <td bgcolor="#F4F4F4" height="35"    style="font-family:Arial, Helvetica, sans-serif;background-color:#fff; color:#000; font-size:14px;" align="left"> City</strong></td>
            <td   style="font-family:Arial, Helvetica, sans-serif; background-color:#fff; color:#000; font-size:14px;" bgcolor="#F4F4F4" align="left"><?php echo $bill['city'];?></td>
          </tr>
          <tr>
            <td   style="font-family:Arial, Helvetica, sans-serif;background-color:#fff; color:#000; font-size:14px;" height="35"  align="left"> PinCode</strong></td>
            <td   style="font-family:Arial, Helvetica, sans-serif; background-color:#fff; color:#000; font-size:14px;" align="left"><?php echo $bill['pincode'];?></td>
          </tr>
      <tr>
            <td bgcolor="#F4F4F4"  height="35"   style="font-family:Arial, Helvetica, sans-serif; background-color:#fff; color:#000; font-size:14px;" align="left"> State</strong></td>
            <td   style="font-family:Arial, Helvetica, sans-serif; background-color:#fff; color:#000; font-size:14px;" bgcolor="#F4F4F4" align="left"><?php echo $bill['state'];?></td>
          </tr>
         <tr>
            <td bgcolor="#F4F4F4"  height="35"   style="font-family:Arial, Helvetica, sans-serif; background-color:#fff; color:#000; font-size:14px;" align="left"> Country</strong></td>
            <td   style="font-family:Arial, Helvetica, sans-serif; color:#000; font-size:14px;" bgcolor="#fff" align="left"><?php echo $bill['country'];?></td>
          </tr>
          <tr>
            <td bgcolor="#fff"  height="35"   style="font-family:Arial, Helvetica, sans-serif; color:#000; font-size:14px;" align="left"> Mobile</strong></td>
            <td   style="font-family:Arial, Helvetica, sans-serif; color:#000; font-size:14px;" bgcolor="#fff" align="left"><?php echo $bill['mobile'];?></td>
          </tr>
          <tr >
            <td   style="font-family:Arial, Helvetica, sans-serif; color:#000; padding-bottom: 20px; background-color:#fff; font-size:14px;" height="35"  align="left"> Email</strong></td>
            <td   style="font-family:Arial, Helvetica,  sans-serif;background-color:#fff; padding-bottom: 20px; color:#000; font-size:14px;" align="left"><?php echo $bill['email'];?></td>
          </tr>
        </table></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="35%"   style="font-family:Arial, Helvetica, sans-serif;background-color:#fff; color:#000; font-size:14px;" height="35"  align="left"> Name</strong></td>
            <td width="65%"   style="font-family:Arial, Helvetica, sans-serif; background-color:#fff; color:#000; font-size:14px;" align="left"><?php echo $ship['name'];?></td>
          </tr>
        
          <tr>

            <td   style="font-family:Arial, Helvetica, sans-serif; background-color:#fff; color:#000; font-size:14px;" align="left" height="35" > Address</strong></td>
            <td   style="font-family:Arial, Helvetica, sans-serif;background-color:#fff; color:#000; font-size:14px;" align="left"><?php echo $ship['address'];?></td>
          </tr>
          <tr>
            <td bgcolor="#Fff"   style="font-family:Arial, Helvetica, sans-serif; color:#000; font-size:14px;"  height="35" align="left"> City</strong></td>
            <td   style="font-family:Arial, Helvetica, sans-serif;background-color:#fff; color:#000; font-size:14px;" bgcolor="#F4F4F4" align="left"><?php echo $ship['city'];?></td>
          </tr>
          <tr>
            <td   style="font-family:Arial, Helvetica, sans-serif; background-color:#fff;color:#000; font-size:14px;" align="left" height="35" > PinCode</strong></td>
            <td   style="font-family:Arial, Helvetica, sans-serif;background-color:#fff; color:#000; font-size:14px;" align="left"><?php echo $ship['pincode'];?></td>
          </tr>
          <tr>
            <td bgcolor="#fff"   style="font-family:Arial, Helvetica, sans-serif; color:#000; font-size:14px;" height="35"  align="left"> State</strong></td>
            <td   style="font-family:Arial, Helvetica, sans-serif; background-color:#fff; color:#000; font-size:14px;" bgcolor="#F4F4F4" height="35"  align="left"><?php echo $ship['state'];?></td>
          </tr> 
           <tr>
            <td bgcolor="#F4F4F4"   style="font-family:Arial, Helvetica, sans-serif;background-color:#fff; color:#000; font-size:14px;" height="35"  align="left"> Country</strong></td>
            <td   style="font-family:Arial, Helvetica, sans-serif; background-color:#fff; color:#000; font-size:14px;" bgcolor="#F4F4F4" height="35"  align="left"><?php echo $ship['country'];?></td>
          </tr> 
         
          <tr>
            <td bgcolor="#fff"   style="font-family:Arial, Helvetica, sans-serif; color:#000; font-size:14px;"  height="35" align="left"> Mobile</strong></td>
            <td   style="font-family:Arial, Helvetica, sans-serif; color:#000; font-size:14px;" bgcolor="#fff" align="left"><?php echo $ship['mobile'];?></td>
          </tr>
          <tr>
            <td   style="font-family:Arial, Helvetica, sans-serif;background-color:#fff; color:#000; font-size:14px;" height="35" >&nbsp;</td>
            <td   style="font-family:Arial, Helvetica, sans-serif; background-color:#fff; color:#000; font-size:14px;">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
          </tr>
           <tr>
            <td>&nbsp;</td>
          </tr>
        </div>

<div class="col-md-4" >
  <table width="96%">
    <tbody style="float:right;">
          <tr>
            <td align="right" class="sriram1" height="30" style="font-family:Arial, Helvetica, sans-serif; 
    font-size: 16px;color:#fff;"><strong style="color:#000;">Amount (Rs.): <?php echo round($total_price
    ).".00";  ?></strong>&nbsp;&nbsp;</td>
          </tr>
           <?php
                      if($_SESSION['coupon_amount']>0 && $_SESSION['cart_value']>=$_SESSION['shopping_amt'])
                      {
                      ?>
          <tr>
            <td align="right" class="sriram1" height="30" style="font-family:Arial, Helvetica, sans-serif; 
    font-size: 16px;"><strong style="color:#000;">Coupon Amount : <?php echo round($_SESSION['coupon_amount']).'.00';  ?></strong>&nbsp;&nbsp;</td>
          </tr>
          
          <?php }
          if($shipping_charge>0)
          {
          ?>
          <tr>
            <td align="right" class="sriram1" height="30" style="font-family:Arial, Helvetica, sans-serif; 
    font-size: 16px;"><strong style="color:#000;">Shipping Charge (Rs.): <?php echo round($shipping_charge).".00";  ?></strong>&nbsp;&nbsp;</td>
          </tr>  
          <?php } ?>
        <input type="hidden" name="total_amount" value="<?=round($total_price+$shipping_charge-$_SESSION['coupon_amount']).'.00';?>">
          <tr>
            <td align="right" class="sriram1" height="30" style="font-family:Arial, Helvetica, sans-serif; 
    font-size: 16px;"><strong style="color:#000;">Total Amount (Rs.): <?php echo round($total_price+$shipping_charge-$_SESSION['coupon_amount']).".00";  ?></strong>&nbsp;&nbsp;</td>
          </tr>
            
          <tr>
            <td align="right"> <input type="submit" name="payment" value="Submit Order"   style="    display: inline-block;
    padding: 13px 25px;
    background:#000;
    color: #FFF;
    font-size: 1em;
    line-height: 18px;
    text-transform: uppercase;
    border: none;
    outline: none;
    transition: 0.2s;
    -webkit-transition: 0.2s;"></td>
          </tr>
      <tr>
      <td height="10"></td>
      </tr>
    </tbody>
      </table>
</div>
        
            </form>
          </div>
        </div></div></div>
    
<?php include("include/footer.php");?>
