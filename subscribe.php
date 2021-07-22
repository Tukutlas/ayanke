<?php
require('dbconn.php');
require('functions.php');

$email = get_safe_value($con,$_POST['email']);
$subscribed_at = date('Y-m-d h:i:s');

    $res=mysqli_query($con,"select * from newsletter_subscribers where email='$email'");
	$check=mysqli_num_rows($res);
	if($check>0){
		echo "Email has been used for subscription";
	}else{
		mysqli_query($con,"INSERT INTO newsletter_subscribers (email,subscribed_at) VALUES ('$email','$subscribed_at')");
        echo "Thank You for subscribing";
	}



?>