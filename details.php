<?php 
include('include/header.php'); 
$pages_url = explode('/',$_SERVER['REQUEST_URI']);

if(count($pages_url)<4)
{
header('location:'.$baseurl.'/product');
}

if($_GET['cid']!='')
{
  
  $colors_pro_name = mysqli_fetch_array(mysqli_query($con,"select * from tbl_color where id='".base64_decode($_GET['cid'])."' and status='Active'"));
  $pro_gets = explode('?',$pages_url[3]);
  $product_url = mysqli_real_escape_string($con,$pro_gets[0]);
}
else
{
$product_url = mysqli_real_escape_string($con,$pages_url[3]);
}

$sql = mysqli_query($con,"select * from tbl_product where url='".$product_url."' and product_status='Active'");
if(mysqli_num_rows($sql)==0)
{
   header('location:'.$baseurl.'/product');
}
$product_detail = mysqli_fetch_array($sql);

$discount = $product_detail['discount'];
if($discount>0)
{
   $product_price = $product_detail['product_price']-($product_detail['product_price']/100*$discount);
}
else
{
   $product_price = $product_detail['product_price'];
}



?>

      <!-- end Header Area -->
      <main>
         <section class="breadcrumb-area" style="background-image: url(<?=$baseurl?>/img/product-banner2.png);">
            <div class="breadcrumb-bottom">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="left text-center">
                           <ul>
                              <li><a href="<?=$baseurl?>">Home</a></li>
                              <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                              <li class="active"> Products </li>
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
                        <h2 class="title"> Our Products  </h2>
                     </div>
                     <!-- section title start -->
                  </div>
               </div>
            </div>
         </section>
         <div class="abt-top">
		             <div class="container">
               <div class="row">
                  <div class="col-md-5">
            
               <div class="xzoom-container">
                  <?php
                    if($product_detail['image']!='' && $_GET['cid']=='')
                    {

                       $real_image = $product_detail['image'];
                       $size_type="";
                    ?>
                  <img class="xzoom" id="xzoom-default" src="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$product_detail['image']?>" xoriginal="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$product_detail['image']?>" />
                  <?php
                }
                else
                {
                         
                         $product_imgs = mysqli_fetch_array(mysqli_query($con,"select * from product_image where product_id='".$product_detail[0]."' and color_id='".base64_decode($_GET['cid'])."' and status='Active'"));
                         $real_image = $product_imgs['image'];
                         
                         $size_type=$product_imgs['size'];
                         
                    ?>
                 
                  <img class="xzoom" id="xzoom-default" src="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$product_imgs['image']?>" xoriginal="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$product_imgs['image']?>" />
                  <?php

                }
                ?>
                  <div class="xzoom-thumbs">
               
                    <?php
                    if($product_detail['image']!='' && $_GET['cid']=='')
                    {


                    ?>
                     <a href="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$product_detail['image']?>"><img class="xzoom-gallery" width="80" src="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$product_detail['image']?>"  xpreview="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$product_detail['image']?>" ></a>
                    
                   <?php
                  }
                  else
                  {
                    ?>
                    <a href="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$product_imgs['image']?>"><img class="xzoom-gallery" width="80" src="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$product_imgs['image']?>"  xpreview="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$product_imgs['image']?>" ></a>
                    <?php
                  }
                    $colours = array();
                    $images_color = mysqli_query($con,"select * from product_image where product_id='".$product_detail[0]."' and status='active'");
                    if(mysqli_num_rows($images_color)>0)
                    {
                      while($images_list = mysqli_fetch_array($images_color))
                      {
                        $colours[]=$images_list['color_id'];
                        if($images_list['size']!='')
                             {
                             $size[] = $images_list['size'];
                             }
                        ?>
                        
                       <a href="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$images_list['image']?>"><img class="xzoom-gallery" width="80" src="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$images_list['image']?>"  xpreview="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$images_list['image']?>" ></a>
                        <?php
                      }
                    }
                    $colours = array_unique($colours);
                    $colours = array_values($colours);
                    $size = array_unique($size);
                    $size = array_values($size);
                    
                    ?>

                    

                     
                  </div>
               </div>
            
			</div>
			
			<div class="col-lg-7">
                                    <div class="product-details-des">
                                       
                                        <h3 class="product-name"> <?=$product_detail['product_name']?> </h3>
                                    
                                        <div class="price-box">
                                            <span class="price-regular">Rs. <?=round($product_price)?>.00</span>
                                            <span class="price-old"><del> <?=$product_detail['product_price']?></del></span>
                                        </div>
                                        <p style="font-size:18px;color:Blue;">Inclusive All Taxes</p>
                                        <p style="font-size:18px;color:green;">*Whatsapp Order Facility Avalable</p>
                                    
                                       
                                       
                                         <div class="about-us">
                                        <p><?=$product_detail['pro_description']?></p>
											</div>
											<?php
											
											if(count($colours)>0)
											{
											    
											    ?>
											
											<div class="color-option">
											    
                                            <h6 class="option-title">color :</h6>
                                            <ul class="color-categories">
                                              <?php
                                                 for($i=0;$i<count($colours);$i++)
                                                 {
                                                  $color_dt = mysqli_fetch_array(mysqli_query($con,"select * from tbl_color where id='".$colours[$i]."' and status='Active'"));

                                                  $pro_color_images = mysqli_fetch_array(mysqli_query($con,"select * from product_image where product_id='".$product_detail[0]."' and color_id='".$colours[$i]."' and status='Active'")); 
                                                  
                                              ?>
                                                <li>
                                                    <a  href="<?=$baseurl?>/details/<?=$product_url?>?cid=<?=base64_encode($colours[$i])?>" title="<?=$color_dt['color_name']?>" style="background-color:<?=$color_dt['color_name']?>"></a>
                                                </li>
                                                 
                                              <?php } ?>
                                              
                                            </ul>
                                            
                                        </div>
                               <?php
                             
                               if(count($size)>0)
                               {
                                   ?>
                                 
                                 <div class="product-tab-menu">
                                 <div class="row">
                                     <div class="col-md-2">
                                     <h6>Size : </h6>
                                     </div>
                                     <div class="col-md-10">
                           <ul class="nav justify-content" style="">
                               <?php
                               for($s=0;$s<count($size);$s++)
                               {
                                   $size_detail = mysqli_fetch_array(mysqli_query($con,"select * from product_image where product_id='".$product_detail[0]."' and size='".$size[$s]."' and status='Active'")); 
                                                  
                               ?>
                             
                        <li ><a href="<?=$baseurl?>/details/<?=$product_url?>?cid=<?=base64_encode($size_detail['color_id'])?>&size=<?=base64_encode($size_detail['size'])?>" style="height: 40px;border-radius: 3px;padding: 12px 25px;<?php if($_GET['size']==base64_encode($size_detail['size'])) { echo 'background-color:#c55a11;'; } else { echo 'background-color:#24a0ed;'; } ?>"><?=ucwords($size_detail['size'])?></a></li>
                             
                             
                        
                        <?php }  ?>
                        
                        </ul>
                        </div>
                               </div>
                              </div>              
                                        <?php }
											}
                                         ?>
                                         
                                        <script type="text/javascript">
                                       function valid()
                                       {
                                          if(document.getElementById('number').value==0)
                                          {
                                             alert('Quantity Should Not 0');
                                     
                                             document.getElementById('number').focus();
                                             return false;
                                          }
                                       }
                                    </script>
                                        <div class="quantity-cart-box d-flex " style="padding-top:30px;">
                                          <?php
                                          if($product_detail['stock_qty']>0)
                                          {
                                          ?>
                                            <h6 class="option-title">qty:</h6>
                                           <?php } ?>
										       <form action="<?=$baseurl?>/cart" onSubmit="return valid();" method="post">
                                          <input type="hidden" name="product_id" value="<?=$product_detail[0];?>">
                                         <input type="hidden" name="total_price" value="<?=round($product_price)?>">
                                         <input type="hidden" name="color_id" value="<?=base64_decode(@$_GET['cid'])?>">
                                         <input type="hidden" name="stock_qty" value="<?=$product_detail['stock_qty']?>">
                                         <input type="hidden" name="url" value="<?=$product_url?>">
                                         <input type="hidden" name="size" value="<?=ucwords($size_type)?>">
                                         <input type="hidden" name="image_name" value="<?=$real_image?>">
                                         <input type="hidden" name="colors_name" value="<?=$colors_pro_name['color_name']?>">
                                         <input type="hidden" name="shipping_price" value="<?=$product_detail['shipping_price']?>">
                                          
                                          <?php
                                          if($product_detail['stock_qty']<1)
                                          {
                                              ?>
                                              
										   <div class="action_link" style="padding-top:20px;">
										       
                                                <button class="btn btn-cart2" disabled>Out Of Stock</button>
                                                
                                            </div>
                                              <?php
                                          }
                                          else
                                          {
                                          ?>
                                          <div class="value-button" id="decrease" onClick="decreaseValue()" value="Decrease Value">-</div>
                                          <input min="1" max="100" value="1" type="number" name="qty" id="number">
                                          <div class="value-button" id="increase" onClick="increaseValue()" value="Increase Value">+</div>
                                         
                                     
										   <div class="action_link" style="padding-top:20px;">
										       
                                                <button class="btn btn-cart2" type="submit" name="submit">Add to cart</button>
                                                
                                            </div>
                                           <?php } ?>
                                        </div>
                                         </form>
                                    
                                        
                                    </div>
                                </div>
			
			
			
			</div>
			</div>
         </div>
		 <div class="product-details-reviews section-paddingd">
		 <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="" data-toggle="tab" href="#tab_one">description</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab_two" class="active show">information</a>
                                            </li>
                                            
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade" id="tab_one">
                                                <div class="tab-one">
                                                    <p><?=$product_detail['description']?></p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade active show" id="tab_two">
                                                <?=$product_detail['size_description']?>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
	              </div>
		 
		 	   
		 	    <!-- featured product area start -->
         <section class="feature-product section-padding1">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <!-- section title start -->
                     <div class="section-title text-center">
                        <h2 class="title">Related products</h2>
                        
                     </div>
                     <!-- section title start -->
                  </div>
               </div>
               <div class="row">
                  <div class="col-12">
                     <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                       <?php
                                   $feature_product = mysqli_query($con,"select * from tbl_product where  id!='".$product_detail[0]."' and product_status='Active' limit 16");
                                   while($feature_pro_list = mysqli_fetch_array($feature_product))
                                   {
                                    if($feature_pro_list['discount']>0)
                                    {
                                       $feature_pro_price = $feature_pro_list['product_price']-($feature_pro_list['product_price']/100*$feature_pro_list['discount']);
                                    }
                                    else
                                    {
                                       $feature_pro_price = $feature_pro_list['product_price'];
                                    }
                                   
                                  ?>

                       <div class="product-item">
                                    <figure class="product-thumb">
                                       <a href="<?=$baseurl?>/details/<?=$feature_pro_list['url']?>">
                                       <img class="pri-img" src="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$feature_pro_list['image']?>" alt="">
                                       <img class="sec-img" src="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$feature_pro_list['image']?>" alt="">
                                       </a>
                                       <div class="product-badge">
                                          <div class="product-label new">
                                             <span>new</span>
                                          </div>
                                          <div class="product-label discount">
                                             <span><?=$feature_pro_list['discount']?>%</span>
                                          </div>
                                       </div>
                                       <div class="cart-hover">
                                          <a href="<?=$baseurl?>/details/<?=$feature_pro_list['url']?>" tabindex="-1"> <button class="btn btn-cart" tabindex="-1">add to cart</button> </a>
                                       </div>
                                    </figure>
                                    <div class="product-caption text-center">
                                       <h6 class="product-name">
                                          <a href="<?=$baseurl?>/details/<?=$feature_pro_list['url']?>"> <?=$feature_pro_list['product_name']?> </a>
                                       </h6>
                                       <div class="price-box">
                                          <span class="price-regular"> <i class="fa fa-inr"></i> <?=round($feature_pro_price)?>.00</span>
                                          <span class="price-old"><del> <i class="fa fa-inr"></i> <?=$feature_pro_list['product_price']?></del></span>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                              }
                              ?>
                      
                        <!-- product item end -->
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>
      <!-- Scroll to top start -->
      <div class="scroll-top not-visible">
         <i class="fa fa-angle-up"></i>
      </div>
      <!-- Scroll to Top End -->
      <!-- footer area start -->
   <?php include('include/footer.php'); ?>