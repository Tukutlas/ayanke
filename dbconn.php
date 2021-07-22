<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "ayankeStore");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/ayanke/');
define('SITE_PATH','http://127.0.0.1/ayanke/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');

define('SLIDER_IMAGE_SERVER_PATH',SERVER_PATH.'media/sliders/');
define('SLIDER_IMAGE_SITE_PATH',SITE_PATH.'media/sliders/');

define('COLLECTION_IMAGE_SERVER_PATH',SERVER_PATH.'media/category/');
define('COLLECTION_IMAGE_SITE_PATH',SITE_PATH.'media/category/');
?>