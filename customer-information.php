<?php
session_start();

if($_SESSION['user_id']==''){

//$_SESSION[user_id]='no';
header("location:login?y=1");
}
if(count(@$_SESSION['cart'][$id])==0){
header("location:product");
    
}


include('include/header.php'); 

$currency4='Rs';

if($_SESSION['user_id']!='')
{
$sql=mysqli_query($con,"select * from tbl_reg_mst where email='$_SESSION[user_id]'");
$fetch1=mysqli_fetch_array($sql);
}

/*$sql=mysqli_query($con,"select * from registration where email='$_SESSION[user_id]'");
$fetch1=mysqli_fetch_array($sql);*/


?>
<head>

<style type="text/css">

.none table tr td 
{
border-color: #fff;
}

.sale-label {
border: 1px solid #f23534;
background:  #f23534 
}

#ms0{ cursor: pointer;}
#ms1{ cursor: pointer;}
#ms2{ cursor: pointer;}
#ms3{ cursor: pointer;}
.tp-rightarrow.default {
z-index: 1 !important;
}
.tp-leftarrow.default {
z-index: 1 !important;
}
.fullwidthbanner-container .fullwidthabanner {
z-index: 0 !important;
}
.product-thumb .rating {
padding-bottom: 0px !important;
}
</style>
<script language="javascript">
function same_as(val)
{
if(val.checked==true)
{
document.getElementById('first_nameS').value=document.getElementById('last_nameB').value;

document.getElementById('addressS').value=document.getElementById('addressB').value;
document.getElementById('cityS').value=document.getElementById('cityB').value;
document.getElementById('pinS').value=document.getElementById('pinB').value;
document.getElementById('countryS').value=document.getElementById('countryB').value;
document.getElementById('stateS').value=document.getElementById('stateB').value;
document.getElementById('mobileS').value=document.getElementById('mobileB').value;
}else{
document.getElementById('first_nameS').value='';

document.getElementById('addressS').value='';
document.getElementById('cityS').value='';
document.getElementById('pinS').value='';
document.getElementById('countryS').value='';
document.getElementById('stateS').value='';
document.getElementById('mobileS').value='';

}

}
function validate_bill()
{ 

if(document.getElementById('first_nameB').value=='')
{
alert("Please Enter Last Name");
document.getElementById('first_nameB').focus();
return false;
}
if(document.getElementById('addressB').value=='')
{
alert("Please Enter Address");
document.getElementById('addressB').focus();
return false;
}
if(document.getElementById('cityB').value=='')
{
alert("Please Enter City");
document.getElementById('cityB').focus();
return false;
}
if(document.getElementById('pinB').value=='')
{
alert("Please Enter Pincode");
document.getElementById('pinB').focus();
return false;
}
if(document.getElementById('stateB').value=='')
{
alert("Please Enter State");
document.getElementById('stateB').focus();
return false;
}
if(document.getElementById('countryB').value=='')
{
alert("Please Enter Country");
document.getElementById('countryB').focus();
return false;
}

if(document.getElementById('mobileB').value=='')
{
alert("Please Enter Mobile Number");
document.getElementById('mobileB').focus();
return false;
}
if(isNaN(document.getElementById("mobileB").value))
{
alert("Please enter valid Mobile No.");
document.getElementById("mobileB").focus();
return false;
}



if(document.getElementById('emailB').value=='')
{
alert("Please Enter Email Address");
document.getElementById('emailB').focus();
return false;
}
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
var address = document.getElementById('emailB').value;
if(reg.test(address) == false)
{
alert('Invalid Email Address.');
document.getElementById('emailB').focus();
return false;
}
///

if(document.getElementById('first_nameS').value=='')
{ 
alert("Please Enter First Name");
document.getElementById('first_nameS').focus();
return false;
}

if(document.getElementById('addressS').value=='')
{
alert("Please Enter Address");
document.getElementById('addressS').focus();
return false;
}
if(document.getElementById('cityS').value=='')
{
alert("Please Enter City");
document.getElementById('cityS').focus();
return false;
}
if(document.getElementById('pinS').value=='')
{
alert("Please Enter Pincode");
document.getElementById('pinS').focus();
return false;
}
if(document.getElementById('stateS').value=='')
{
alert("Please Enter State");
document.getElementById('stateS').focus();
return false;
}
if(document.getElementById('countryS').value=='')
{
alert("Please Enter Country");
document.getElementById('countryS').focus();
return false;
}

if(document.getElementById('mobileS').value=='')
{
alert("Please Enter Mobile Number");
document.getElementById('mobileS').focus();
return false;
}
if(isNaN(document.getElementById("mobileS").value))
{
alert("Please enter valid Mobile No.");
document.getElementById("mobileS").focus();
return false;
}

}
</script>
</head>


