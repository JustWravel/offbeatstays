<footer class="main-footer">
                <!--subscribe-wrap-->
                <div class="subscribe-wrap color-bg  fl-wrap">
                    <div class="container">
                        <div class="sp-bg"> </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="subscribe-header">
                                    <h3>Subscribe</h3>
                                    <p>Want to be notified when we launch a new template or an udpate. Just sign up and we'll send you a notification by email.</p>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="footer-widget fl-wrap">
                                    <div class="subscribe-widget fl-wrap">
                                        <div class="subcribe-form">
                                            <form method="post" id="subscribe" wire:submit.prevent="subscribe">
                                                <input class="enteremail fl-wrap" name="email" id="subscribe-email" placeholder="Enter Your Email" spellcheck="false" type="text" wire:model="email">
                                                <button type="submit" id="subscribe-button" class="subscribe-button" wire:loading.attr="disabled"><i class="fas fa-rss-square"></i> Subscribe</button>
                                                <label for="subscribe-email" class="subscribe-message">@error('email') {{$message}} @enderror @if (session()->has('message')) {{ session('message') }} @endif</label>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wave-bg"></div>
                </div>
                <!--subscribe-wrap end -->
                <!--footer-inner-->
                <div class="footer-inner">
                    <div class="container">
                        <!--footer-fw-widget-->
                        {{-- <div class="footer-fw-widget fl-wrap">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="footer-carousel-title">
                                        Our partners
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <!--footer-carousel-wrap-->
                                    <div class="footer-carousel-wrap fl-wrap">
                                        <div class="footer-carousel fl-wrap">
                                            <!--footer-carousel-item-->
                                            <div class="footer-carousel-item">
                                                <a href="#"><img src="{{ asset('front-assets/images/partners/1.png') }}" alt=""></a>
                                            </div>
                                            <!--footer-carousel-item end-->
                                            <!--footer-carousel-item-->
                                            <div class="footer-carousel-item">
                                                <a href="#"><img src="{{ asset('front-assets/images/partners/1.png') }}" alt=""></a>
                                            </div>
                                            <!--footer-carousel-item end-->                             
                                            <!--footer-carousel-item-->
                                            <div class="footer-carousel-item">
                                                <a href="#"><img src="{{ asset('front-assets/images/partners/1.png') }}" alt=""></a>
                                            </div>
                                            <!--footer-carousel-item end-->
                                            <!--footer-carousel-item-->
                                            <div class="footer-carousel-item">
                                                <a href="#"><img src="{{ asset('front-assets/images/partners/1.png') }}" alt=""></a>
                                            </div>
                                            <!--footer-carousel-item end-->      
                                            <!--footer-carousel-item-->
                                            <div class="footer-carousel-item">
                                                <a href="#"><img src="{{ asset('front-assets/images/partners/1.png') }}" alt=""></a>
                                            </div>
                                            <!--footer-carousel-item end-->
                                            <!--footer-carousel-item-->
                                            <div class="footer-carousel-item">
                                                <a href="#"><img src="{{ asset('front-assets/images/partners/1.png') }}" alt=""></a>
                                            </div>
                                            <!--footer-carousel-item end-->                                     
                                        </div>
                                        <div class="fc-cont  fc-cont-prev"><i class="fal fa-angle-left"></i></div>
                                        <div class="fc-cont  fc-cont-next"><i class="fal fa-angle-right"></i></div>
                                    </div>
                                    <!--footer-carousel-wrap end-->
                                </div>
                            </div>
                        </div> --}}
                        <!--footer-fw-widget end-->
                        <div class="row">
                            <!--footer-widget -->
                            <div class="col-md-4">
                                <div class="footer-widget fl-wrap">
                                    <h3>About Us</h3>
                                    <div class="footer-contacts-widget fl-wrap">
                                        <p>Offbeat stays is for all your experiential stay in a homely feel alongside nature- Be it a rejuvenating workcation , or a leisure trip with your family to spend some quality time or maybe a digital detox amongst the mountains and beaches- Offbeat stays got your back.</p>
                                        <ul  class="footer-contacts fl-wrap">
                                            <li><span><i class="fal fa-envelope"></i> Mail :</span><a href="mailto:info@offbeatstays.in" target="_blank">info@offbeatstays.in</a></li>
                                            <li> <span><i class="fal fa-map-marker-alt"></i> Adress :</span><a href="https://www.google.com/maps/dir//offbeatstays/@28.6285092,77.3034102,12z/data=!3m1!4b1!4m9!4m8!1m1!4e2!1m5!1m1!1s0x390ce5571d17cb7f:0xe34c274beeef488f!2m2!1d77.373459!2d28.6285143" target="_blank">A 13A, Sector 62, Noida, Uttar Pradesh 201301</a></li>
                                            <li><span><i class="fal fa-phone"></i> Phone :</span><a href="tel:+919667051161"> +91 96670 51161</a></li>
                                        </ul>
                                        <div class="footer-social">
                                            <span>Find us : </span>
                                            <ul>
                                                <li><a href="https://www.facebook.com/offbeatstays/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="https://twitter.com/offbeatstays" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="https://in.linkedin.com/company/offbeatstays" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                                <li><a href="https://www.instagram.com/accounts/login/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="https://www.youtube.com/channel/UCrUdzsqri8TMGVNO_u9q8Mw" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--footer-widget end-->
                            <!--footer-widget -->
                            <div class="col-md-4">
                                <div class="footer-widget fl-wrap">
                                    <h3>Our Last News</h3>
                                    <div class="widget-posts fl-wrap">
                                        {{-- <ul>
                                            <li class="clearfix">
                                                <a href="#"  class="widget-posts-img"><img src="{{ asset('front-assets/images/all/1.jpg') }}" class="respimg" alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title="">Vivamus dapibus rutrum</a>
                                                    <span class="widget-posts-date"> 21 Mar 09.05 </span>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <a href="#"  class="widget-posts-img"><img src="{{ asset('front-assets/images/all/1.jpg') }}" class="respimg" alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title=""> In hac habitasse platea</a>
                                                    <span class="widget-posts-date"> 7 Mar 18.21 </span>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <a href="#"  class="widget-posts-img"><img src="{{ asset('front-assets/images/all/1.jpg') }}" class="respimg" alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title="">Tortor tempor in porta</a>
                                                    <span class="widget-posts-date"> 7 Mar 16.42 </span>
                                                </div>
                                            </li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                            <!--footer-widget end-->
                            <!--footer-widget -->
                            <div class="col-md-4">
                                <div class="footer-widget fl-wrap">
                                    <h3>Our  Twitter</h3>
                                    <div id="footer-twiit" class="fl-wrap"></div>
                                    <a href="#" class="twitter-link" target="_blank">Follow</a>
                                </div>
                            </div>
                            <!--footer-widget end-->
                        </div>
                        <div class="clearfix"></div>
                        <!--footer-widget -->
                        <div class="footer-widget">
                            <div class="row">
                                <div class="col-md-4"><a class="contact-btn color-bg" href="contact.html">Get In Touch<i class="fal fa-envelope"></i></a></div>
                                <div class="col-md-8">
                                    <div class="customer-support-widget fl-wrap">
                                        <h4>Customer support : </h4>
                                        <a href="tel:+919667051161" class="cs-mumber">+91 966 705 1161</a>
                                        <a href="tel:+919667051161" class="cs-mumber-button color2-bg">Call Now <i class="far fa-phone-volume"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--footer-widget end -->
                    </div>
                </div>
                <!--footer-inner end -->
                <div class="footer-bg">
                </div>
                <!--sub-footer-->
                <div class="sub-footer">
                    <div class="container">
                        <div class="copyright"> &#169; Offbeat Stays {{date('Y')}} .  All rights reserved.</div>
                        {{-- <div class="subfooter-lang">
                            <div class="subfooter-show-lang"><span>Eng</span><i class="fa fa-caret-up"></i></div>
                            <ul class="subfooter-lang-tooltip">
                                <li><a href="#">Dutch</a></li>
                                <li><a href="#">Italian</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </div> --}}
                        <div class="subfooter-nav">
                            <ul>
                                <li><a href="#">Terms of use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--sub-footer end -->
            </footer>
