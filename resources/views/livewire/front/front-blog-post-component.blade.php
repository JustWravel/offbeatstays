@section('meta_title', $blog->meta_title ?? $blog->name .' - OffbeatStays')
                    @section('meta_description', $blog->meta_description ?? $blog->excerpt)
                    @section('meta_keywords', $blog->meta_keywords ?? $blog->meta_name)
                    @section('meta_image', 'front-assets/images/bg/1.jpg,')
<section class="color-bg middle-padding ">
                        <div class="wave-bg wave-bg2"></div>
                        <div class="container">
                            <div class="flat-title-wrap">
                                <h2><span>{{$blog->name}}</span></h2>
                                <span class="section-separator"></span>
                                {{-- <h4 style="color: #fff">{{$blog->excerpt}}</h4> --}}
                            </div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <div class="breadcrumbs-fs fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs fl-wrap"><a href="{{route('front.home')}}">Home</a><a href="{{route('front.blog.all')}}">Blog</a><span>{{$blog->name}}</span></div>
                        </div>
                    </div>
                    <style>
                        .post-article ol{
                            list-style: decimal;
                        }
                        .post-article ol li {
                            margin: 10px;
                            text-align: justify;
                            margin-left: 20px;
                            font-size: 16px;
                            font-weight: 700;
                            color: #555;
                        }
                        figure.wp-block-image img {
                            max-width: 100%;
                            padding: 10px 0;
                        }
                    </style>
                    <!-- section-->
                    <section  id="sec1" class="middle-padding grey-blue-bg">
                        <div class="container">
                            <div class="row">
                                <!--blog content -->
                                <div class="col-md-8">
                                    <!--post-container -->
                                    <div class="post-container fl-wrap">
                                        <!-- article> --> 
                                        <article class="post-article">
                                            <div class="list-single-main-media fl-wrap">
                                                <div class="single-slider-wrapper fl-wrap">
                                                    <div class="single-slider fl-wrap"  >
                                                        <div class="slick-slide-item"><img src="{{$blog->image}}" alt=""></div>
                                                        {{-- <div class="slick-slide-item"><img src="images/all/1.jpg" alt=""></div>
                                                        <div class="slick-slide-item"><img src="images/all/1.jpg" alt=""></div> --}}
                                                    </div>
                                                    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                                                    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                                                </div>
                                            </div>
                                            <div class="list-single-main-item fl-wrap">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>{{$blog->name}}</h3>
                                                </div>
                                                {!!$blog->description!!}

                                                <div class="post-author"><a href="#"><img src="{{$blog->author->profile_photo_url}}" alt=""><span>By, {{$blog->author->name}}</span></a></div>
                                                <div class="post-opt">
                                                    <ul>
                                                        <li><i class="fas fa-calendar"></i> <span>{{$blog->created_at->diffForHumans()}}</span></li>
                                                        {{-- <li><i class="fas fa-eye"></i> <span>264</span></li> --}}
                                                        <li><i class="fas fa-list-alt"></i> @foreach($blog->categories as $blog_category)<a href="{{$blog_category->slug}}">{{$blog_category->name}}</a>, @endforeach </li>
                                                    </ul>
                                                </div>
                                                <span class="fw-separator"></span>
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Tags</h3>
                                                </div>
                                                <div class="list-single-tags tags-stylwrap blog-tags">
                                                    @foreach($blog->tags as $blog_tag)
                                                    <a href="{{$blog_tag->slug}}">{{$blog_tag->name}}</a> 
                                                    @endforeach
                                                                                                                                  
                                                </div>
                                                <span class="fw-separator"></span>
                                                <div class="post-nav fl-wrap">
                                                    @if (isset($previous))
                                                        <a href="{{ route('front.blog.detail',['slug'=>$previous->slug] )}}" class="post-link prev-post-link"><i class="fal fa-angle-left"></i>Prev <span class="clearfix">{{ $previous->name}}</span></a>
                                                    @endif
                                                    @if (isset($next))
                                                        <a href="{{ route('front.blog.detail',['slug'=>$next->slug] )}}" class="post-link next-post-link"><i class="fal fa-angle-right"></i>Next<span class="clearfix">{{ $next->name}}</span></a>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- <!-- list-single-main-item -->   
                                            <div class="list-single-main-item fl-wrap" id="sec5">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Comments -  <span> 2 </span></h3>
                                                </div>
                                                <div class="reviews-comments-wrap">
                                                    <!-- reviews-comments-item -->  
                                                    <div class="reviews-comments-item">
                                                        <div class="review-comments-avatar">
                                                            <img src="images/avatar/1.jpg" alt=""> 
                                                        </div>
                                                        <div class="reviews-comments-item-text">
                                                            <h4><a href="#">Liza Rose</a></h4>
                                                            <div class="clearfix"></div>
                                                            <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
                                                            <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i>12 April 2018</span><a href="#"><i class="fal fa-reply"></i> Reply</a></div>
                                                        </div>
                                                    </div>
                                                    <!--reviews-comments-item end--> 
                                                    <!-- reviews-comments-item -->  
                                                    <div class="reviews-comments-item">
                                                        <div class="review-comments-avatar">
                                                            <img src="images/avatar/1.jpg" alt=""> 
                                                        </div>
                                                        <div class="reviews-comments-item-text">
                                                            <h4><a href="#">Adam Koncy</a></h4>
                                                            <div class="clearfix"></div>
                                                            <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. "</p>
                                                            <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i>03 December 2017</span><a href="#"><i class="fal fa-reply"></i> Reply</a></div>
                                                        </div>
                                                    </div>
                                                    <!--reviews-comments-item end-->                                                                  
                                                </div>
                                            </div>
                                            <!-- list-single-main-item end -->   
                                            <!-- list-single-main-item -->   
                                            <div class="list-single-main-item fl-wrap" id="sec6">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Add Comment</h3>
                                                </div>
                                                <!-- Add Review Box -->
                                                <div id="add-review" class="add-review-box">
                                                    <!-- Review Comment -->
                                                    <form id="add-comment" class="add-comment  custom-form" name="rangeCalc" >
                                                        <fieldset>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label><i class="fal fa-user"></i></label>
                                                                    <input type="text" placeholder="Your Name *" value=""/>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label><i class="fal fa-envelope"></i>  </label>
                                                                    <input type="text" placeholder="Email Address*" value=""/>
                                                                </div>
                                                            </div>
                                                            <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>
                                                        </fieldset>
                                                        <button class="btn  no-shdow-btn float-btn color2-bg" style="margin-top:30px">Submit Comment<i class="fal fa-paper-plane"></i></button>
                                                    </form>
                                                </div>
                                                <!-- Add Review Box / End -->
                                            </div>
                                            <!-- list-single-main-item end -->   --}}                                           
                                        </article>
                                        <!-- article end -->                                
                                    </div>
                                    <!--post-container end -->  
                                </div>
                                <!-- blog content end -->
                                <!--   sidebar  -->
                                <div class="col-md-4">
                                    <!--box-widget-wrap -->  
                                    <div class="box-widget-wrap fl-wrap fixed-bar">
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header">
                                                        <h3> Search In Blog </h3>
                                                    </div>
                                                    <div class="search-widget">
                                                        <form action="#" class="fl-wrap">
                                                            <input name="se" id="se" type="text" class="search" placeholder="Search.." value="Search..." />
                                                            <button class="search-submit color2-bg" id="submit_btn"><i class="fal fa-search transition"></i> </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->                          
                                        <!--box-widget-item -->
                                        {{-- <div class="box-widget-item fl-wrap">
                                            <div class="box-widget">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header">
                                                        <h3>About Athor</h3>
                                                    </div>
                                                    <div class="box-widget-author fl-wrap">
                                                        <div class="box-widget-author-title fl-wrap">
                                                            <div class="box-widget-author-title-img">
                                                                <img src="images/avatar/1.jpg" alt=""> 
                                                            </div>
                                                            <a href="author-single.html">Jessie Manrty</a>
                                                            <span>Co-manager associated</span>
                                                        </div>
                                                        <div class="box-widget-author-content">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                                                        </div>
                                                        <div class="list-widget-social">
                                                            <ul>
                                                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!--box-widget-item end --> 
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget widget-posts">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header">
                                                        <h3>Latest Posts</h3>
                                                    </div>
                                                    @foreach($latest as $latestblog)
                                                    <!--box-image-widget-->
                                                    <div class="box-image-widget">
                                                        <div class="box-image-widget-media"><img src="{{$latestblog->image}}" alt="">
                                                            <a href="blog-single.html" class="color-bg">Details</a>
                                                        </div>
                                                        <div class="box-image-widget-details">
                                                            <h4>{{$latestblog->name}}</h4>
                                                            
                                                            <span class="widget-posts-date"><i class="fal fa-calendar"></i> {{$latestblog->created_at->diffForHumans()}} </span>
                                                        </div>
                                                    </div>
                                                    <!--box-image-widget end -->
                                                    @endforeach
                                                                                                            
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->                                         
                                        <!--box-widget-item -->
                                        {{-- <div class="box-widget-item fl-wrap">
                                            <div class="box-widget">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header">
                                                        <h3>Tags </h3>
                                                    </div>
                                                    <div class="list-single-tags tags-stylwrap  sb-tags">
                                                        <a href="#">Event</a>
                                                        <a href="#">Design</a>
                                                        <a href="#">Photography</a>
                                                        <a href="#">Trends</a>
                                                        <a href="#">Video</a>
                                                        <a href="#">News</a>                                                                               
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!--box-widget-item end -->                                       
                                        {{-- <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header">
                                                        <h3>Our Instagram</h3>
                                                    </div>
                                                    <div class="jr-insta-thumb">
                                                        <ul>
                                                            <li>
                                                                <a href="#"><img src="images/instagram/1.jpg" alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="images/instagram/1.jpg" alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="images/instagram/1.jpg" alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="images/instagram/1.jpg" alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="images/instagram/1.jpg" alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="images/instagram/1.jpg" alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->  --}}                           
                                        {{-- <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header">
                                                        <h3> Categories</h3>
                                                    </div>
                                                    <ul class="cat-item">
                                                        <li><a href="#">Standard</a> <span>3</span></li>
                                                        <li><a href="#">Video</a> <span>6 </span></li>
                                                        <li><a href="#">Gallery</a> <span>12 </span></li>
                                                        <li><a href="#">Quotes</a> <span>4</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->  --}}                            
                                    </div>
                                    <!--box-widget-wrap end -->  
                                </div>
                                <!--   sidebar end  -->
                            </div>
                        </div>
                        <div class="limit-box fl-wrap"></div>
                    </section>