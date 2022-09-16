<?php 
include('include/header.php'); 
include('class/index_class.php');
if($user_id!='')
{
   header('location:index');
}
$obj = new account();
if(isset($_POST['forgot']))
{ 

$reg=$obj->forgetpass($_REQUEST);
if($reg=='I')
{
//$msg = "Your Password  send to your email address";
echo "<script> alert('Your Password  send to your email address'); window.location='login';</script>";

//window.alert("Location: login.php");
} else {
echo "<script> alert('Your  EmailID does not exists'); window.location='forgot';</script>";

}
}
?>       
      <!-- end Header Area -->
      <main>
        
			   <section class="breadcrumb-area" style="background-image: url(<?=$baseurl?>/img/login-banner.jpg);">
                           <div class="breadcrumb-bottom">
                              <div class="container">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="left text-center">
                                          <ul>
                                             <li><a href="<?=$baseurl?>">Home</a></li>
                                             <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                             <li class="active"> Forgot Password </li>
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
                        <h2 class="title">  Forgot Password </h2>
                         
                     </div>
                     <!-- section title start -->
                  </div>
               </div>
			   </div>
			   </section>
			   
			   
			  <div class="abt-top">
				<div class="container">
				 <div class="row">
                     <div class="col-lg-7 col-md-7">
                        <div class="form">
                           <form method="post">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="input-field">
                                       <input type="email" name="email" placeholder="Enter Mail id *" required="">
                                       <div class="icon-holder">
                                          <i class="fa fa-envelope" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="row">
                                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                          <button class="thm-btn bgclr-1" type="submit" name="forgot">Forgot Password </button>
                                         
                                       </div>
                                       
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-lg-5 col-md-5">
                        <img src="<?=$baseurl?>/img/login.jpg" class="img-thumbnail">
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
   <?php include('include/footer.php'); ?>