<?php 
include('include/header.php'); 
include('class/index_class.php');
if($_SESSION['user_id']!='')
{
   header('location:index');
}
$obj = new account();
$y=$_REQUEST['y'];
$obj=new account();
if(isset($_POST['login']))
{
$reg=$obj->login($_REQUEST);
if($reg=='B')
{ 
if($y==1)
{
echo "<script>window.location.href ='$baseurl/cart';</script>";
$msg = "Login Successfully";
}
else
{

echo "<script>window.location.href ='$baseurl';</script>";
}
} 
else if($reg=='c')
{
    
 echo "<script>alert('Your Account has been Deactivated Now.. Please check your Email for Activate it OR you have entered wrong password.');</script>";   
}

else {
echo "<script>alert('Your email Address or password does not match');</script>";
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
                                             <li class="active"> Login </li>
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
                        <h2 class="title">  Login </h2>
                         
                     </div>
                     <!-- section title start -->
                  </div>
               </div>
			   </div>
			   </section>
			   
			   
			  <div class="abt-top">
				<div class="container">
				 <div class="row">
               <div class="col-lg-3 col-md-3">
                        
                     </div>
                     <div class="col-lg-6 col-md-6">
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
                                    <div class="input-field">
                                       <input type="password" name="password" placeholder="Enter Password" required="">
                                       <div class="icon-holder">
                                          <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="row">
                                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                          <button class="thm-btn bgclr-1" type="submit" name="login">Login </button>
                                          <a class="thm-btn bgclr-1" href="<?=$baseurl?>/register" style="padding: 6px 28px 5px;
    display: inline-block;
    border-radius: 20px;"> Signup </a>  
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                          <a class="forgot-password" href="<?=$baseurl?>/forgot">Forgot Password?</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3">
                        <!--<img src="<?=$baseurl?>/img/login.jpg" class="img-thumbnail">-->
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