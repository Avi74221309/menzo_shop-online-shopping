<?php 
include('include/header.php'); 
$pages = explode('/',$_SERVER['REQUEST_URI']);
@$cat_url = mysqli_real_escape_string($con,$pages[3]);
@$subcat_url = mysqli_real_escape_string($con,$pages[4]);
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


                     
                     
                     <?php
                     if(isset($_POST['submit']))
                     {
                        $search = mysqli_real_escape_string($con,$_POST['search']);
                        $sql = "select tbl_product.id,tbl_product.product_name,tbl_product.product_price,tbl_product.discount,tbl_product.url,tbl_product.product_status,tbl_product.image from tbl_product inner join tbl_cat on tbl_product.cat_id=tbl_cat.id inner join tbl_subcat on tbl_product.subcat_id=tbl_subcat.id where tbl_product.product_status='Active' and tbl_product.product_name like '%".$search."%' OR tbl_cat.cat_name like '%".$search."%' OR tbl_subcat.subcat_name like '%".$search."%' limit 20";
                       
                     }
                     else
                     {
                     if(count($pages)==4)
                     {
                        $sql = "select * from tbl_product where cat_id IN(select id from tbl_cat where url='".$cat_url."' and status='Active') and product_status='Active'";
                     }
                     elseif(count($pages)==5)
                     {
                        $sql = "select * from tbl_product where cat_id IN(select id from tbl_cat where url='".$cat_url."' and status='Active') and subcat_id in (SELECT id from tbl_subcat where url='".$subcat_url."' and status='Active') and product_status='Active'";
                     }
                     else
                     {
                        $sql = "select * from tbl_product where product_status='Active'";
                     }
                     //echo $sql; die;
                  }
                  
                  $product = mysqli_query($con,$sql);
                  if(mysqli_num_rows($product)==0)
                  {
                     echo '<center><h2>No Product Found</h2></center>';
                  }
                  else
                  {
                  while($product_list = mysqli_fetch_array($product))
                  {
                      if($product_list['discount']>0)
                      {
                        $price = $product_list['product_price']-($product_list['product_price']/100*$product_list['discount']);
                      }
                      else
                      {
                        $price = $product_list['product_price'];

                      }

                  
                     ?>

                              <div class="col-lg-4 col-md-4">
                      <div class="product-item">
                                    <figure class="product-thumb">
                                       <a href="<?=$baseurl?>/details/<?=$product_list['url']?>">
                                       <img class="pri-img" src="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$product_list['image']?>" alt="">
                                       <img class="sec-img" src="<?=$baseurl?>/chowkdi_admin/upload/product/<?=$product_list['image']?>" alt="">
                                       </a>
                                       <div class="product-badge">
                                          <div class="product-label new">
                                             <span>new</span>
                                          </div>
                                          <div class="product-label discount">
                                             <span><?=$product_list['discount']?>%</span>
                                          </div>
                                       </div>
                                       <div class="cart-hover">
                                         <a href="<?=$baseurl?>/details/<?=$product_list['url']?>"> <button class="btn btn-cart">add to cart</button> </a> 
                                       </div>
                                    </figure>
                                    <div class="product-caption text-center">
                                       <h6 class="product-name">
                                          <a href="<?=$baseurl?>/details/<?=$product_list['url']?>"><?=$product_list['product_name']?> </a>
                                       </h6>
                                       <div class="price-box">
                                          <span class="price-regular"> <i class="fa fa-inr"></i> <?=round($price)?>.00</span>
                                          <span class="price-old"><del> <i class="fa fa-inr"></i> <?=$product_list['product_price']?></del></span>
                                       </div>
                                    </div>
                                 </div>
								  </div>
                          <?php
                       }
                    }
                    ?>


					  
					  
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
                                   $feature_product = mysqli_query($con,"select * from tbl_product where  product_status='Active' order by id desc limit 14");
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