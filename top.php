<?php
require('dbconn.php');
require('functions.php');
require('add_to_cart.inc.php');

$cat_res = mysqli_query($con, "select * from category where status=1 order by category asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
    $cat_arr[]=$row;
}


$sub_res = mysqli_query($con, "select * from sub_category where status=1 order by category_id asc");
$sub_arr=array();
while($sub_row=mysqli_fetch_assoc($sub_res)){
    $sub_arr[]=$sub_row;
}


$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();

?>

<!doctype html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/vendors/owlcarousel/css/owl.carousel.min.css" />
<link rel="stylesheet" href="assets/vendors/owlcarousel/css/owl.theme.default.min.css" />
<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">
<title>ayanke</title>
</head>
<body>
<!-- Header Start -->
<header class="header section"> 
  <!-- Header Top Start -->
  <div class="header-top primary_dark color-scheme-white">
    <div class="container">
      <div class="row justify-content-between"> 
        <!-- Header info Start -->
        <div class="col">
          <div class="header-top-info d-flex"> <a href="tel:+0189006690"><i class="fa fa-phone"></i> +018 900 6690</a> <a href="mailto:info@example.com"><i class="fa fa-envelope-o"></i> support@ayanke.com</a> </div>
        </div>
        <!-- Header info End --> 
        
        <!-- Header Top Menu Start -->
        <div class="col d-none d-lg-block">
          <div class="header-top-action">
            <div class="header-top-links">
              <ul>
                <li><a href="about.php">About Us</a></li>
                <!-- <li><a href="blog-list-v1.html">Blog</a></li> -->
                <li class="pe-0"><a href="contact.php">Contact us</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Header Top Menu End --> 
      </div>
    </div>
  </div>
  <!-- Header Top End --> 
  
  <!-- Header Bottom Start -->
  <div class="header-bottom color-scheme-dark d-none d-lg-block">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3"> 
          <!-- Header Logo Start -->
          <div class="header-logo"> <a href="index.php"><img src="assets/images/..." alt="ayanke"></a> </div>
          <!-- Header Logo End --> 
        </div>
        <div class="col-lg-6"> 
          <!-- ayanke Menu Start -->
          <div class="ayanke-menu">
            <nav>
              <ul>
                <li class="active"><a href="index.php">Home</a></li>
                <li class="menu-item-has-children"> <a href="#">Collection</a>
                  <div class="sub-menu">
                    <ul class="d-block">
                    <?php
                        foreach ($cat_arr as $list) {
                    ?>
                        <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['category']?></a></li>
                    <?php
                        }
                    ?>
                    </ul>
                  </div>
                </li>
                <li class="position-static"> <a href="#" class="page-item-has-children">Page</a>
                  <div class="mega-menu">
                    <div class="container">
                      <ul>
                        <li class="menu-item-has-children">
                          <h3>Sub Collection</h3>
                          <ul class="sub-sub-menu">
                          <?php
                                foreach ($sub_arr as $sub_list) {
                            ?>
                                <li><a href="categories.php?id=<?php echo $sub_list['id']?>"><?php echo $sub_list['sub_category']?></a></li>
                            <?php
                                }
                            ?>
                          </ul>
                        </li>
                        <li class="menu-item-has-children">
                          <h3>AFC Pages</h3>
                          <ul class="sub-sub-menu">
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="faq.php">FaQs</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                          </ul>
                        </li>
                        <li class="menu-item-has-children">
                          <h3>My Pages</h3>
                          <ul class="sub-sub-menu">
                            <li><a href="my-acount-dashboard.html">My Account</a></li>
                            <li><a href="cart.php">My Cart</a></li>
                            <li><a href="my-wishlist.html">Wishlist</a></li> 
                            <li><a href="compare.html">Compare</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a></li>
                          </ul>
                        </li>
                        <li class="menu-item-has-product"> <img class="w-100" src="assets/images/menu-image.jpg" alt="ayanke"> </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </nav>
          </div>
          <!-- ayanke Menu End --> 
        </div>
        <div class="col-lg-3"> 
          <!-- Header Action Start -->
          <div class="header-action"> 
              <a href="javascript:void(0)" class="action header-action-btn header-action-btn-search"><i class="flaticon-search"></i> </a> 
              <?php 
                if(isset($_SESSION['USER_LOGIN'])){
                    echo '<ul>
                            <li class="menu-item-has-children">
                              <a href="#"><i class="flaticon-user"></i></a>
                              <div class="sub-menu">
                                <ul class="d-block">
                                  <a href="logout.php">Logout</a>
                                </ul>
                              </div>
                            </li>
                          </ul>';
                    
                }else {
                    echo '<a href="#" class="action" data-bs-toggle="modal" data-bs-target="#login"><i class="flaticon-user"></i></a>';
                }
              ?> 
              <a href="my-wishlist.html" class="action"><i class="flaticon-like"></i><span class="nt_count_wishlist">0</span></a>
            <div class="dropdown"> 
              <a class="action cart d-flex header-action-btn header-action-btn-cart" href="javascript:void(0)"><i class="flaticon-shopping-bag"></i> <span class="htc_qua"><?php echo $totalProduct;?></span> 
                <!-- <span class="ayanke-cart-subtotal"> <span class="Price-amount"> <span class="Price-currencySymbol">$</span>0.00</span></span>  -->
              </a> 
            </div>
          </div>
          <!-- Header Action End --> 
          
        </div>
      </div>
    </div>
  </div>
  <!-- Header Bottom End --> 
