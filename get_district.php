<?php
require_once("chowkdi_admin/config/connection.php");
if(!empty($_POST["state_id"])) 
{	
	$city= explode(".",$_POST['state_id']);
	$a=$city[0];
	$b=$city[1];
$query =mysqli_query($con,"SELECT * FROM district WHERE StCode = '" .$a. "'");
?>
<option value="">Select City</option>
<?php
while($row1=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row1['DistrictName']; ?>"><?php echo $row1['DistrictName']; ?></option>
<?php
}
}
?>
