<?php 
require("top.php");

$cat_id=get_safe_value($con,$_GET['id']);
if($cat_id>0){
    $get_product = get_product($con,'',$cat_id, '');
}else{
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}

$cat = mysqli_query($con, "select category from category where category.id='$cat_id'");
$cat_details=mysqli_fetch_assoc($cat);

?>

<!-- page-banner Start  -->
<div class="page-banner section">
  <div class="container">
    <div class="page-banner-wrapper text-center">
      <h2 class="page-title"><?php echo $cat_details['category'] ?></h2>
      <ul class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active"><?php echo $cat_details['category'] ?></li>
      </ul>
    </div>
  </div>
</div>
<!-- page-banner End -->

<!-- Shop Start -->
<div class="section section-padding-04">
  <div class="container">
    <div class="row">
      <div class="col-lg-3"> 
        <!-- Sidebar Widget Start -->
        <aside class="sidebar-widget"> 
          <!-- Widget Item Start -->
          <div class="widget-item">
            <h4 class="widget-title">Filters by CATEGORIES </h4>
            <div class="widget-link">
              <ul class="ps-0">
                <li> <a href="#">Men</a>
                  <div class="category-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#category01"> <span class="add"><i class="fa fa-angle-down"></i></span> <span class="remove"><i class="fa fa-angle-up"></i></span> </div>
                  <div class="collapse" id="category01">
                    <ul class="category-sub-menu ps-0">
                      <li><a href="#">Skirts</a></li>
                      <li><a href="#">Leggings</a></li>
                      <li><a href="#">Jeans</a></li>
                      <li><a href="#">Pants & Capris</a></li>
                      <li><a href="#">Shorts</a></li>
                    </ul>
                  </div>
                </li>
                <li> <a href="#">Women</a>
                  <div class="category-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#category02"> <span class="add"><i class="fa fa-angle-down"></i></span> <span class="remove"><i class="fa fa-angle-up"></i></span> </div>
                  <div class="collapse" id="category02">
                    <ul class="category-sub-menu ps-0">
                      <li><a href="#">Skirts</a></li>
                      <li><a href="#">Leggings</a></li>
                      <li><a href="#">Jeans</a></li>
                      <li><a href="#">Pants & Capris</a></li>
                      <li><a href="#">Shorts</a></li>
                    </ul>
                  </div>
                </li>
                <li> <a href="#">Boys</a>
                  <div class="category-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#category03"> <span class="add"><i class="fa fa-angle-down"></i></span> <span class="remove"><i class="fa fa-angle-up"></i></span> </div>
                  <div class="collapse" id="category03">
                    <ul class="category-sub-menu ps-0">
                      <li><a href="#">Skirts</a></li>
                      <li><a href="#">Leggings</a></li>
                      <li><a href="#">Jeans</a></li>
                      <li><a href="#">Pants & Capris</a></li>
                      <li><a href="#">Shorts</a></li>
                    </ul>
                  </div>
                </li>
                <li> <a href="#">Girls</a>
                  <div class="category-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#category04"> <span class="add"><i class="fa fa-angle-down"></i></span> <span class="remove"><i class="fa fa-angle-up"></i></span> </div>
                  <div class="collapse" id="category04">
                    <ul class="category-sub-menu ps-0">
                      <li><a href="#">Skirts</a></li>
                      <li><a href="#">Leggings</a></li>
                      <li><a href="#">Jeans</a></li>
                      <li><a href="#">Pants & Capris</a></li>
                      <li><a href="#">Shorts</a></li>
                    </ul>
                  </div>
                </li>
                <li> <a href="#">Kids</a>
                  <div class="category-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#category05"> <span class="add"><i class="fa fa-angle-down"></i></span> <span class="remove"><i class="fa fa-angle-up"></i></span> </div>
                  <div class="collapse" id="category05">
                    <ul class="category-sub-menu ps-0">
                      <li><a href="#">Skirts</a></li>
                      <li><a href="#">Leggings</a></li>
                      <li><a href="#">Jeans</a></li>
                      <li><a href="#">Pants & Capris</a></li>
                      <li><a href="#">Shorts</a></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- Widget Item End --> 
          
          <!-- Widget Item Start -->
          <div class="widget-item">
            <h4 class="widget-title">Filters by BRAND</h4>
            <div class="widget-brand">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                <label class="form-check-label" for="flexCheckDefault"> American Eagle Outfitters </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                <label class="form-check-label" for="flexCheckDefault2"> Banana Republic </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                <label class="form-check-label" for="flexCheckDefault3"> Coach </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                <label class="form-check-label" for="flexCheckDefault4"> Gap </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
                <label class="form-check-label" for="flexCheckDefault5"> Nike </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
                <label class="form-check-label" for="flexCheckDefault6"> Old Navy </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked"> Victoria's Secret </label>
              </div>
              </div>
              
              <div class="widget-link more-brand mt-0">
              <ul class="ps-0">
                <li class="mt-0"> 
                  <div class="category-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#category06"> <span class="add"><a href="#" class="more ms-4">+ 27 More</a></span> <span class="remove"><a href="#" class="more ms-4">Less</a></span> </div>
                  <div class="collapse" id="category06">
                    <div class="widget-brand">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
                <label class="form-check-label" for="flexCheckDefault8"> Amante </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9">
                <label class="form-check-label" for="flexCheckDefault9"> Blackberrys </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10">
                <label class="form-check-label" for="flexCheckDefault10"> Bella Moda </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                <label class="form-check-label" for="flexCheckDefault11"> Chemistry </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault12">
                <label class="form-check-label" for="flexCheckDefault12"> Chkokko </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault13">
                <label class="form-check-label" for="flexCheckDefault13"> DailyObjects </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked14">
                <label class="form-check-label" for="flexCheckChecked14"> Dermacol </label>
              </div>
              
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault15">
                <label class="form-check-label" for="flexCheckDefault15"> Amante </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault16">
                <label class="form-check-label" for="flexCheckDefault16"> Blackberrys </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault17">
                <label class="form-check-label" for="flexCheckDefault17"> Bella Moda </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault18">
                <label class="form-check-label" for="flexCheckDefault18"> Chemistry </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault19">
                <label class="form-check-label" for="flexCheckDefault19"> Chkokko </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault20">
                <label class="form-check-label" for="flexCheckDefault20"> DailyObjects </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked21">
                <label class="form-check-label" for="flexCheckChecked21"> Dermacol </label>
              </div>
              
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault28">
                <label class="form-check-label" for="flexCheckDefault28"> Amante </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault22">
                <label class="form-check-label" for="flexCheckDefault22"> Blackberrys </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault23">
                <label class="form-check-label" for="flexCheckDefault23"> Bella Moda </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault24">
                <label class="form-check-label" for="flexCheckDefault24"> Chemistry </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault25">
                <label class="form-check-label" for="flexCheckDefault25"> Chkokko </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault26">
                <label class="form-check-label" for="flexCheckDefault26"> DailyObjects </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked27">
                <label class="form-check-label" for="flexCheckChecked27"> Dermacol </label>
              </div>
              
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault29">
                <label class="form-check-label" for="flexCheckDefault29"> Amante </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault30">
                <label class="form-check-label" for="flexCheckDefault30"> Blackberrys </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault31">
                <label class="form-check-label" for="flexCheckDefault31"> Bella Moda </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault32">
                <label class="form-check-label" for="flexCheckDefault32"> Chemistry </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault33">
                <label class="form-check-label" for="flexCheckDefault33"> Chkokko </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault34">
                <label class="form-check-label" for="flexCheckDefault34"> DailyObjects </label>
              </div>
              </div>
                  </div>
                </li>
                </ul>
                </div>
              
          </div>
          <!-- Widget Item End --> 
          
          <!-- Widget Item Start -->
          <div class="widget-item">
            <h4 class="widget-title">Price</h4>
            <fieldset class="filter-price">
              <div class="price-field">
                <input type="range"  min="100" max="500" value="100" id="lower">
                <input type="range" min="100" max="500" value="500" id="upper">
              </div>
              <div class="d-flex justify-content-between">
                <div class="price-wrap align-self-center"> <span>Price:</span>
                  <div class="price-wrap-1">
                    <label for="one">$</label>
                    <input id="one">
                  </div>
                  <div class="price-wrap_line">-</div>
                  <div class="price-wrap-2">
                    <label for="two">$</label>
                    <input id="two">
                  </div>
                </div>
                <a href="#" class="price-fillter">Filter</a> </div>
            </fieldset>
          </div>
          <!-- Widget Item End --> 
          
          <!-- Widget Item Start -->
          <div class="widget-item">
            <h4 class="widget-title">Choose by Color</h4>
            <div class="widget-color">
              <ul class="color-list ps-0">
                <li data-tooltip="tooltip" data-placement="top" title="Blue" data-color="#0074d9"></li>
                <li class="active" data-tooltip="tooltip" data-placement="top" title="Black" data-color="#000000"></li>
                <li data-tooltip="tooltip" data-placement="top" title="Gray" data-color="#9fa8ab"></li>
                <li data-tooltip="tooltip" data-placement="top" title="White" data-color="#ffffff"></li>
                <li data-tooltip="tooltip" data-placement="top" title="Dark green" data-color="#623730"></li>
                <li data-tooltip="tooltip" data-placement="top" title="Brown" data-color="#ef5619"></li>
                <li data-tooltip="tooltip" data-placement="top" title="Light green" data-color="#b6d5c5"></li>
                <li data-tooltip="tooltip" data-placement="top" title="blue dark" data-color="#333b71"></li>
                <li data-tooltip="tooltip" data-placement="top" title="Sea blue" data-color="#7c90c2"></li>
                <li data-tooltip="tooltip" data-placement="top" title="Sea green" data-color="#1c9bb5"></li>
                <li data-tooltip="tooltip" data-placement="top" title="Green" data-color="#63a809"></li>
                <li data-tooltip="tooltip" data-placement="top" title="Purple" data-color="#4e0a77"></li>
                <li data-tooltip="tooltip" data-placement="top" title="Pink" data-color="#ee3e6d"></li>
                <li data-tooltip="tooltip" data-placement="top" title="Orange" data-color="#ffbb42"></li>
              </ul>
            </div>
          </div>
          <!-- Widget Item End --> 
          
          <!-- Widget Item Start -->
          <div class="widget-item">
            <h4 class="widget-title">FILTER BY SIZE</h4>
            <div class="widget-size">
              <ul class="d-flex p-0">
                <li class="wc-size ms-0"><a href="#" class="ms-0">XS</a></li>
                <li class="wc-size active"><a href="#">S</a></li>
                <li class="wc-size"><a href="#">M</a></li>
                <li class="wc-size"><a href="#">L</a></li>
                <li class="wc-size"><a href="#">XL</a></li>
                <li class="wc-size"><a href="#">XXL</a></li>
              </ul>
            </div>
          </div>
          <!-- Widget Item End --> 
          
          <!-- Widget Item Start -->
          <div class="widget-item">
            <h4 class="widget-title">Tags</h4>
            <div class="widget-tag">
              <ul class="d-inline-block p-0">
                <li class="tag-link"><a href="#">accessories</a></li>
                <li class="tag-link"><a href="#">bag</a></li>
                <li class="tag-link"><a href="#">bodysuit</a></li>
                <li class="tag-link"><a href="#">caramel</a></li>
                <li class="tag-link"><a href="#">classic</a></li>
                <li class="tag-link"><a href="#">dress</a></li>
                <li class="tag-link"><a href="#">dry</a></li>
                <li class="tag-link"><a href="#">fabric</a></li>
                <li class="tag-link"><a href="#">fashion</a></li>
                <li class="tag-link"><a href="#">free</a></li>
                <li class="tag-link"><a href="#">hoodie</a></li>
                <li class="tag-link"><a href="#">jacket</a></li>
                <li class="tag-link"><a href="#">jeans</a></li>
                <li class="tag-link"><a href="#">shirt</a></li>
              </ul>
            </div>
          </div>
          <!-- Widget Item End --> 
          
          <!-- Widget Item Start -->
          <div class="widget-item">
            <h4 class="widget-title">Best Selling Items</h4>
            <div class="widget-best_selling"> 
              <!-- product carousel Start -->
              
              <ul class="thumbnails owl-carousel owl-theme owl-loaded owl-drag list-unstyled" id="widget_selling">
                <li>
                  <div class="product-grid-item">
                    <div class="product-element-top"> <a href="product-detail-v1.html"> <img class="thumbnail" src="assets/images/p-33.jpg" alt="ayanke"> </a></div>
                    <div class="product-content">
                      <div class="product-category-action d-block">
                        <div class="product-title"> <a href="product-detail-v1.html">Women floral dress</a> </div>
                        <div class="wrap-price">
                          <div class="wrapp-swap">
                    <div class="swap-elements"> <div class="price">
                      <div class="product-price"><div class="sale-price">$299.00</div> </div>
                      </div>
                      <div class="btn-add"> <a href="javascript:void(0)" class="add_to_cart_button"> <i class="fa fa-shopping-cart"></i> Add to cart</a> </div>
                    </div>
                  </div>
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
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="product-grid-item">
                    <div class="product-element-top"> <a href="product-detail-v1.html"> <img class="thumbnail" src="assets/images/p-34.jpg" alt="ayanke"> </a> </div>
                    <div class="product-content">
                      <div class="product-category-action">
                        <div class="product-title"> <a href="product-detail-v1.html">Women floral dress</a> </div>
                      </div>
                      <div class="wrap-price">
                        <div class="wrapp-swap">
                    <div class="swap-elements"> <div class="price">
                      <div class="product-price"><div class="sale-price">$299.00</div> </div>
                      </div>
                      <div class="btn-add"> <a href="javascript:void(0)" class="add_to_cart_button"> <i class="fa fa-shopping-cart"></i> Add to cart</a> </div>
                    </div>
                  </div>
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
                    </div>
                  </div>
                </li>
                <li>
                  <div class="product-grid-item">
                    <div class="product-element-top"> <a href="product-detail-v1.html"> <img class="thumbnail" src="assets/images/p-35.jpg" alt="ayanke"> </a> </div>
                    <div class="product-content">
                      <div class="product-category-action">
                        <div class="product-title"> <a href="product-detail-v1.html">Women floral dress</a> </div>
                      </div>
                      <div class="wrap-price">
                        <div class="wrapp-swap">
                    <div class="swap-elements"> <div class="price">
                      <div class="product-price"><div class="sale-price">$299.00</div> </div>
                      </div>
                      <div class="btn-add"> <a href="javascript:void(0)" class="add_to_cart_button"> <i class="fa fa-shopping-cart"></i> Add to cart</a> </div>
                    </div>
                  </div>
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
                    </div>
                  </div>
                </li>
              </ul>
              <!-- product carousel End --> 
            </div>
          </div>
          <!-- Widget Item End --> 
          
        </aside>
        
        <!-- Sidebar Widget End --> 
      </div>
      <?php if (count($get_product)>0) {?>
      <div class="col-lg-9"> 
        <!-- Shop Top Bar Start -->
        
        <div class="shop-to-bar d-flex justify-content-between">
          <div class="shop-top-left d-flex  align-self-center">
            <label>Views:</label>
            <ul class="nav">
              <li><a class="active" data-bs-toggle="tab" href="#grid"><i class="fa fa-th"></i></a></li>
              <li><a data-bs-toggle="tab" href="#list"><i class="fa fa-list"></i></a></li>
            </ul>
          </div>
          <div class="shop-top-right d-flex align-self-center">
            <label>Sort By:</label>
            <select class="select">
              <option value="0">Most Relevant</option>
              <option value="1">Name, A to Z</option>
              <option value="2">Name, Z to A</option>
              <option value="3">Price, low to high</option>
              <option value="4">Price, high to low</option>
            </select>
          </div>
        </div>
        <!-- Shop Top Bar End --> 
        
        <!-- Tab Content Start -->
        <div class="tab-content">
          
          <div class="tab-pane fade show active" id="grid">

            <div class="row">
            <?php
                  foreach($get_product as $list){
              ?>
              <div class="col-lg-4 col-sm-6"> 
                <!-- Single-Product Start -->
                <div class="product-grid-item">
                  <div class="product-element-top"> <a href="product.php?id=<?php echo $list['id']?>"> <img class="thumbnail" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="ayanke"> </a> </div>
                  <div class="ayanke-buttons">
                    <!-- <div class="ayanke-wishlist-btn"> <a class="" href="my-wishlist.html"><i class="flaticon-heart"></i></a> </div> -->
                    <div class="quick-view"> <a href="#" class="open-quick-view" data-bs-toggle="modal" data-bs-target="#quick_view"><i class="flaticon-search-2"></i></a> </div>
                  </div>
                  <div class="product-content">
                    <div class="product-category-action">
                      <div class="product-title"> <a href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a> </div>
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
                        <div class="swap-elements"> <div class="price">
                      <div class="product-price"> <div class="old-price"><span>&#8358;</span><?php echo $list['mrp']?></div> </div>
                      </div>
                      <div class="btn-add sale-price"><span>&#8358;</span><?php echo $list['price']?></div>
                      <!-- <div class="btn-add"> <a href="javascript:void(0)" class="add_to_cart_button"> <i class="fa fa-shopping-cart"></i> Add to cart</a> </div> -->
                    </div>
                  </div>
                    </div>
                  </div>
                </div>
                
                <!-- Single-Product End --> 
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="tab-pane fade" id="list"> 
            <?php
                  foreach($get_product as $list){
              ?>
            <!-- Single-Product Start -->
            <div class="product-list-item">
              <div class="row">
              
                <div class="col-md-3">
                  <div class="product-element-left"> <a href="product.php?id=<?php echo $list['id']?>"> <img class="thumbnail" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="ayanke"> </a> </div>
                </div>
                <div class="col-md-6">
                  <div class="product-content">
                    <div class="product-category-action d-block">
                      <div class="product-title"> <a href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a> </div>
                      <div class="product-rating d-flex">
                        <ul class="d-flex ps-0">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>(212)</span> </div>
                      <p><?php echo $list['short_desc']?> </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 wrap-price-right">
                  <div class="wrap-price">
                    <div class="swap-elements">
                      <div class="wrapp-swap">
                    <div class="swap-elements"> <div class="price">
                      <div class="product-price">
                        <span class="old-price">&#8358;<?php echo $list['mrp']?> </span> 
                        <span class="sale-price">&#8358;<?php echo $list['price']?></span>
                      </div>
                    </div>
                      <!-- <div class="btn-add"> <a href="javascript:void(0)" class="add_to_cart_button"> <i class="fa fa-shopping-cart"></i> Add to cart</a> </div> -->
                  </div>
                  </div>
                      <div class="ayanke-buttons">
                        <div class="d-flex justify-content-between">
                          <div class="ayanke-cart-btn "> <a href="product.php?id=<?php echo $list['id']?>" class="view_product_button"> View</a> </div>
                          <div class="ayanke-wishlist-btn"> <a class="" href="my-wishlist.html"><i class="fa fa-heart-o"></i></a> </div>
                        </div>
                        <div></div>
                        <!-- <div class="ayanke-compare-btn"> <a class="button ayanke-tooltip" href="compare.html"><i class="flaticon-reload"></i> Compare</a> </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
              
            </div>
            <!-- Single-Product End --> 
            <?php }?>
                       
          </div>
          
        </div>
        <!-- Tab Content End --> 
        
        <!-- Page pagination End -->
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li class="page-item"> <a class="page-link" href="#" aria-label="Previous"> <i class="fa fa-angle-left"></i> </a> </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">21</a></li>
            <li class="page-item"><a class="page-link" href="#">22</a></li>
            <li class="page-item"><a class="page-link" href="#">33</a></li>
            <li class="page-item"> <a class="page-link" href="#" aria-label="Next"> <i class="fa fa-angle-right"></i> </a> </li>
          </ul>
        </nav>
        <!-- Page pagination End --> 
        
        <!-- Page shop_text End -->
        <div class="shop_text">
          <p>Phasellus placerat orci tincidunt dui facilisis vehicula. <strong><ins class="text_dark">Etiam lobortis venenatis odio a pulvinar.</ins></strong> Donec laoreet vulputate eros, nec scelerisque tortor rutrum non. Morbi dapibus massa id sem dignissim, vel aliquam nunc vulputate. Etiam imperdiet arcu scelerisque nulla egestas posuere. Cras quis congue felis. Quisque dictum auctor nulla, sed tempor tortor aliquet vitae. Sed congue hendrerit ex nec laoreet.
            <mark class="text_white primary_dark">Nullam quis iaculis ex, in ullamcorper quam.</mark>
            Sed et ullamcorper magna, tempus posuere justo. Vestibulum luctus sagittis ante id malesuada. Vestibulum pretium convallis porttitor.</p>
          <p>Cras volutpat purus placerat tellus molestie pulvinar. <strong><em class="text_dark">Nulla nunc orci, dapibus sit amet massa quis, semper ultrices augue. Praesent posuere aliquam nibh, eget blandit augue tincidunt vel.</em></strong> Sed luctus facilisis posuere. Phasellus velit est, vulputate vel eleifend in, malesuada quis odio. </p>
        </div>
        <!-- Page shop_text End --> 
        
      </div>
      <?php }else {
                  echo "Data Not found";
              }?> 
    </div>
  </div>
</div>
<!-- Shop End -->





<?php
require("footer.php");
?>


