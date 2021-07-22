<?php 
require("top.php");
$product_id=get_safe_value($con,$_GET['id']);
if($product_id>0){
    $get_product = get_product($con,'','', $product_id);
}
else{
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}

$resMultipleImages=mysqli_query($con, "select * from
product_images where product_id='$product_id'");
$multipleImages = [];
if (mysqli_num_rows($resMultipleImages)>0) {
    while ($rowMultipleImages=mysqli_fetch_assoc($resMultipleImages)) {
        $multipleImages[]=$rowMultipleImages['product_images'];
    }
}else {
    
}
?>
<!-- page-banner Start  -->
<div class="page-header breadcrumb-three section">
  <div class="container">
    <div class="page-banner-wrapper text-center d-flex justify-content-between">
      <ul class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="categories.php?id=<?php echo $get_product['0']['category_id']?>"><?php echo $get_product['0']['category']?></a></li>
        <li class="breadcrumb-item active"><?php echo $get_product['0']['sub_category'] ?></li>
      </ul>
    </div>
  </div>
</div>
<!-- page-banner End --> 

<!-- product Start  -->
<section class="section-padding-02 section-padding-03 product-image-summary product-v-one">
  <div class="container">
    <div class="row">
      <div class="col-md-6 product-images aos-animate"> 
        <!-- Product Details Image Start -->
        <div class="product-details-img">
          <div class="row">
            <?php 
                if (isset($multipleImages[0])) {
            ?>
            <div class="col-3"> 
              <!-- Single Product Thumb Start -->
              <div class="slider slider-nav">
                <?php foreach ($multipleImages as $list){
                    echo "<div class='divide'><img  src='".PRODUCT_IMAGE_SITE_PATH.$list."'
                        alt='product' /></div>";
                    }
                ?>
              </div>
              <!-- Single Product Thumb End --> 
            </div>
            <?php }?>

            <div class="col-9 position-relative"> 
              <!-- Single Product Image Start -->
              <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image'] ?>">

              <!-- Single Product Image End -->
              
            </div>
          </div>
          
        </div>
        <!-- Product Details Image End --> 
        
      </div>
      <div class="col-md-6 summary entry-summary">
        <div class="product-list-item">
          <div class="product-content">
            <div class="product-category-action pt-0 d-block">
              <div class="product-title pt-0"> <a href="#"><?php echo $get_product['0']['name'];?></a> </div>
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
            <div class="product-price"> <span class="old-price">&#8358;<?php echo $get_product['0']['mrp'];?></span> <span class="sale-price">&#8358;<?php echo $get_product['0']['price'];?></span> </div>
            <div class="short-description">
              <p><?php echo $get_product['0']['short_desc'];?></p>
            </div>
            <div class="d-flex quantity-cart_button">
              <div class="product-quantity d-inline-flex">
                <!-- <button type="button" class="sub">-</button>
                <input type="text" id="qty" value="1">
                <button type="button" class="add">+</button> -->
                <select id="qty">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                  <option>10</option>
                </select>
              </div>
              <div class="ayanke-cart-btn"><a href="javascript:void(0)" onClick="manage_cart('<?php
                  echo $get_product['0']['id']?>','add')" class="button add_to_cart_button">Add to cart</a>
              </div>
            </div>
            <!-- <div class="d-flex wishlist-compare">
              <div class="ayira-wishlist-btn"> <a class="" href="my-wishlist.html"><i class="fa fa-heart-o"></i> Add to wishlist</a> </div>
            </div> -->

            <!-- <div class="shipping-delivery">  -->
              
              <!-- Free Shipping Start  -->
              <!-- <div class="shipping">
                <div class="icone"> <i class="flaticon-shield"></i> </div>
                <div class="free_shipping_info">
                  <h5>100% Original 
                    Products</h5>
                </div>
              </div> -->
              <!-- Free Shipping End --> 
              
              <!-- Easy Returns Start  -->
              <!-- <div class="shipping">
                <div class="icone"> <i class="flaticon-delivery-truck"></i> </div>
                <div class="free_shipping_info">
                  <h5>Free Delivery on
                    above $149</h5>
                </div>
              </div> -->
              <!-- Easy Returns End --> 
              
              <!-- Fast Support Start  -->
              <!-- <div class="shipping">
                <div class="icone"> <i class="flaticon-return-of-investment"></i> </div>
                <div class="free_shipping_info">
                  <h5>Easy Return
                    upto 14 days </h5>
                </div>
              </div> -->
              <!-- Fast Support End --> 
              
            <!-- </div> -->
          
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- product End --> 


<!-- product-details-tabs Start -->
<section class="product-details-tabs trending_products section-padding-03 section-padding-04">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs pt-0" id="myTab" role="tablist">
          <li class="nav-item" role="presentation"> <a class="nav-link active text_light" id="womans-cloths-tab" data-bs-toggle="tab" href="#womans-cloths" role="tab" aria-selected="true">Specifications</a> </li>
          <!-- <li class="nav-item" role="presentation"> <a class="nav-link text_light" id="assessories-tab" data-bs-toggle="tab" href="#assessories" role="tab" aria-selected="false">Reviews (6)</a> </li>
          <li class="nav-item" role="presentation"> <a class="nav-link text_light" id="bags-tab" data-bs-toggle="tab" href="#bags" role="tab" aria-selected="true">Return Policy</a> </li> -->
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="specifications tab-pane fade show active" id="womans-cloths" role="tabpanel" aria-labelledby="womans-cloths-tab">
            <p><?php echo $get_product['0']['description'];?></p>
            <div class="product-anotherinfo-wrapper">
              <div class="row w-100">
                <div class="col-md-6">
                  <ul>
                    <li><span> Product Type</span> <?php echo $get_product['0']['sub_category'] ?></li>
                    <li><span>Meta Desc</span><?php echo $get_product['0']['meta_desc'] ?></li>
                    <li><span>Meta Keyword</span> <?php echo $get_product['0']['meta_keyword'] ?></li>
                    <li><span>Meta Title</span> <?php echo $get_product['0']['meta_title'] ?></li>
                    <li><span>Combo</span> Single</li>
                    <li><span>Size</span> S,M,L</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="assessories" role="tabpanel" aria-labelledby="assessories-tab">
            <div class="reviews">
              <h4 class="reviews-title">03 Reviews</h4>
              <div class="row">
                <div class="col-md-6">
                  <div class="reviews-comment">
                    <ul class="comment-items ps-0">
                      <li>
                        <div class="single-comment">
                          <div class="comment-thumb"> <img src="assets/images/thumb-01.jpg" alt="ayira"> </div>
                          <div class="comment-content">
                            <div class="comment-name-date d-flex">
                              <h5 class="name">Adam Gilcrist - </h5>
                              <span class="date">27 October, 2020</span> </div>
                            <div class="comment-rating">
                              <div class="rating-star" style="width: 80%;"></div>
                            </div>
                            <p>Rationally encounter consequences that extremely again is there anyone who loves or pursues or desires to obtain because</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="single-comment">
                          <div class="comment-thumb"> <img src="assets/images/thumb-02.jpg" alt="ayira"> </div>
                          <div class="comment-content">
                            <div class="comment-name-date d-flex">
                              <h5 class="name">Adam Gilcrist - </h5>
                              <span class="date">27 October, 2020</span> </div>
                            <div class="comment-rating">
                              <div class="rating-star" style="width: 87%;"></div>
                            </div>
                            <p>Rationally encounter consequences that extremely again is there anyone who loves or pursues or desires to obtain because</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="single-comment">
                          <div class="comment-thumb"> <img src="assets/images/thumb-03.jpg" alt="ayira"> </div>
                          <div class="comment-content">
                            <div class="comment-name-date d-flex">
                              <h5 class="name">Adam Gilcrist - </h5>
                              <span class="date">27 October, 2020</span> </div>
                            <div class="comment-rating">
                              <div class="rating-star" style="width: 48%;"></div>
                            </div>
                            <p>Rationally encounter consequences that extremely again is there anyone who loves or pursues or desires to obtain because</p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="reviews-form comments-all p-0 bg-transparent">
                    <h4 class="form-title">Add a Review</h4>
                    <form action="#">
                      <div class="reviews-rating">
                        <label>Your Rating:</label>
                        <ul id="rating" class="rating">
                          <li class="star" title="Poor" data-value="1"><i class="fa fa-star-o"></i></li>
                          <li class="star" title="Poor" data-value="2"><i class="fa fa-star-o"></i></li>
                          <li class="star" title="Poor" data-value="3"><i class="fa fa-star-o"></i></li>
                          <li class="star" title="Poor" data-value="4"><i class="fa fa-star-o"></i></li>
                          <li class="star" title="Poor" data-value="5"><i class="fa fa-star-o"></i></li>
                        </ul>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="single-form">
                            <input type="text" placeholder="Name">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="single-form">
                            <input type="email" placeholder="Email">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="single-form">
                            <textarea placeholder="Your Review"></textarea>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="single-form">
                            <button class="btn primary_dark_btn">Send</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="bags" role="tabpanel" aria-labelledby="bags">
            <div class="replacement">
              <p>If there is any issues with your product, you can raise a refund or replacement request within 10 days of receiving the product.</p>
              <p> Successful pick-up of the product is subject to the following conditions being met: </p>
              <ul>
                <li>Correct and complete product (with the original brand, article number, undetached MRP tag, product's original packaging, freebies and accessories) </li>
                <li>The product should be in unused, undamaged and original condition without any stains, scratches, tears or holes</li>
              </ul>
              <p>Know more about the Return Policy <a href="#">here</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- product-details-tabs End --> 


<!-- You may also like Start -->
<section class="new_arrivals you_like section-padding-03 section-padding-02">
  <div class="container"> 
    <!-- Section Title Start -->
    <div class="section-title text-center">
      <h4 class="title text_dark">You may also like</h4>
    </div>
    <!-- Section Title End --> 
    
    <!-- product Start -->
    <div class="row pt-4 mt-3">
      <div class="col-md-12"> 
        
        <!-- product carousel Start -->
        
        <ul class="thumbnails owl-carousel owl-theme owl-loaded owl-drag list-unstyled" id="collections">
          <li>
            <div class="product-grid-item">
              <div class="product-element-top"> <a href="product-detail-v1.html"> <img  class="thumbnail" src="assets/images/p-38.jpg" alt="ayira"> </a></div>
              <div class="ayira-buttons">
                <div class="ayira-wishlist-btn"> <a class="" href="my-wishlist.html"><i class="flaticon-heart"></i></a> </div>
                <div class="ayira-compare-btn"> <a class="button ayira-tooltip" href="compare.html"><i class="flaticon-reload"></i></a> </div>
                <div class="quick-view"> <a href="#" class="open-quick-view" data-bs-toggle="modal" data-bs-target="#quick_view"><i class="flaticon-search-2"></i></a> </div>
              </div>
              <div class="product-content">
                <div class="product-category-action">
                  <div class="product-title"> <a href="product-detail-v1.html">Women floral dress</a> </div>
                  <div class="product-rating d-flex">
                    <ul class="d-flex">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>(212)</span> </div>
                </div>
                <div class="wrap-price">
                  <div class="wrapp-swap">
                    <div class="swap-elements">
                      <div class="price">
                        <div class="product-price">
                          <div class="sale-price">$399</div>
                        </div>
                      </div>
                      <div class="btn-add header-action-btn-cart"> <a href="javascript:void(0)" class="add_to_cart_button"> <i class="fa fa-shopping-cart"></i> Add to cart</a> </div>
                    </div>
                  </div>
                  <div class="swatches-on-grid">
                    <div class="widget-color">
                      <ul class="color-list ps-0">
                        <li data-tooltip="tooltip" data-placement="top" title="Green" data-color="#63a809"></li>
                        <li data-tooltip="tooltip" data-placement="top" title="Pink" data-color="#ee3e6d"></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="product-grid-item">
              <div class="product-element-top"> <a href="product-detail-v1.html"> <img  class="thumbnail" src="assets/images/p-39.jpg" alt="ayira"> </a> </div>
              <div class="ayira-buttons">
                <div class="ayira-wishlist-btn"> <a class="" href="my-wishlist.html"><i class="flaticon-heart"></i></a> </div>
                <div class="ayira-compare-btn"> <a class="button ayira-tooltip" href="compare.html"><i class="flaticon-reload"></i></a> </div>
                <div class="quick-view"> <a href="#" class="open-quick-view" data-bs-toggle="modal" data-bs-target="#quick_view"><i class="flaticon-search-2"></i></a> </div>
              </div>
              <div class="product-content">
                <div class="product-category-action">
                  <div class="product-title"> <a href="product-detail-v1.html">Women floral dress</a> </div>
                  <div class="product-rating d-flex">
                    <ul class="d-flex">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>(25)</span> </div>
                </div>
                <div class="wrap-price">
                  <div class="wrapp-swap">
                    <div class="swap-elements">
                      <div class="price">
                        <div class="product-price">
                          <div class="sale-price">$399</div>
                        </div>
                      </div>
                      <div class="btn-add header-action-btn-cart"> <a href="javascript:void(0)" class="add_to_cart_button"> <i class="fa fa-shopping-cart"></i> Add to cart</a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="product-grid-item">
              <div class="product-element-top"> <a href="product-detail-v1.html"> <img  class="thumbnail" src="assets/images/p-40.jpg" alt="ayira"> </a></div>
              <div class="ayira-buttons">
                <div class="ayira-wishlist-btn"> <a class="" href="my-wishlist.html"><i class="flaticon-heart"></i></a> </div>
                <div class="ayira-compare-btn"> <a class="button ayira-tooltip" href="compare.html"><i class="flaticon-reload"></i></a> </div>
                <div class="quick-view"> <a href="#" class="open-quick-view" data-bs-toggle="modal" data-bs-target="#quick_view"><i class="flaticon-search-2"></i></a> </div>
              </div>
              <div class="product-content">
                <div class="product-category-action">
                  <div class="product-title"> <a href="product-detail-v1.html">Women floral dress</a> </div>
                  <div class="product-rating d-flex">
                    <ul class="d-flex">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>(110)</span> </div>
                </div>
                <div class="wrap-price">
                  <div class="wrapp-swap">
                    <div class="swap-elements">
                      <div class="price">
                        <div class="product-price">
                          <div class="sale-price">$399</div>
                        </div>
                      </div>
                      <div class="btn-add header-action-btn-cart"> <a href="javascript:void(0)" class="add_to_cart_button"> <i class="fa fa-shopping-cart"></i> Add to cart</a> </div>
                    </div>
                  </div>
                  <div class="swatches-on-grid">
                    <div class="widget-color">
                      <ul class="color-list ps-0">
                        <li data-tooltip="tooltip" data-placement="top" title="Sea blue" data-color="#7c90c2"></li>
                        <li class="active" data-tooltip="tooltip" data-placement="top" title="Black" data-color="#000000"></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="product-grid-item">
              <div class="product-element-top"> <a href="product-detail-v1.html"> <img  class="thumbnail" src="assets/images/p-41.jpg" alt="ayira"> </a> </div>
              <div class="ayira-buttons">
                <div class="ayira-wishlist-btn"> <a class="" href="my-wishlist.html"><i class="flaticon-heart"></i></a> </div>
                <div class="ayira-compare-btn"> <a class="button ayira-tooltip" href="compare.html"><i class="flaticon-reload"></i></a> </div>
                <div class="quick-view"> <a href="#" class="open-quick-view" data-bs-toggle="modal" data-bs-target="#quick_view"><i class="flaticon-search-2"></i></a> </div>
              </div>
              <div class="product-content">
                <div class="product-category-action">
                  <div class="product-title"> <a href="product-detail-v1.html">Women danim jacket</a> </div>
                  <div class="product-rating d-flex">
                    <ul class="d-flex">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>(04)</span> </div>
                </div>
                <div class="wrap-price">
                  <div class="wrapp-swap">
                    <div class="swap-elements">
                      <div class="price">
                        <div class="product-price">
                          <div class="sale-price">$399</div>
                        </div>
                      </div>
                      <div class="btn-add header-action-btn-cart"> <a href="javascript:void(0)" class="add_to_cart_button"> <i class="fa fa-shopping-cart"></i> Add to cart</a> </div>
                    </div>
                  </div>
                  <div class="swatches-on-grid">
                    <div class="widget-color">
                      <ul class="color-list ps-0">
                        <li data-tooltip="tooltip" data-placement="top" title="Light green" data-color="#b6d5c5"></li>
                        <li data-tooltip="tooltip" data-placement="top" title="blue dark" data-color="#333b71"></li>
                        <li data-tooltip="tooltip" data-placement="top" title="Sea blue" data-color="#7c90c2"></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="product-grid-item">
              <div class="product-element-top"> <a href="product-detail-v1.html"> <img  class="thumbnail" src="assets/images/p-16.jpg" alt="ayira"> </a></div>
              <div class="ayira-buttons">
                <div class="ayira-wishlist-btn"> <a class="" href="my-wishlist.html"><i class="flaticon-heart"></i></a> </div>
                <div class="ayira-compare-btn"> <a class="button ayira-tooltip" href="compare.html"><i class="flaticon-reload"></i></a> </div>
                <div class="quick-view"> <a href="#" class="open-quick-view" data-bs-toggle="modal" data-bs-target="#quick_view"><i class="flaticon-search-2"></i></a> </div>
              </div>
              <div class="product-content">
                <div class="product-category-action">
                  <div class="product-title"> <a href="product-detail-v1.html">Women floral dress</a> </div>
                  <div class="product-rating d-flex">
                    <ul class="d-flex">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>(212)</span> </div>
                </div>
                <div class="wrap-price">
                  <div class="wrapp-swap">
                    <div class="swap-elements">
                      <div class="price">
                        <div class="product-price">
                          <div class="sale-price">$399</div>
                        </div>
                      </div>
                      <div class="btn-add header-action-btn-cart"> <a href="javascript:void(0)" class="add_to_cart_button"> <i class="fa fa-shopping-cart"></i> Add to cart</a> </div>
                    </div>
                  </div>
                  <div class="swatches-on-grid">
                    <div class="widget-color">
                      <ul class="color-list ps-0">
                        <li data-tooltip="tooltip" data-placement="top" title="Green" data-color="#63a809"></li>
                        <li data-tooltip="tooltip" data-placement="top" title="Pink" data-color="#ee3e6d"></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
        <!-- product carousel End --> 
      </div>
    </div>
    <!-- product End --> 
    
  </div>
</section>
<!-- You may also like End --> 


<?php 
require("footer.php");
?>