<?php 
require("top.php");
$str=get_safe_value($con,$_GET['str']);
if($str!=''){
    $get_product = search_products($con, $str);
}else{
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}
?>

<!-- page-banner Start  -->
<div class="page-banner section">
  <div class="container">
    <div class="page-banner-wrapper text-center">
      <!-- <h2 class="page-title">Search</h2> -->
      <ul class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active">Search</li>
        <span class="breadcrumb-item active"><?php echo $str?></span>
      </ul>
    </div>
  </div>
</div>
<!-- page-banner End -->


        
        <!-- Page pagination End -->
        <!-- <nav aria-label="Page navigation example">
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
        </nav> -->
        <!-- Page pagination End --> 

<!-- Featured Collections Start -->
<section class="new_arrivals section-padding">
  <div class="container"> 
    <!-- Section Title Start -->
    <div class="section-title text-center">
      <h4 class="title text_dark">Search Results</h4>
    <!-- Section Title End --> 
    
    <!-- product Start -->
    <div class="row">
        <div class="col-md-12">
        <!-- product carousel Start -->
        <?php if (count($get_product)>0) {?>
        <ul class="thumbnails owl-carousel owl-theme owl-loaded owl-drag list-unstyled" id="new-arrivals">
            <?php
            foreach($get_product as $list){
            ?>
            <li>
            <div class="product-grid-item">
            
              <div class="product-element-top"> <a href="product.php?id=<?php echo $list['id']?>"><img class="thumbnail" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images" ></a></div>
              <div class="ayanke-buttons">
                <div class="quick-view"> <a href="#" class="open-quick-view" data-bs-toggle="modal" data-bs-target="#quick_view"><i class="flaticon-search-2"></i></a> </div>
              </div>
              <div class="product-content">
                <div class="product-category-action">
                  <div class="product-title"> <a href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></div>
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
        <div class="text-center"> <a href="#" class="load-more primary_dark_btn"></a> </div>
        <!-- View All Products End --> 
      </div>
    </div>
    <!-- product End --> 
    <?php 
    }else {
        echo "Data Not found";
    }?> 
  </div>
</section>
<!-- Featured Collections End --> 


<?php
require("footer.php");
?>