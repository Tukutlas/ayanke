<?php
require('top.php');

$res_slider=mysqli_query($con, "select * from carousel where status=1");

?>

<!-- Slider Start  -->
<?php if (mysqli_num_rows($res_slider)>0) {?>
<div class="slider slider-one">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <?php 
    while ($row_slider=mysqli_fetch_assoc($res_slider)) {
?>
    <ol class="carousel-indicators">
      <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
      <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active"> <img src="<?php echo SLIDER_IMAGE_SITE_PATH.$row_slider['image']?>" class="d-block w-100" alt="ayanke">
        <div class="carousel-caption text-start color-scheme-dark">
          <div class="container">
            <h5 class="aos-init aos-animate"><?php echo $row_slider['main_heading'];?></h5>
            <h3><?php echo $row_slider['sub_heading'];?></h3>
            <!-- <a href="shop-grid-left-sidebar.html" class="slider-btn primary_dark_btn">Shop Now</a> </div> -->
            <form action="view.php" method="get">
                <input type="hidden" name="str" value="<?php echo $row_slider['btn_keyword'];?>">
                <button class="slider-btn primary_dark_btn" type="submit"><?php echo $row_slider['btn_txt'];?></button>
            </form>
        </div>
      </div>
      <?php } ?>
    </div>
    
  </div>
</div>
<?php } ?>
<!-- Slider End --> 

<!-- New Arrivals Start -->
<section class="new_arrivals section-padding-03">
  <div class="container"> 
    <!-- Section Title Start -->
    <div class="section-title text-center">
      <h4 class="title text_darkt">New Arrivals</h4>
      <span class="title-subtitle text_light">But I must explain to you how all this mistaken idea</span> </div>
    <!-- Section Title End --> 
    
    <!-- product Start -->
    <div class="row">
      <div class="col-md-12"> 
        
        <!-- product carousel Start -->
        
        <ul class="thumbnails owl-carousel owl-theme owl-loaded owl-drag list-unstyled" id="new_arrivals">
        <?php
          $get_product = get_products($con,'latest',6);
          foreach($get_product as $list){
        ?>
          <li>
            <div class="product-grid-item">
              <div class="product-element-top"> <a href="product.php?id=<?php echo $list['id']?>"> <img  class="thumbnail" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="ayanke"> </a> <span class="new product-label">New</span> </div>
              <div class="product-content">
                <div class="product-category-action">
                  <div class="product-title"> <a href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></div>
                </div>
                <div class="wrap-price">
                  <div class="wrapp-swap">
                    <div class="swap-elements">
                      <div class="price">
                        <div class="product-price">
                          <div class="old-price"><span>&#8358;</span><?php echo $list['mrp']?></div>
                        </div>
                      </div>
                      <div class=" btn-add sale-price"><span>&#8358;</span><?php echo $list['price']?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <?php } ?>
        </ul>
        
        <!-- product carousel End --> 
      </div>
      <div class="col-md-12"> 
        <!-- View All Products Start -->
        <div class="text-center"> <a href="shop-grid-left-sidebar.html" class="load-more primary_dark_btn">View All Products</a> </div>
        <!-- View All Products End --> 
      </div>
    </div>
    <!-- product End --> 
    
  </div>
</section>
<!-- New Arrivals End --> 

<!-- Categories Start -->
<div class="categories categories-one section-padding">
  <div class="container">
    <div class="row">
      <div class="col-sx-12 col-sm-6 col-md-12 col-lg-6">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
            <?php
              foreach ($cat_arr as $list) {
            ?>
              <div class="col-md-6">
                <div class="banner-item banner-01"> <a href="categories.php?id=<?php echo $list['id']?>"> 
                <img class="w-100" src="<?php echo COLLECTION_IMAGE_SITE_PATH.$list['image']?>" alt="banner"> </a>
                  <div class="banner-text"> <a href="categories.php?id=<?php echo $list['id']?>" class="primary_dark_btn"><?php echo $list['category']?></a> </div>
                </div>
              </div>
              
              <?php }?>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Categories End --> 



<!-- Newsletter Start -->
<section class="newsletter color-scheme-white">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="newsletter-title">
          <h4 class="title no_after">Join Our Newsletter</h4>
          <span class="title-subtitle pt-0">Sign up to receive the latest promotional information </div>
        <div class="newsletter-form">
          <form id="subscriber-form" method="post">
            <input type="email" name="subscribe_email" id="subscribe_email" placeholder="Your email address">
            <button type="submit" onClick="subscribe()" >Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Newsletter End --> 

<?php 
require('footer.php');
?>