</header>
<!-- Header End --> 

<!-- Header Mobile Start -->
<div class="header-mobile d-lg-none">
  <div class="container">
    <div class="row row-cols-2 align-items-center">
      <div class="col-4"> 
        <!-- Header Logo Start -->
        <div class="header-logo"> 
            <a href="index.php"><img src="assets/images/..." alt="ayanke"></a> 
        </div>
        <!-- Header Logo End --> 
      </div>
      <div class="col-8"> 
        <!-- Header Action Start -->
        <div class="header-action">
            <a href="my-wishlist.html" class="action"><i class="flaticon-like"></i><span class="nt_count_wishlist">0</span></a> 
                <a href="javascript:void(0)" class="action cart header-action-btn header-action-btn-cart"> <i class="flaticon-shopping-bag"></i> <span class="num">0</span> </a>
                <a href="javascript:;" class="action mobile-menu-open"><i class="flaticon-menu"></i></a> </div>
        
        <!-- Header Action End --> 
      </div>
    </div>
  </div>
</div>
<!-- Header Mobile End --> 

<!-- offcanvas Menu Start -->
<div class="offcanvas-menu d-lg-none color-scheme-light"> 
  <!--<a class="menu-close" href="javascript:void(0);">
            <span></span>
            <span></span>
        </a>-->
  <div class="offcanvas-menu-wrapper"> 
    
    <!-- Header Top search Start -->
    <div class="header-top-search">
      <form action="search.php" method="get">
        <input type="text" name="str" placeholder="Search Here...">
        <button type="submit"><i class="flaticon-search"></i></button>
      </form>
    </div>
    <!-- Header Top search End --> 
    <!-- ayanke Menu Start -->
    <div class="mobile-ayanke-menu">
      <nav>
        <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <li> <a href="#">Collection</a>
                <ul class="sub-menu">
                    <?php
                        foreach ($cat_arr as $list) {
                    ?>
                    <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['category']?></a></li>
                    <?php
                        }
                    ?>
                </ul>
            </li>
            

          <li> <a href="#">Pages</a>
            <ul class="mega-sub-menu">
              <li> <a href="#">Sub Collection</a>
                <ul class="menu-item">
                    <?php
                        foreach ($sub_arr as $sub_list) {
                    ?>
                        <li><a href="categories.php?id=<?php echo $sub_list['id']?>"><?php echo $sub_list['sub_category']?></a></li>
                    <?php
                        }
                    ?>
                </ul>
              </li>
              <li> <a href="#">AFC Pages</a>
                <ul class="menu-item">
                  <li><a href="about.php">About Us</a></li>
                  <li><a href="faq.php">FaQs</a></li>
                  <li><a href="contact.php">Contact Us</a></li>
                </ul>
              </li>
              <li> <a href="#">My Pages</a>
                <ul class="menu-item">
                  <li><a href="my-acount-dashboard.html">My Account</a></li>
                  <li><a href="cart.html">My Cart</a></li>
                  <li><a href="my-wishlist.html">Wishlist</a></li> 
        <li><a href="compare.html">Compare</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a></li>
                        </ul>
                    </li>
                    <li> <a href="#"><img class="w-100" src="assets/images/menu-image.jpg" alt="ayanke"></a> </li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#login">My Account</a></li>
                </ul>
            </nav>
            </div>
            <!-- ayanke Menu End --> 
        </div>
    </div>
<!-- offcanvas Menu End --> 

<!-- offcanvas Menu Start -->
<div class="menu-overlay"></div>
<!-- offcanvas Menu End --> 

