<?php 
ob_start();
include('include/header.php');



$session_id = session_id();

if($_GET['cart']=='y')
{
  echo "<script>window.location.href='customer-information'</script>";
}

  //$_SESSION['pro_ids']; 


$user=$_SESSION['user_id'];

$get_user_dt = mysqli_real_escape_string($con,$user); 
$user_dt = mysqli_fetch_array(mysqli_query($con,"select * from tbl_reg_mst where email='".$get_user_dt."' and status='active'"));

@$id = $_REQUEST['product_id'];
@$qty = (int)$_REQUEST['qty'];
@$color_id = (int)$_REQUEST['color_id'];
@$color_name = $_REQUEST['colors_name'];
@$image_name = $_REQUEST['image_name'];
@$size = mysqli_real_escape_string($con,$_REQUEST['size']);
@$stockqty = $_REQUEST['stock_qty'];
@$url = $_REQUEST['url'];
@$shipping_price = $_REQUEST['shipping_price'];
if($qty>$stockqty)

  {
$urls = $baseurl.'/details/'.$url;

echo "<script>alert('This quantity is out of stock..');
window .location.href='$urls';
</script>";

}
else
{
$qty_query = mysqli_fetch_array(mysqli_query($con,"select * from tbl_product where id='".(int)$id."'"));
@$total_price = $_REQUEST['total_price'];


/*
if($qty > $qty_query['stock_qty'])
{


echo "<script>alert('This quantity is out of stock..');

window .location.href='products/".$qty_query[url].".html';
</script>";

}
else
{*/
if($id!='' && $qty>0)
{
    $tbl_cart1 = mysqli_query($con,"select * from tbl_cart where product_id = '".(int)$id."' and session_id='$session_id'");
  if(mysqli_num_rows($tbl_cart1)>0)
  { 
  //  echo "update tbl_cart set user_id = '$_SESSION[id]',product_name = '$qty_query[product_name]',price='$qty_query[product_price]',discount='$qty_query[discount]',total_price='$total_price',image='$qty_query[image]',qty='$qty',gst='$qty_query[gst]' where product_id = '".(int)$id."' and session_id='$session_id'"; die;

$tbl_cart=mysqli_query($con,"update tbl_cart set user_id = '$_SESSION[id]',product_name = '$qty_query[product_name]',price='$qty_query[product_price]',discount='$qty_query[discount]',total_price='$total_price',image='$qty_query[image]',product_image='".$image_name."',shipping_price='".$shipping_price."',color_name='".$color_name."',color_id='".$color_id."',size='".$size."',qty='$qty',gst='$qty_query[gst]' where product_id = '".(int)$id."' and session_id='$session_id'");

   }
   else
   {
       
    @$ur_id = (int)$_SESSION['id'];
$tbl_cart=mysqli_query($con,"INSERT INTO `tbl_cart`(`session_id`, `user_id`, `ord_id`, `product_id`, `product_name`, `discount`, `price`,`shipping_price`, `gst`, `qty`, `total_price`, `add_date`, `image`,`product_image`,`color_name`,`size`,`color_id`,`tracking_id`,`taxn_id`)
    values ('$session_id','$ur_id','0','$id','$qty_query[product_name]','$qty_query[discount]','$qty_query[product_price]','".$shipping_price."','$qty_query[gst]','$qty','$total_price',now(),'$qty_query[image]','$image_name','$color_name','$size','$color_id','','')");
   
}
}
 
if($_REQUEST['product_id']!='')
{
    header('location:cart');
    
}

 ?>
      <!-- end Header Area -->
      <main>
                    
			   <section class="breadcrumb-area" style="background-image: url(<?=$baseurl?>/img/about-banner.jpg);">
			       
                           <div class="breadcrumb-bottom">
                              <div class="container">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="left text-center">
                                          <ul>
                                             <li><a href="<?=$baseurl?>">Home</a></li>
                                             <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                             <li class="active"> Cart </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                       
                    
				 
				   
				   
				  </section>
				  
				  
				  <section class="heading">
				  <div class="container">
                   <div class="row">
                  <div class="col-12">
                     <!-- section title start -->
                     <div class="section-title text-center">
                        <h2 class="title"> Cart </h2>
                         
                     </div>
                     <!-- section title start -->
                  </div>
               </div>
			   </div>
			   </section>
			   
			   <div class="cart-main-wrapper section-padding" style="padding-top:0px;">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">

  
                                <table class="table table-bordered">
                                     <?php
$product=mysqli_query($con,"select * from tbl_cart where session_id='".$session_id."'");
//$_SESSION['cart']=mysqli_num_rows($product);

if(mysqli_num_rows($product)==0)
{
  echo "<center><h2>Cart is Empty</h2></center>";
  echo "<br><br><br>"; 
}
else
{


  ?>

                                                                   <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Thumbnail</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                            <th class="pro-remove">Remove</th>
                                        </tr>
                                    </thead>
                                   <form method="post" action="<?=$baseurl?>/cart1">             
                                    <tbody>
                                       <?php
 $pro_id = array();
 $total=0;

while($pro_list = mysqli_fetch_array($product))
{

  if($user!='')
{
 
  mysqli_query($con,"update tbl_cart set user_id='".(int)$user_dt[0]."' where product_id = '".$pro_list[0]."'");
}



@$subtotal = $pro_list['qty']*$pro_list['total_price'];

@$total[] = $pro_list['qty']*$pro_list['total_price'];

$total +=$subtotal;

$pro_id[]=$pro_list[0];

 ?>                            
                                        <tr>
                                            <?php
                                            if($pro_list['color_id']!=0)
                                            {
                                                ?>
                                            
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$pro_list['product_image'];?>" alt="Product"><br><span style="color:<?=$pro_list['color_name']?>; font-size:18px;">(<?=ucwords($pro_list['color_name'])?>)</span></a></td>
                                            <?php 
                                                
                                            } 
                                            else
                                            {
                                                ?>
                                            
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$pro_list['image'];?>" alt="Product"></a></td>
                                            <?php } ?>
                                            
                                            <td class="pro-title"><a href="#"> <?=$pro_list['product_name'];?> </a>
                                            <?php
                                            if($pro_list['size']!='')
                                            {
                                                ?>
                                            <br><span style="font-size:15px;">(<?=ucwords($pro_list['size'])?>)</span>
                                            <?php }
                                            ?>
                                            </td>
                                            <td class="pro-price"><span> Rs. <?=$pro_list['total_price']?>.00</span></td>
                                            <td class="pro-quantity">
                                              <input type="hidden" name="cart_id[]" value="<?=$pro_list[0]?>">
                                                <div class="pro-qty"><span class="dec qtybtn"></span><input min="1" max="100" value="<?=$pro_list['qty']?>" type="number" name="qty[]" ><span class="inc qtybtn"></span></div>
                                            </td>
                                            <td class="pro-subtotal"><span> Rs. <?=round($pro_list['total_price']*$pro_list['qty'])?>.00</span></td>
                                            <td class="pro-remove"><a href="cart1?action=Remove&prod_id=<?php echo $pro_list[0];?>"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                       <?php
                            }
                            $_SESSION['cart'][$id]=$pro_id;

$gst = $total/100*18;
$_SESSION['gst']=round($gst);
$_SESSION['subtotal']=$total;
$_SESSION['final_total']=round($total);

                            ?>

                                
                                    </tbody>
                                <?php } ?>
                                </table>
                                
                            </div>
                            </div>
                              <?php
                              
			      $product_cart=mysqli_query($con,"select * from tbl_cart where session_id='".$session_id."'");
//$_SESSION['cart']=mysqli_num_rows($product);
if(mysqli_num_rows($product_cart)>0)
{
    while($product_cart_list = mysqli_fetch_array($product_cart))
    {
        $total_cart_value += $product_cart_list['qty']*$product_cart_list['total_price'];
        $ship_price +=  $product_cart_list['shipping_price'];
    }
    
			           ?>
			       
			        <div class="col-lg-4 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper" style="margin-top: 0px;">
                                <div class="cart-calculate-items">
                                    <h6>Cart Totals</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody><tr>
                                                
                                                <td>Sub Total</td>
                                                <td> Rs. <?=round($total_cart_value);?>.00</td>
                                            </tr>
                                            <?php
                                            if($_SESSION['coupon_amount']!='')
                                            {
                                                if($_SESSION['shopping_amt']>$total_cart_value)
                                                {
                                unset($_SESSION['coupon_code']);
                                unset($_SESSION['coupon_amount']);
                                unset($_SESSION['cart_value']); 
                                unset($_SESSION['shopping_amt']);
                                unset($_SESSION['coupon_id']);
                                unset($_SESSION['coupon_status']);
                                                }
                                                ?>
                                            
                                            <tr>
                                                <td>Coupon Amount</td>
                                                <td>Rs. <?=$_SESSION['coupon_amount'];?>.00</td>
                                            </tr>
                                            <?php }
                                            if($ship_price>0)
                                            {
                                            ?>
                                            <tr class="total">
                                                <td>Shipping Price</td>
                                                <td class="total-amount">Rs. <?=round($ship_price);?>.00</td>
                                            </tr>
                                            <?php } ?>
                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount">Rs. <?=round($total_cart_value+$ship_price-$_SESSION['coupon_amount']);?>.00</td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                </div>
                                
                                <a href="<?=$baseurl?>/customer-information" class="btn btn-sqr d-block" style="color:#fff;font-size:20px;">Proceed Checkout</a>
                            </div>
                             </div>
                              </div>
                            <?php } ?>
                            <?php
                            $update_cart=mysqli_query($con,"select * from tbl_cart where session_id='".$session_id."'");
//$_SESSION['cart']=mysqli_num_rows($product);

if(mysqli_num_rows($update_cart)>0)
{
 ?>              
 
 <div class="row">
                            <div class="col-md-6 cart_submit pull-right" style="padding-top: 30px;">
                                <button type="submit" name="submit" class="btn btn-cart2" style="background-color: green;">update cart</button>
                            </div>
                            </form>
                             <div class="col-md-6">
                              <div class="cart-calculator-wrapper" style="background-color:#fff;">
                                <form method="post" action="<?=$baseurl?>/check_coupon">
            <div class="row">
                <div class="col-md-8">
                      <input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code" id="coupon" style=" height: 40px;" required>
            <input type="hidden" name="cart_value" value="<?=round($total)?>" id="cart_value">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-cart2" type="submit" id="apply_coupon_code" name="check_coupon">
              Apply coupon
            </button>
                </div>
            </div>
            </form>
          
          <div id="status" style="font-size:18px;"><?=$_SESSION['coupon_status']?></div>
         
          
          
           </form>
           <br>
                        </div>   
                             </div>
                             
                            </div>
                          
                            <!-- Cart Update Option -->
   <?php } ?>                 
   
   
   
                        </div>
						
					
						   
                </div>
            </div>
        </div>
			
       
      </main>
      <!-- Scroll to top start -->
      <div class="scroll-top not-visible">
         <i class="fa fa-angle-up"></i>
      </div>
      <!-- Scroll to Top End -->
      <!-- footer area start -->

         
     <?php } include('include/footer.php'); ?>