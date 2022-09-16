<?php
include('include/header.php');

include("class/index_class.php");
if($_SESSION['user_id']=='')
{
    echo "<script>window.location.href='$baseurl'</script>";
}

$obj = new account();
$y=$_REQUEST['y'];
$obj=new account();
if(isset($_POST['change_password']))
{
    
$reg=$obj->change_pass($_REQUEST,$_SESSION['user_id']);

if($reg=='A')
{ 


//$msg = "Password Successfully Change";
echo "<script>window.location.href='logout';
alert('Password Successfully Change')</script>";
}
if($reg=='k')
{

echo "<script>window.location.href ='change-password';
alert('Please Enter Your Currect Password')</script>";
//$msg = "Please Enter Your Currect Password";
}
if($reg=='w')
{   
    
echo "<script>window.location.href ='change-password';
alert('password not matched')</script>";

}
} 
?> 
<script type="text/javascript">
  function valid()

  {
    if(document.getElementById('current_password').value=='')
    {
      alert('Please Enter Your Current Password');
      document.getElementById('current_password').focus();
      return false;
    }

     if(document.getElementById('new_password').value=='')
    {
      alert('Please Enter New Password');
      document.getElementById('new_password').focus();
      return false;
    }


     if(document.getElementById('cnf_password').value=='')
    {
      alert('Please Enter Confirm Password');
      document.getElementById('cnf_password').focus();
      return false;
    }
     
      if(document.getElementById('new_password').value!=document.getElementById('cnf_password').value)
    {
      alert('Both Password Are Not Same');
      document.getElementById('cnf_password').focus();
      return false;
    }

     if(document.getElementById('current_password').value==document.getElementById('new_password').value)
    {
      alert('Current Password And New Password Should Not Be Same');
      document.getElementById('new_password').focus();
      return false;
    }    

    


  }
</script>
      
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
                                             <li class="active"> Change Password </li>
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
                        <h2 class="title">  Update Password </h2>
                         
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
                           <form method="post" onSubmit="return valid()">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="input-field">
                                       <input type="password" id="current_password" placeholder="Enter Current Password" name="oldpassword">

                                       <div class="icon-holder">
                                          <i class="fa fa-unlock-alt" aria-hidden="true"></i>

                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="input-field">
                                       <input id="new_password" name="newpassword"  type="password" placeholder="Enter New Password"  >
                                       <div class="icon-holder">
                                          <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="input-field">
                                       <input id="cnf_password" name="cpassword" type="password" placeholder="Enter Confirm Password"  >
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
                                          <button class="thm-btn bgclr-1" type="submit" name="change_password">Channge Password </button>
                                         
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