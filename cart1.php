<?php
error_reporting(0);
session_start();
include('chowkdi_admin/config/connection.php'); 
//echo $_GET['action']; die;
	  $qty = $_GET['opt'];
 $id = $_GET['prod_id'];



$query=mysqli_query($con,"select * from tbl_product where id='$id'");
$row=mysqli_fetch_array($query);
 $stock_qty=$row['stock_qty'];

          
		if(@$_GET['action']=="Add")
	{
		
		
		if($qty<=$stock_qty)
	
		{
			$_SESSION['cart'][$id]=$qty; 
		  header("location:cart.php");	
			 exit(0);	  
					  
		
		}
		else
		
		{
		    echo "<script>alert('This quantity is out of stock..');
window .location.href='cart';
</script>";  
			    
	 
		}	  
					  
		
			
			 
		} 
		if(@$_GET['action']=="Remove" && @$_GET['prod_id']!='')
	        {
include('chandrarupa_admin/config/connection.php'); 
			//echo "jghj"; die;
			 $id=$_GET['prod_id'];
		    $_SESSION['cartdlt'] = 'delete_pro_id';
	$query=mysqli_query($con,"delete from tbl_cart where id='$id'");
             unset($_SESSION['cart'][$id]);
			 header("location:cart");	
			 exit(0);
			
	 
			}

			if(isset($_POST['submit']))
			{

				$qty = $_POST['qty'];
				$cart_id = $_POST['cart_id'];
				for($i=0;$i<count($cart_id);$i++)
				{
				    $product_info_stock = mysqli_fetch_array(mysqli_query($con,"select * from tbl_product where id in (select product_id from tbl_cart where id='".(int)$cart_id[$i]."')"));
				    if($qty[$i]>$product_info_stock['stock_qty'])
				    {
				        $prod_nm = $product_info_stock['product_name'];
				        echo "<script>alert('This Quantitiy is Out Of Stock For $prod_nm')</script>";
				    }
				    else
				    {
					$sql = mysqli_query($con,"update tbl_cart set qty='".(int)$qty[$i]."' where id='".(int)$cart_id[$i]."'");
				    }
				 $product_cart=mysqli_query($con,"select * from tbl_cart where session_id='".$session_id."'");
//$_SESSION['cart']=mysqli_num_rows($product);
if(mysqli_num_rows($product_cart)>0)
{
    while($product_cart_list = mysqli_fetch_array($product_cart))
    {
        $total_cart_value += $product_cart_list['qty']*$product_cart_list['total_price'];
    }
    
    if($_SESSION['shopping_amt']>$total_cart_value)
                           {
                                unset($_SESSION['coupon_code']);
                                unset($_SESSION['coupon_amount']);
                                unset($_SESSION['cart_value']); 
                                unset($_SESSION['shopping_amt']);
                                unset($_SESSION['coupon_id']);
                                unset($_SESSION['coupon_status']);
                                                }
}
}
	                header('location:cart');
				
			
}
if($_GET['prod_id']!='' && $_GET['opt']!='')
{
    include('chandrarupa_admin/config/connection.php'); 
//echo "update tbl_cart set qty='".(int)$_GET['opt']."' where id='".(int)$_GET['prod_id']."'"; die;
    $_SESSION['cart1']='cart1';
	$sql = mysqli_query($con,"update tbl_cart set qty='".(int)$_GET['opt']."' where id='".(int)$_GET['prod_id']."'");
	header('location:cart');
	exit();
}			
						
     if($_GET['action']=="allRemove")
	        {
	            include('chandrarupa_admin/config/connection.php'); 
			     $id=$_GET['prod_id'];
			$getdata=mysqli_query($con,"select * from tbl_cart where product_id='$id'");
$getres=mysqli_fetch_array($getdata);
$userId=$getres['user_id'];
mysqli_query($con,"delete from tbl_promocode where user_id='$userId'");
				$query1=mysqli_query($con,"delete from tbl_cart where product_id='$id'");
					$query2=mysqli_fetch_array(mysqli_query($con,"select * from tbl_cart where product_id='$id' and user_id='$_SESSION[id]'"));
				
			 header("location:cart?session_id='$query2[session_id]'");
			    			unset($_SESSION['cart'][$id]);
			     exit(0);
			
	 
			}
	 
		
		
	

?>