<!-- Cart Offcanvas Start -->
<div class="cart-offcanvas-wrapper">
  <div class="offcanvas-overlay"></div>
  
  <!-- Cart Offcanvas Inner Start -->
  <div class="cart-offcanvas-inner"> 
    
    <!-- Button Close Start -->
    <div class="offcanvas-btn-close"> <a class="cart-close" href="javascript:;"> <span></span> <span></span> </a> </div>
    <!-- Button Close End --> 
    
    <!-- Offcanvas Cart Title Start -->
    <h2 class="offcanvas-cart-title mb-10">Shopping Cart</h2>
    <!-- Offcanvas Cart Title End --> 
    
    <!-- Offcanvas Cart Content Start -->
    <div class="offcanvas-cart-content color-scheme-dark"> 
      
      <!-- Cart Product/Price Start -->
      <div class="cart-product-wrapper mb-4"> 
      <?php
        $cart_total=0;
        foreach ($_SESSION['cart'] as $key=>$val) {
          $productArr=get_product($con,'','',$key);
          $pname=$productArr[0]['name'];
          $mrp=$productArr[0]['mrp'];
          $price=$productArr[0]['price'];
          $image=$productArr[0]['image'];
          $qty=$val['qty'];
          $cart_total=$cart_total+($price*$qty);
      ?>
        <!-- Single Cart Product Start -->
        <div class="single-cart-product">
          <div class="cart-product-thumb"> <a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="Cart Product"></a> </div>
          <div class="cart-product-content">
            <h3 class="title no_after"><a href="#"><?php echo $pname; ?></a></h3>
            <div class="product-price"><span class="sale-price"><?php echo $price; ?></span> </div>
          </div>
        </div>
        <!-- Single Cart Product End --> 
        
        <!-- Product Remove Start -->
        <div class="cart-product-remove"> <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="flaticon-error"></i></a> </div>
        <!-- Product Remove End --> 
        
      </div>
      <!-- Cart Product/Price End --> 
      <?php } ?>
      <!-- Cart Product Total Start -->
      <div class="cart-product-total"> <span class="value">Subtotal</span> <span class="price"><?php echo $cart_total?></span> </div>
      <!-- Cart Product Total End --> 
      
      <!-- Cart Product Button Start -->
      <div class="cart-product-btn mt-4"> <a href="cart.php" class="view-cart btn-hover-ayanke rounded-0 w-100">View cart</a> <a href="checkout.html" class="checkout rounded-0 w-100 mt-3">Checkout</a> </div>
      <!-- Cart Product Button End --> 
      
    </div>
    <!-- Offcanvas Cart Content End --> 
    
  </div>
  <!-- Cart Offcanvas Inner End --> 
</div>
<!-- Cart Offcanvas End --> 

<!-- Offcanvas Search Start -->
<div class="offcanvas-search">
  <div class="offcanvas-search-inner">
    <div class="search-wrapper">
      <form action="search.php" method="get">
        <input name="str" type="text" placeholder="Search Here...">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <!-- Button Close Start -->
    <div class="offcanvas-btn-close"> <a class="search-close" href="javascript:;"> <span></span> <span></span> </a> </div>
    <!-- Button Close End --> 
    
  </div>
</div>
<!-- Offcanvas Search End --> 




