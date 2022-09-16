<?php 
include('include/header.php'); 
include("class/index_class.php");
if($_SESSION['user_id']!='')
{
   header('location:index');
}

$obj=new account();
if(isset($_POST['register']))
{

$reg=$obj->registration($_REQUEST);

if($reg=='H')
{
$msg ="Registerd Successfully";
echo "<script>window.location.href ='index';
alert('Thankyou ! Your Account has been created  successfully. Please check your email for activate your account.')</script>";
} else {
$msg ="Registration Is not done";
}
}
?>
<script type="text/javascript">
function get_district(val) {
 
  $.ajax({
  type: "POST",
  url: "get_district.php",
  data:'state_id='+val,
  success: function(data){
    $("#city-list").html(data);
  }
  });
}
function valid()
{
    if(document.getElementById('password').value!=document.getElementById('cnf_password').value)
    {
        alert('Both Password Not Matched');
        document.getElementById('cnf_password').focus();
        return false;
    }
}
</script>
      <!-- end Header Area -->
      <main>
        
			   <section class="breadcrumb-area" style="background-image: url(<?=$baseurl?>/img/register-banner.jpg);">
                           <div class="breadcrumb-bottom">
                              <div class="container">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="left text-center">
                                          <ul>
                                             <li><a href="<?=$baseurl?>">Home</a></li>
                                             <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                             <li class="active"> Register </li>
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
                        <h2 class="title"> Register </h2>
                         
                     </div>
                     <!-- section title start -->
                  </div>
               </div>
			   </div>
			   </section>
			   
			   
			  <div class="abt-top">
			<div class="container">
				  <div class="row">
            <div class="col-lg-2 col-md-2">
            
            </div>
                     <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="form">
                        <form onSubmit="return valid()" method="post">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="input-field">
                                       <input type="text" name="name" placeholder="Your Name *" required="">
                                       <div class="icon-holder">
                                          <i class="fa fa-user" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-field">
                                       <input type="email" name="email" placeholder="Enter Mail id *" required="">
                                       <div class="icon-holder">
                                          <i class="fa fa-envelope" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!--
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="input-field">
                                      <input type="text" name="mobile" placeholder="Enter Phone no" pattern="[6789][0-9]{9}" onkeypress="if(this.value.length==10) return false;" required="">
                                       <div class="icon-holder">
                                          <i class="fa fa-phone" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-field">
                                      <input type="text" name="address" placeholder="Enter Address" required="">
                                       <div class="icon-holder">
                                          <i class="fa fa-map-marker" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                               <div class="row">
                                 <div class="col-md-6">
                                    <div class="single-box">
                                       <div>
                                         <select class="form-control" style="padding:10px; margin-bottom:25px; border:2px solid #ababab; color:#333;" name="state" onchange="get_district(this.value)" required="">
                                        <option value="">Select State</option>
                                            <?php
                                                $state = mysqli_query($con,"select * from state where countrycode=1");
                                                while($state_list = mysqli_fetch_array($state))
                                                {
                                            ?>
                                          <option value="<?=$state_list[0].'.'.$state_list['StateName']?>"><?=$state_list['StateName']?></option>
                                            <?php } ?>
                                            
                                    </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="single-box">
                                       <div>
                                          <select class="form-control" style="padding:10px; margin-bottom:25px; border:2px solid #ababab; color:#333;" id="city-list" name="city" required="">
                                        <option value="">Select City</option>
                                    </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="input-field">
                                       <input type="password" name="password" placeholder="Enter Password" required="" id="password">
                                       <div class="icon-holder">
                                          <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-field">
                                        <input type="password" name="cpassword" placeholder="Enter Confirm password " required="" id="cnf_password">
                                       <div class="icon-holder">
                                          <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <button class="thm-btn bgclr-1" type="submit" name="register"> Register Here </button>
                                 </div>
                              </div>
                        </form></div>
                            
                     </div>
                     <div class="col-lg-2 col-md-2">
                       <!-- <img src="<?=$baseurl?>/img/register.jpg" class="img-thumbnail">-->
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