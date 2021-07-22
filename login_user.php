<?php
require('dbconn.php');
require('functions.php');

$email=get_safe_value($con,$_POST['login_email']);
$password = get_safe_value($con,md5($_POST['login_password']));
$res=mysqli_query($con,"select * from users where email='$email' and password='$password'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
	$row=mysqli_fetch_assoc($res);
	$_SESSION['USER_LOGIN']='yes';
	$_SESSION['USER_ID']=$row['id'];
	$_SESSION['USER_NAME']=$row['name'];
	$_SESSION['EMAIL'] = $row['email'];
	$_SESSION['PHONE'] = $row['phone'];
	echo "valid";
} else {
    echo "invalid";
}

?>