<body>
<!--
<div class="slider1">
<div class="container most">
<div class="slider">
  <img src="images/login-bann.jpg" class="img-responsive">
</div>
<br><br>
</div>
-->

</div>
<br><br><br><br>	
<div id="container" class="container" style="">
<div id="content">
<div class="box">
<div class="row">
<div id="column-left">
<form action="after-checkout.php"  method="post" onSubmit="return validate_bill();">
<div class="col-md-7 col-sm-6 col-xs-12 none">
<div class="page-title"><h4 style="color:black; font-size:18px; ">Billing Address </h4></div>

<table width="100%"  border="none" cellspacing="0" cellpadding="0" style="border: none;">
<tr>
<td width="15%" height="40" style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">Name <strong style="color:#d00707">*</strong></td>
<td width="44%" height="40">
<input type="text" name="last_nameB" id="last_nameB"   class="textbox ped"  style=" width: 200px;padding-left:15px; height:35px;color:#000; font-size:14px; " value="<?php echo $fetch1['name'].' '.$fetch1['last_name'];?>" />           </td>
</tr>

<tr>

<td height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">Address<strong style="color:#d00707">*</strong></td>
<td height="40"><input type="text" name="addressB" class="textbox ped" style=" width: 200px;padding-left:15px; height:35px;color:#000; font-size:14px; "  style="height:50px;" id="addressB" value="<?php echo $fetch1['address'];?>" required/>
</td>
</tr>
<tr>

<td height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">City <strong style="color:#d00707">*</strong></td>
<td height="40"><input type="text" name="cityB"  class="textbox ped"  style=" width: 200px;padding-left:15px; height:35px;color:#000; font-size:14px; " id="cityB" value="<?php echo $fetch1['city'];?>" required size="30"/></td>
</tr>
<tr>

<td height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">PinCode <strong style="color:#d00707">*</strong></td>
<td height="40"><input type="text" name="pinB" class="textbox ped"  style=" width: 200px;padding-left:15px; height:35px;color:#000; font-size:14px; "  id="pinB" value="<?php echo $fetch1['pin'];?>" required size="30" onkeypress="if(this.value.length==6) return false;"/></td>
</tr>
<tr>

<td height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">State<strong style="color:#d00707">*</strong></td>
<td height="40"><input type="text" name="stateB"  class="textbox ped"  style=" width: 200px;padding-left:15px; height:35px;color:#000; font-size:14px; " id="stateB" value="<?php echo $fetch1['state'];?>" required size="30"/></td>
</tr>
<tr>

<td height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">country<strong style="color:#d00707">*</strong></td>
<td height="40"><input type="text" name="countryB"  class="textbox ped"  style=" width: 200px;padding-left:15px; height:35px;color:#000; font-size:14px; " id="countryB" value="India" required size="30"/></td>
</tr>

<tr>

<td height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">Mobile No <strong style="color:#d00707">*</strong></td>
<td height="40"><input type="text" name="mobileB"  class="textbox ped"  style=" width: 200px; padding-left:15px; height:35px;color:#000; font-size:14px; " id="mobileB" value="<?php echo $fetch1['mobile'];?>" size="30"/></td>
</tr>
<tr>

