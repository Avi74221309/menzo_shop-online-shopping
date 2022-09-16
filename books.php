<?php 
include('include/header.php');
if(isset($_REQUEST['submit'])){
  @extract($_REQUEST);
$hostName = $_SERVER['HTTP_HOST'];  
 $msgmail="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<title>Lycon India</title>
 </head>
<body>      
   <table align='center' cellSpacing='0' cellPadding='0' width='87%' border='1' style='border:1px solid #222a35'>
  <tbody>
    <tr>
      <td vAlign='top' style='background-color:#222a35; padding:10px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; color:#ffffff; text-align:center; font-weight:bold;' colspan='3' >Enquiry From <b style='color:white;'>$name</b> For Books</td>
    </tr>
<tr>
<td width='30%' vAlign='top' style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#003366; background-color:#F9E2DD;padding:10px;' ><strong>Name</strong> </td>
      <td vAlign='top' width='70%' style='font-family:Verdana, Arial, Helvetica, sans-serif;padding:10px;'>$name</td>
    </tr>  
     <tr>
      <td vAlign='top'  style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#003366; background-color:#F9E2DD;padding:10px;' ><strong>Email id </strong> </td>
      <td vAlign='top' style='font-family:Verdana, Arial, Helvetica, sans-serif;padding:10px;'>$email</td>
    </tr>
    <tr>
      <td vAlign='top'  style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#003366; background-color:#F9E2DD;padding:10px;' ><strong>Mobile </strong> </td>
      <td vAlign='top' style='font-family:Verdana, Arial, Helvetica, sans-serif;padding:10px;'>$mobile</td>
    </tr>
 
 
  

      <tr>
      <td vAlign='top'  style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#003366; background-color:#F9E2DD;padding:10px;' ><strong>Message  </strong> </td>
      <td vAlign='top' style='font-family:Verdana, Arial, Helvetica, sans-serif;padding:10px;'>$message</td>
    </tr>    
  </tbody>
</table>
</body>
</html>";

$toEmail = "chowkdiofficial@gmail.com";
$subject = "Enquiry from $name";
            $from="$email";
        $Headers1 = "From: $name<$from>\n";
        $Headers1 .= "X-Mailer: PHP/". phpversion();
        $Headers1 .= "X-Priority: 3 \n";
        $Headers1 .= "MIME-version: 1.0\n";
        $Headers1 .= "Content-Type: text/html; charset=iso-8859-1\n"; 
        if(mail("$toEmail", "$subject", "$msgmail","$Headers1")){
         
echo"<script>window.location.href='$baseurl';
alert('Your Enquiry has been send successfully. We Will Contact You soon');
</script>";
}
else
{
echo "Your Enquiry Not Successfull Send";
}
}
?>

<script type="text/javascript">
  function valid()
  {
    if(document.getElementById('name').value=='')
    {
      alert('Please Enter Your Name');
      document.getElementById('name').focus();
      return false;
    }
 
     var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        var address = document.getElementById('email').value;

          if(reg.test(address) == false)

          {

           alert('Invalid Email Address.');

            document.getElementById('email').focus();

            return false;

          }

   
    if(document.getElementById('mobile').value=='')
    {
      alert('Please Enter Your Mobile No');
      document.getElementById('mobile').focus();
      return false;
    }
     /*if(document.getElementById('subject').value=='')
    {
      alert('Please Enter Your Subject');
      document.getElementById('subject').focus();
      return false;
    }
     */
    if(document.getElementById('qry').value=='')
    {
      alert('Please Write us Your Query');
      document.getElementById('qry').focus();
      return false;
    }
  }

</script>
      <!-- end Header Area -->
      <main>
        
			   <section class="breadcrumb-area" style="background-image: url(<?=$baseurl?>/img/enquiry-banner.jpg);">
                           <div class="breadcrumb-bottom">
                              <div class="container">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="left text-center">
                                          <ul>
                                             <li><a href="<?=$baseurl?>">Home</a></li>
                                             <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                             <li class="active"> Have You Query For Books ? Write Us </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                       
                    
				 
				   
				   
				  </section>
				  
				  <div class="row" style="padding-top:15px;">
				      <div class="col-md-1">
				          
				      </div>
				      <div class="col-md-10">
				         <p style="font-size:18px;"> Books can be provided on order only. You can fill the given below or whatsapp us. Please mention Book name , Author name and Publisher we would try our best to reach out to you as soon as possible. <br>
				         * Shipping Charges according to weight of Book/Books
                   </p> 
				      </div>
				      <div class="col-md-1">
				          
				      </div>
				  </div>
				  
				  <section class="heading">
				  <div class="container">
                   <div class="row">
                  <div class="col-12">
                     <!-- section title start -->
                     <div class="section-title text-center">
                        <h2 class="title"> Enquiry For Latest Books Collection  </h2>
                         
                     </div>
                     <!-- section title start -->
                  </div>
               </div>
			   </div>
			   </section>
			   
			   
			  <div class="abt-top">
		<div class="container">
				  <div class="row">
				      <div class="col-md-3"></div>
                     <div class="col-md-6">
                        <div class="contact-page">
                           <form id="contact_form" name="contact_form" method="post" onSubmit="return valid();">
                              <div class="row clearfix">
                                 <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                       <input type="text" id="name" name="name" class="form-control" value="" placeholder="Your Name *" >
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                       <input type="email" id="email" name="email" class="form-control" value="" placeholder="Your Email *" >
                                    </div>
                                 </div>
                                

                                 <!--<div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                       <input type="text" id="address" name="address" class="form-control" value="" placeholder="Address" >
                                    </div>
                                 </div>-->
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                       <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Phone no" pattern="[789][0-9]{9}" onkeypress="if(this.value.length==10) return false;">
                                    </div>
                                 </div>
                                 <!--
                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                       <input type="text" id="subject" name="subject" class="form-control" value="" placeholder="Subject" >
                                    </div>

                                 </div>
                                -->
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                       <textarea id="qry" name="message" class="form-control required" placeholder="Type Your Message Here . . ."></textarea>
                                    </div>
                                    <div class="form-group form-bottom">
                                      <center> <button type="submit" class="button_all" name="submit"> Submit </button> </center>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-md-3"></div>
                  
								 
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