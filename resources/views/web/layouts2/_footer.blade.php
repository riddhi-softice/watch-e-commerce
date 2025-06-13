 <footer class="footer">
     <div class="footer-middle">
         <div class="container">
             <div class="row">
                 <!-- About Section -->
                 <div class="col-sm-6 col-lg-4">
                     <div class="widget widget-about">
                         <img src="{{ asset('public/assets/images/logo.png') }}" class="footer-logo" alt="Footer Logo"
                             width="105" height="25">
                         <p>Your one-stop destination for quality products and reliable service.</p>
                         <div class="social-icons">
                             <a href="#" class="social-icon" title="Facebook"><i class="icon-facebook-f"></i></a>
                             <a href="#" class="social-icon" title="Twitter"><i class="icon-twitter"></i></a>
                             <a href="#" class="social-icon" title="Instagram"><i class="icon-instagram"></i></a>
                             <a href="#" class="social-icon" title="Youtube"><i class="icon-youtube"></i></a>
                         </div>
                     </div>
                 </div><!-- End .col -->

                 <!-- Quick Links -->
                 <div class="col-sm-6 col-lg-4">
                     <div class="widget">
                         <h4 class="widget-title">Company</h4>
                         <ul class="widget-list">
                             <li><a href="{{ url('/about') }}">About Us</a></li>
                             <li><a href="{{ url('/terms-and-conditions') }}">Terms & Conditions</a></li>
                             <!-- <li><a href="{{ url('/shipping-delivery-policy') }}">Shipping & Delivery Policy</a></li> -->
                             <!-- <li><a href="{{ url('/cancellation-refund-policy') }}">Cancellation & Refund Policy</a></li> -->
                             <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                         </ul>
                     </div>
                 </div><!-- End .col -->

                  <div class="col-sm-6 col-lg-4">
                     <div class="widget">
                         <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                         <ul class="widget-list">
                            <li><a href="{{ url('/') }}">How to shop on Molla</a></li>
                             <li><a href="{{ url('/orders/index') }}">Track My Order</a></li>
                         </ul><!-- End .widget-list -->
                     </div><!-- End .widget -->
                 </div><!-- End .col-sm-6 col-lg-3 -->

             </div><!-- End .row -->
         </div><!-- End .container -->
     </div><!-- End .footer-middle -->

     <div class="footer-bottom">
         <div class="container">
             <p class="footer-copyright">Copyright © {{ date('Y') }} Molla Store. All Rights Reserved.</p>
             <!-- End .footer-copyright -->
             <figure class="footer-payments">
                 <img src="{{ asset('public/assets/images/payments.png') }}" alt="Payment methods" width="272"
                     height="20">
             </figure><!-- End .footer-payments -->
         </div><!-- End .container -->
     </div><!-- End .footer-bottom -->
 </footer><!-- End .footer -->