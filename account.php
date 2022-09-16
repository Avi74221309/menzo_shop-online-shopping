<?php 
include('include/header.php'); 
if($_SESSION['user_id']=='')
{
  echo "<script>window.location.href='$baseurl'</script>";
}
include('class/index_class.php');
$obj = new account();
$y=$_REQUEST['y'];
$obj=new account();
if(isset($_POST['account']))
{ 
$reg=$obj->edit_account($_REQUEST,$_SESSION['user_id']);
if($reg=='D')
{
echo "<script>alert('Your Account is updated successfully');</script>";
echo "<script>window.location.href='$baseurl/account'</script>";
} else {
echo "<script>alert('Your Account is not updated successfully');</script>";
}
} 

?>
<script>
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
                                             <li class="active"> Update Profile </li>
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
                        <h2 class="title"> Edit Account </h2>
                         
                     </div>
                     <!-- section title start -->
                  </div>
               </div>
			   </div>
			   </section>
			   
			   
			  <div class="abt-top">
			<div class="container">
				  <div class="row">
                     <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                        <div class="form">
                        <form onSubmit="return valid()" method="post">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="input-field">
                                       <input type="text" name="name" placeholder="Your Name *" required="" value="<?=$user_dt['name'];?>">
                                       <div class="icon-holder">
                                          <i class="fa fa-user" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-field">
                                       <input type="email" placeholder="Enter Mail id *" required="" value="<?=$user_dt['email'];?>" disabled>
                                       <div class="icon-holder">
                                          <i class="fa fa-envelope" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="input-field">
                                      <input type="text" name="mobile" placeholder="Enter Phone no" pattern="[6789][0-9]{9}" onkeypress="if(this.value.length==10) return false;" required="" value="<?=$user_dt['mobile'];?>">
                                       <div class="icon-holder">
                                          <i class="fa fa-phone" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-field">
                                      <input type="text" name="address" placeholder="Enter Address" required="" value="<?=$user_dt['address'];?>">
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
                                         <select class="form-control"  name="state" onchange="get_district(this.value)" required="" style="border: 2px solid #ababab;
    color: #777;
    font-size: 15px;
    height: 50px;
    margin-bottom: 30px;
    padding-left: 15px;
    padding-right: 50px;
    width: 100%;
    transition: all 700ms ease 0s;">
                                        <option value="">Select State</option>
                                            <?php
                                                $state = mysqli_query($con,"select * from state where countrycode=1");
                                                while($state_list = mysqli_fetch_array($state))
                                                {
                                            ?>
                                          <option value="<?=$state_list[0].'.'.$state_list['StateName']?>" <?php if($user_dt['state']==$state_list['StateName']) echo 'selected'; ?> ><?=$state_list['StateName']?></option>
                                            <?php } ?>
                                            
                                    </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="single-box">
                                       <div>
                                          <select class="form-control" id="city-list" name="city" required="" style="border: 2px solid #ababab;
    color: #777;
    font-size: 15px;
    height: 50px;
    margin-bottom: 30px;
    padding-left: 15px;
    padding-right: 50px;
    width: 100%;
    transition: all 700ms ease 0s;">
                                        <option value="">Select City</option>
                                        <?php
                                                $city = mysqli_query($con,"select * from district");
                                                while($city_list = mysqli_fetch_array($city))
                                                {
                                                  ?>
                                                     <option value="<?=$city_list['DistrictName']?>" <?php if($user_dt['city']==$city_list['DistrictName']) echo 'selected'; ?>><?=$city_list['DistrictName'];?></option>  
                                                  <?php
                                                }
                                                ?>
                                    </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              
                              <div class="row">
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <button class="thm-btn bgclr-1" type="submit" name="account" > Update Account</button>
                                 </div>
                              </div>
                        </form></div>
                            
                     </div>
                     <div class="col-lg-5 col-md-5">
                        <img src="<?=$baseurl?>/img/register.jpg" class="img-thumbnail">
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