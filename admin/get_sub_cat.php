<?php
require('dbconn.php');
require('functions_inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:login.php');
	die();
}

$category_id = get_safe_value($con, $_POST['category_id']);
$res=mysqli_query($con, "select * from sub_category where category_id='$category_id' and status='1'");
$check=mysqli_num_rows($res);
if($check>0){ 
	$html='';
	while ($row=mysqli_fetch_assoc($res)) {
		$html.="<option value=".$row['id'].">".$row['sub_category']."</option>";
	}
	echo $html;
}else {
	echo "<option>No sub-category found</option>";
}
?>
