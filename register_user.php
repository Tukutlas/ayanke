<?php
require('dbconn.php');
require('functions.php');

$name = get_safe_value($con,$_POST['reg_name']);
$email=get_safe_value($con,$_POST['reg_email']);
$mobile = get_safe_value($con,$_POST['reg_mobile']);
$password = get_safe_value($con,md5($_POST['reg_password']));
$res=mysqli_query($con,"select * from users where email='$email'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
    echo "exists";
} else {
    $date = date('Y-m-d h:i:s');
    mysqli_query($con,"INSERT INTO users (name, email, mobile, password, added_on) VALUES ('$name', '$email', '$mobile', '$password', '$date')");
    echo "insert";
}

?>