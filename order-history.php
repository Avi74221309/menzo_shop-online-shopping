<?php

@session_start();




  require("include/header.php");
if($_SESSION['user_id']=='')
{
    echo "<script>window.location.href='$baseurl/login'</script>";
}
if(isset($_SESSION['user_id']))

{

	

		$sql=mysqli_query($con,"select * from tbl_reg_mst where email='$_SESSION[user_id]'");

		$fetch=mysqli_fetch_array($sql);

	}else{

		

		//$_SESSION[user_id]='no';

		header("location:register.php");

			

		exit;

	}

 ?>


 
       
       <br>
         
         <div class="container" style="margin-top:80px;"
         <div class="row">
         <div class="box-heading" style="color:#FFFFFF"><h3 >Order History</h3></div>
          <div id="column-left" class="col-md-12 col-sm-12 col-xs-12">
             <form action="payment_status" method="post">  <table width="95%" border="0" cellspacing="0" cellpadding="0">
              <tr><td height="5"></td></tr>
               <tr>
                <tr>
                 <td  style="border:#999999 solid 1px;padding padding:3px;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" >
           
             <tr>
                <td width="19%" bgcolor="#fff" class="cart-head" height="30" align="center"><strong>&nbsp;<font color="#000">Sr. No</font></strong></td>
                <td width="18%" bgcolor="#fff" class="cart-head"><strong><font color="#000">Order ID</font></strong></td>

            
 
                <td width="15%" bgcolor="#fff" class="cart-head" style="padding-left:3px;"><strong><font color="#000">Transation ID</font></strong></td>
                <td width="25%" bgcolor="#fff" class="cart-head"><strong><font color="#000">Shopping's Date</font></strong></td>
                <td width="17%" bgcolor="#fff" class="cart-head"><strong><font color="#000">Status</font></strong></td>
              </tr> 
              
      <?php 
      

		  if($_GET[page]==''){

		 $i=1;

		 }else{

		 $i=((int)$_GET[page]-1) * 10 +1; 

		 }

		  $sql="select t1.*, t2.email from tbl_ordercust as t1, tbl_billing as t2 where t1.id = t2.order_id and t1.user_id='$fetch[id]'";

		  

		  if($_GET[filter]!='' && $_GET[filter]!='all')

		  {

		  	 $sql.=" AND t1.status='$_GET[filter]'";

		  }
        
        
	

		  	$sql.=" order by t1.id desc limit 10";
		 
          $sql1 = mysqli_query($con,$sql);
		 // $fetch_category=mysql_query($sql);



 
	while($row = mysqli_fetch_array($sql1)) {

			

		  	if($i%2==0)

			{

				$color="#ffffff";

			}else{

				

				$color="#ffffff";

			}

		  	  

			  

			  

	  	  

		  ?>
            <tr>
             <td align="center" height="">&nbsp;</td>
              </tr>
               <tr>
                <td height="20" valign="top" align="center"><?=$i?></td>
              

                <td valign="top"   style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;" style="padding-left:10px;"><span class="login-txt1"> <?=$row[ord_id]; ?></span></td>
                <td valign="top"   style="font-family:Arial, Helvetica, sans-serif; color:black; font-size:14px;" style="padding-left:5px;"><span class="login-txt1"><?php echo $row['paypal_id'];?></span></td>
             
                
                <td valign="top"   style="font-family:Arial, Helvetica, sans-serif; ccolor:black;font-size:14px;"><span class="login-txt1"> <?php echo date('d-m-Y',strtotime($row['add_date']));?> </span></td>
                   
                  

             <td valign="top"   style="font-family:Arial, Helvetica, sans-serif; ccolor:black;font-size:14px;"><span class="login-txt1">  <?php echo $row['status'];?><br /><br /><a href="javascript:var%20w=window.open('order_details.php?id=<?php echo $row['id'];?>','ContactInfo','width=900,height=550,toolbar=no,location=no,directories=no, status=no, menubar=no,scrollbars=yes, resizable=yes');"  style=" width:80px; margin-top:-10px; height:20px;background: #fff !important;color: #337ab7 !important; text-decoration:none; padding:5px;"  class="form-button-alt">

            View</a>
          
      </td>
                

              </tr>
            
              <tr>
                <td colspan="6" height="1" ></td>
              </tr>
             
              <?php $total2[] = $s2*$price;
$i++;
              }


                 $_SESSION['total_price']=$total_price;  
              ?>
             <tr>

            <td colspan="9"><table width="100%" border="0">

              <tr>

                <td width="65%"><span class="disc">

                  <?php if(mysqli_num_rows($rs)>10){

	//Display the full navigation in one go

	echo $pager->renderFullNav();

					  
?>
					  

					  

					

                </span></td>

				

                <td width="35%" align="right">&nbsp;</td>

              </tr>
   <?php }
               ?>
            </table> 
           </td>
          </tr>
          
        </table></td>
      </tr>
    </table></td>
          </tr>
           <tr>
            <td>&nbsp;</td>
          </tr>
       
          
        </table>
            </form>
          </div>
        </div></div></div>
    
<?php include("include/footer.php");?>