<td height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;" nowrap="nowrap">Email Address <strong style="color:#d00707">*</strong></td>
<td height="40"><input type="text" name="emailB"  class="textbox ped"  style=" width: 250px; padding-left:15px; height:35px;color:#000; font-size:14px; " id="emailB" value="<?php echo $fetch1['email'];?>" size="30"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td height="40">&nbsp;</td>
<td height="40">&nbsp;</td>
</tr>
</table>
</div></div>
<div class="col-md-7 col-sm-6 col-xs-12 none" style="padding-left: 200px;">
<div id="column-left"   >
<div class="page-title"><h2  style="color:black; font-size:18px; margin-bottom:15px;"> Shipping Address <span style="font-size:10px;">&nbsp;</span>
<span style="font-weight:normal; font-size:10px;"> &nbsp;&nbsp;<input style="width:15px;padding-left:15px; height:15px;" type="checkbox"  name="sameas"  onClick="same_as(this);"/>

<font color="black" class="cart-head" size="+1"> Same as Billing Address</font> </span> </h2></div>
<table width="90%" cellspacing="0" border="none" cellpadding="0"  style="border: none;">

<tr>

<td width="18%" height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">Name <strong style="color:#d00707">*</strong></td>
<td width="63%" height="40"><input type="text" class="textbox"  style=" width:200px;padding-left:15px; height:35px; color:#000; font-size:14px;"  name="first_nameS" id="first_nameS" size="30" class="text_box" required="" /></td>
</tr>

<tr>

<td height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">Address<strong style="color:#d00707">*</strong></td>
<td height="40"><input type="text" name="addressS" class="textbox" required style=" width: 200px;padding-left:15px; height:35px;color:#000; font-size:14px; " id="addressS" style="height:50px;" class="text_box" /></td>
</tr>
<tr>

<td height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">City <strong style="color:#d00707">*</strong></td>
<td height="40"><input type="text" id="cityS" class="textbox" required style=" width: 200px;padding-left:15px; height:35px;color:#000; font-size:14px; " name="cityS" size="30" class="text_box" /></td>
</tr>
<tr>

<td height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">PinCode<strong style="color:#d00707">*</strong></td>
<td height="40"><input type="text" name="pinS"class="textbox" required style=" width: 200px;padding-left:15px; height:35px;color:#000; font-size:14px; " id="pinS" size="30" class="text_box"onkeypress="if(this.value.length==6) return false;" /></td>
</tr>
<tr>

<td height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">State<strong style="color:#d00707">*</strong></td>
<td height="40"><input type="text" name="stateS"class="textbox" required style=" width: 200px;padding-left:15px; height:35px;color:#000; font-size:14px; " id="stateS" size="30" class="text_box"/></td>
</tr>
<tr>

<td height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">country <strong style="color:#d00707">*</strong></td>
<td height="40"><input type="text" name="countryS"class="textbox"  style=" width: 200px;padding-left:15px; height:35px;color:#000; font-size:14px; " id="countryS" size="30" class="text_box" value="India" /></td>
</tr>

<tr>

<td height="40"  style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;">Mobile No <strong style="color:#d00707">*</strong></td>
<td height="40"><input type="text" name="mobileS" class="textbox"  style=" width: 200px;padding-left:15px; height:35px;color:#000; font-size:14px; " id="mobileS" size="30" class="text_box" required="" /> </td>
</tr>

<tr>
<td height="40" >&nbsp;</td>
<td height="40"><input type="submit"  name="details" value="Next "   style="       display: inline-block;
padding: 8px 25px;
background: #f9b60d;
color: black;
font-size: 14px;
line-height: 18px;
text-transform: uppercase;
border: none;
outline: none;
border-radius: 7px;
margin-top: 10px;
transition: 0.2s;
-webkit-transition: 0.2s;"/></td>
</tr>

</table>
</div></div>
</form>
</div>
</div>
</div> 
</div> 


<?php include('include/footer.php');?>
