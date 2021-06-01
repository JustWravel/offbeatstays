<div>
    <!-- content-->
                <div class="content">
                    <!-- map-view-wrap --> 
                    <div class="map-view-wrap">
                        <div class="container">
                            <div class="map-view-wrap_item">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Contacts</h3>
                                </div>
                                <div class="box-widget-list mar-top">
                                    <ul>
                                        <li><span><i class="fal fa-map-marker"></i> Adress :</span> <a href="#">A 13-A, Sector 62, Noida, UP 201301</a></li>
                                        <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="#">+91 96670 51161</a></li>
                                        <li><span><i class="fal fa-envelope"></i> Email :</span> <a href="#">info@offbeatstays.in</a></li>
                                        <li><span><i class="fal fa-browser"></i> Website :</span> <a href="#">offbeatstays.in</a></li>
                                    </ul>
                                </div>
                                <div class="list-widget-social">
                                    <ul>
                                        <li><a href="#" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank" ><i class="fab fa-vk"></i></a></li>
                                        <li><a href="#" target="_blank" ><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--map-view-wrap end --> 
                    <!-- Map -->
                    <div class="map-container fw-map2">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.04120303706!2d77.37126181508258!3d28.628527182419276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5571d17cb7f%3A0xe34c274beeef488f!2sOffbeat%20Stays!5e0!3m2!1sen!2sin!4v1622366574342!5m2!1sen!2sin" width="" height="500" style="border:0; width:100%" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <!-- Map end --> 
                    <div class="breadcrumbs-fs fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Pages</a><span>Contacts</span></div>
                        </div>
                    </div>
                    <section  id="sec1" class="grey-blue-bg middle-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <!--   list-single-main-item -->
                                    <div class="list-single-main-item fl-wrap">
                                        
                                        <div class="list-single-main-item-title fl-wrap mar-top">
                                            <h3>Working Hours </h3>
                                        </div>
                                        <ul class="cat-item">
                                            <li><a href="#">Monday to Saturday</a> <span>9am - 7pm</span></li>
                                            <li><a href="#">Sunday </a> <span>Closed</span></li>
                                        </ul>
                                    </div>
                                    <!--   list-single-main-item end -->
                                </div>
                                <div class="col-md-8">
                                    <div class="list-single-main-item fl-wrap">
                                        <div class="list-single-main-item-title fl-wrap">
                                            <h3>Get In Touch</h3>
                                        </div>
                                        <div id="contact-form">
                                            <div id="message"></div>
                                            <form  class="custom-form" action="" name="contactform" wire:submit.prevent="save">
                                                <fieldset>
                                                    <label><i class="fal fa-user"></i></label>
                                                    <input type="text" name="name" id="name" placeholder="Your Name *" value="" wire:model="name"/>
                                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                                    <div class="clearfix"></div>
                                                    <label><i class="fal fa-envelope"></i>  </label>
                                                    <input type="text"  name="email" id="email" placeholder="Email Address*" value="" wire:model="email"/>
                                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                                    <div class="clearfix"></div>
                                                    <label><i class="fal fa-phone"></i>  </label>
                                                    <input type="text"  name="phone" id="phone" placeholder="Phone Number*" value="" wire:model="phone"/>
                                                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                    <textarea name="comments"  id="comments" cols="40" rows="3" placeholder="Your Message:" wire:model="comments"></textarea>
                                                </fieldset>
                                                <button class="btn float-btn color2-bg" style="margin-top:15px;" type="submit">Send Message<i class="fal fa-angle-right"></i></button>
                                                @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
                                            </form>
                                        </div>
                                        <!-- contact form  end--> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-decor"></div>
                    </section>
                    <!-- section end -->
</div>
