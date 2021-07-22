<footer class="section footer-section color-scheme-dark"> 
  <!-- Footer Top Start -->
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-6 col-lg-3 col-xl-3 first-col">
          <div class="widget-text mt-55"> <a href="#"><img src="assets/images/" alt="ayanke"></a>
            <p class="text_dark">Question or feedback?</p>
            <div class="footer-top-info"> <a href="tel:+0189006690"><i class="fa fa-phone"></i> +018 900 6690</a> <a href="mailto:info@example.com" class="text_dark"><i class="fa fa-envelope"></i> support@ayanke.com</a> </div>
          </div>
          <div class="app-stor"> <span><a href="#"><img src="assets/images/app-stor.png" alt="ayanke"></a></span> <span><a href="#"><img src="assets/images/google-play.png" alt="ayanke"></a></span> </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 col-xl-3">
          <div class="single-footer-widget mt-55">
            <h2 class="widget-title">Company</h2>
            <ul class="widget-list p-0">
              <li><a href="about.php">About Us</a></li>
              <li><a href="contact.php">Get in Touch</a></li>
            </ul>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 col-xl-3">
          <div class="single-footer-widget mt-55">
            <h2 class="widget-title">Shop</h2>
            <ul class="widget-list p-0">
            <?php
                foreach ($cat_arr as $list) {
            ?>
                <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['category']?></a></li>
            <?php
                }
            ?>
            </ul>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 col-xl-3">
          <div class="single-footer-widget mt-55">
            <h2 class="widget-title">Policies</h2>
            <ul class="widget-list p-0">
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Security</a></li>
              <li><a href="#">Return & Refund</a></li>
              <li><a href="#">Payment Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer Top End --> 
  
  <!-- Footer Bottom Start -->
  <div class="footer-bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-sm-12 col-lg-3">
          <div class="copyright-content">
            <p class="mb-0"><a href="index.php"> &copy; <?php echo ' '.date('Y').' Ayanke'?></a></p>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-lg-6">
          <div class="widget-social justify-content-start">
            <ul class="d-flex m-0 p-0">
              <li><a title="Facebook" href="#"><i class="fa fa-facebook-f"></i></a> </li>
              <li><a title="Twitter" href="#"><i class="fa fa-twitter"></i></a> </li>
              <li><a title="Youtube" href="#"><i class="fa fa-instagram"></i></a> </li>
              <li><a title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a> </li>
            </ul>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-lg-3">
          <p class="m-0 payment"><img src="assets/images/payment.png" alt="ayanke"></p>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer Bottom End --> 
</footer>

<!-- Optional JavaScript; choose one of the two! --> 

<!-- Option 1: Bootstrap Bundle with Popper --> 
<script src="assets/js/bootstrap.bundle.min.js"></script> 
<script src="assets/js/jquery-2.2.4.js"></script> 
<script src="assets/vendors/owlcarousel/owl.carousel.min.js"></script> 
<script src="assets/js/custom.js"></script>
</body>
</html>