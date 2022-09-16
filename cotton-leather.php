<?php 
include('include/header.php'); 
?>
      <!-- end Header Area -->
      
      <main>
        
			   <section class="breadcrumb-area" style="background-image: url(<?=$baseurl?>/img/Matching_Fabric_Banner.jpg);">
                           <div class="breadcrumb-bottom">
                              <div class="container">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="left text-center">
                                          <ul>
                                             <li><a href="<?=$baseurl?>">Home</a></li>
                                             <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                             <li class="active">Matching Fabrics </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                       
                    
				 
				   
				   
				  </section>
				   <div class="container">
				  <div class="row" style="padding-top:15px;">
				     
				      <div class="col-md-12">
				          <p style="font-size:18px;color:green;">*Order on Whatsapp only</p>
				         <p style="font-size:18px;">
				             Shade Card for colour given below <br />
<i style="color:red">#	  Ready Made Patikot </i>	&emsp;&emsp;&emsp;&emsp;&emsp;<i style="color:blue">₹ 130/pcs</i> <br />
		&emsp;	(Order min 3 Piece)				<br />
<i style="color:red">#	 Plain Cotton Cambric for Suit and Salvar</i>&emsp;	<i style="color:blue">₹ 70/m</i> <br />
	&emsp;	(Guaranteed Fast Colour)<br />
<i style="color:red">#	 Rubia for Blouses and Suits</i>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i style="color:blue">₹ 100/m</i> <br />
		&emsp;	(Terry Rubia Arvind Mills)<br />
		&emsp;	(Guaranteed Fast Colour)<br />
<i style="color:red">#	 100% Cotton for Patikot and Other purpose</i>&emsp;&emsp;	<i style="color:blue">₹ 70/m</i> <br />
		&emsp;	(Guaranteed Fast Colour for <br />
		&emsp;	normal Wash)<br />
<i style="color:red">#	Cotton for Ladies Pants and Trousers</i> &emsp;&emsp;	<i style="color:blue">₹ 80/m</i> <br />
<i style="color:red">#   Dyeable Plane Fabrics :</i><br/>
        &emsp;&emsp;1. Half Georgette for Suits and Dresses  &emsp;&emsp;&emsp;&emsp; &emsp; <i style="color:blue">₹ 140/m</i> <br />
        &emsp;&emsp;2. Cotton Shantoon for all purpose (A Grade) &emsp;&emsp; &emsp; <i style="color:blue">₹ 90/m</i> <br />
       &emsp;&emsp; 3. Raw Silk for all purpose &emsp;&emsp;&emsp;&emsp; &emsp; &emsp;&emsp; <i style="color:blue">₹ 130/m</i> <br />
       &emsp;&emsp; 4. Crape &emsp;&emsp;&emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <i style="color:blue">₹ 250/m</i> <br /> 
        &emsp;&emsp;5. Half Shiffon Dupatta (2.25m cut )&emsp;&emsp; &emsp; <i style="color:blue">₹ 145/pcs</i> <br /> 
      &emsp;&emsp;  6. Half Georgette Dupatta (2.25m cut )&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;<i style="color:blue">₹ 160/pcs</i> <br /> 
      &emsp;&emsp;  7. Plain Maharani Net (Width 60 Inches)&emsp;&emsp; &emsp;<i style="color:blue">₹ 60/pcs</i> <br />
		*Shipping Charges according to weight.<br />
		For any Information or Queries<br />
		<p style="font-size:18px;color:green;">	Call or Whatsapp on +91-8929828410</p>
		<left><a style="height: 40px;border-radius: 3px;padding: 12px 25px;background-color:#24a0ed;color:#fff;" class="btn btn-cart2"  href="<?=$baseurl?>/product/clothing/designer-cloth">Designer Clothing </a></left>
		                </p> 
				      </div></div>
				      
				  </div>
				  <section class="heading">
				  <div class="container">
                   <div class="row">
                  <div class="col-12">
                     <!-- section title start -->
                     <div class="section-title text-center">
                        <h2 class="title"> Our Matching Fabrics Shade Card  </h2>
                         
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
                        $sql = "select * from tbl_gallery where status='Active' order by id desc";
                    
                  $product = mysqli_query($con,$sql);
                  if(mysqli_num_rows($product)==0)
                  {
                     echo '<center><h2>No Cotton Leather Product Found</h2></center>';
                  }
                  else
                  {
                  while($product_list = mysqli_fetch_array($product))
                  {

                  
                     ?>

                              <div class="col-lg-4 col-md-4">
                      <div class="product-item">
                                    <figure class="product-thumb"> 
                                        <a class="sample" data-height="720" data-lighter="<?=$baseurl?>/chowkdi_admin/upload/product/cat/<?=$product_list['image']?>" data-width="1280" href="<?=$baseurl?>/chowkdi_admin/upload/product/cat/<?=$product_list['image']?>">
                                       <img class="pri-img" src="<?=$baseurl?>/chowkdi_admin/upload/product/cat/<?=$product_list['image']?>" alt="">
                                       <img class="sec-img" src="<?=$baseurl?>/chowkdi_admin/upload/product/cat/<?=$product_list['image']?>" alt="">
                                       </a>
                                       
                                       
                                    </figure>
                                    
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
                <center><a style="height: 40px;border-radius: 3px;padding: 12px 25px;background-color:#24a0ed;color:#fff;" class="btn btn-cart2" href="<?=$baseurl?>/enquiry">Enquiry Now</a></center>
                <br>
                <br>
			   
			   
       
      </main>
      <!-- Scroll to top start -->
      <div class="scroll-top not-visible">
         <i class="fa fa-angle-up"></i>
      </div>
      <!-- Scroll to Top End -->
      <!-- footer area start -->
    <?php include('include/footer.php'); ?>