<!-- Modal -->
<div class="modal fade login" id="login" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body">
        <div class="column-left">
          <div class="login-wrpper">
            <h4 class="title title-small no_after mb-0">Login</h4>
            <div class="comments-form">
              <form id="login-form" method="post">
                <div class="row">
                  <div class="col-md-12">
                    <div class="single-form">
                      <input type="email" name="login_email" id="login_email" placeholder="Your email">
                    </div>
                    <span class="field_error" id="login_email_error"></span>
                  </div>
                  <div class="col-md-12">
                    <div class="single-form">
                      <input type="password" name="login_password" id="login_password" placeholder="Password">
                    </div>
                    <span class="field_error" id="login_password_error"></span>
                  </div>
                  <div class="col-md-12">
                    <div class="single-form d-flex justify-content-between submit_lost-password">
                      <button class="btn primary_dark_btn mt-0" name="login_submit" onClick="user_login()">Submit</button>
                      <div class="form-output login_msg" id="login_msg_error">
                        <p class="form-message field_error"></p>
                      </div>
                      <a href="#" class="lost-password">Lost your password?</a> </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="column-right">
          <div class="not-member">
            <h4 class="title title-small no_after text_white mb-0">Not a member?</h4>
            <span class="subtitle text_white mt-3">To keep connected with us please 
            login with your personal info.</span> 
            <a href="#" class="load-more primary_dark_btn mt-4" data-dismiss="modal" data-bs-toggle="modal" data-bs-target="#register">Create an account</a> </div>
        </div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>--> 
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade login" id="register" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body">
        <div class="column-right">
          <div class="not-member">
            <h4 class="title title-small no_after text_white mb-0">Welcome Back!</h4>
            <span class="subtitle text_white mt-3">To keep connected with us please 
            login your personal info.</span> <a href="#" class="load-more primary_dark_btn mt-4" data-bs-toggle="modal" data-bs-target="#login">Login</a> </div>
        </div>
        <div class="column-left">
          <div class="login-wrpper">
            <h4 class="title title-small no_after mb-0">Create an account</h4>
            <div class="comments-form">
              <form id="register-form" method="post">
                <div class="row">
                  <div class="col-md-12">
                    <div class="single-form">
                      <input type="text" name="reg_name" id="name" placeholder="Your name">
                      <span class="field_error" id="name_error"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="single-form">
                      <input type="email" name="reg_email" id="email" placeholder="Email address">
                      <span class="field_error" id="email_error"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="single-form">
                      <input type="text" name="reg_mobile" id="mobile" placeholder="Mobile Contact">
                      <span class="field_error" id="mobile_error"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="single-form">
                      <input type="password" name="reg_password" id="password" placeholder="Password">
                      <span class="field_error" id="password_error"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="privacy_policy.php">privacy policy.</a></p>
                  </div>
                  <div class="col-md-12">
                    <div class="single-form">
                      <button class="btn primary_dark_btn mt-0" name="reg_submit" onClick="user_register()">Register</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="form-output register_msg" id="msg_error">
                <p class="form-message field_error"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>--> 
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade login" id="quick_view" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body">
        
        
        <div class="product-image-summary product-v-one">
   
      <div class="row">
      <div class="col-md-6 product-images"> 
        <!-- Product Details Image Start -->
        <div class="product-details-img">
          <div class="row">
            
            <div class="col-12 position-relative"> 
              <!-- Single Product Image Start -->
              <div class="slider slider-for">
                <div>
                  <h3 class="m-0"><img src="assets/images/p-36.jpg" alt="Product"></h3>
                </div>
                                
              </div>
              <!-- Single Product Image End -->
  

            </div>
          </div>
        </div>
        <!-- Product Details Image End --> 
        
      </div>
      <div class="col-md-6 summary entry-summary">
        <div class="product-list-item">
          <div class="product-content">
            <div class="product-category-action d-block">
              <div class="product-title pt-0"> <a href="product-detail-v1.html">Women floral dress</a> </div>
              <div class="product-rating d-flex">
                <ul class="d-flex ps-0">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <span>(6 customer reviews)</span> </div>
            </div>
            <div class="product-price"> <span class="old-price">$39.00</span> <span class="sale-price">$39.00</span> </div>
            <div class="short-description">
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,</p>
            </div>
            
            <!-- Widget Item Start -->
            <div class="widget-item d-flex">
              <h4 class="widget-title">Color : </h4>
              <div class="widget-color">
                <ul class="color-list ps-0">
                  <li class="active ms-0" data-tooltip="tooltip" data-placement="top" title="Black" data-color="#000000"></li>
                  <li data-tooltip="tooltip" data-placement="top" title="Sea green" data-color="#1c9bb5"></li>
                  <li data-tooltip="tooltip" data-placement="top" title="Green" data-color="#63a809"></li>
                </ul>
              </div>
            </div>
            <!-- Widget Item End --> 
            
            <!-- Widget Item Start -->
            <div class="widget-item d-flex">
              <h4 class="widget-title">Size : </h4>
              <div class="widget-size">
                <ul class="d-flex p-0">
                  <li class="wc-size ms-0"><a href="#" class="ms-0">XS</a></li>
                  <li class="wc-size active"><a href="#">S</a></li>
                  <li class="wc-size"><a href="#">M</a></li>
                  <li class="wc-size"><a href="#">L</a></li>
                </ul>
              </div>
            </div>
            <!-- Widget Item End --> 
            
           
            
            <div class="d-flex quantity-cart_button">
              <div class="product-quantity d-inline-flex">
                <button type="button" class="sub">-</button>
                <input type="text" value="1">
                <button type="button" class="add">+</button>
              </div>
              <div class="ayanke-cart-btn"><a href="cart.html" class="button add_to_cart_button">Add to cart</a></div>
            </div>
            <div class="d-flex wishlist-compare">
              <div class="ayanke-wishlist-btn"> <a class="" href="my-wishlist.html"><i class="fa fa-heart-o"></i> Add to wishlist</a> </div>
              <div class="ayanke-compare-btn"> <a class="button d-flex" href="compare.html"><i class="flaticon-reload"></i> Compare</a> </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
        
        
      </div>
     </div>
    </div>
  </div>
</div>
