<section class="parallax-section single-par" data-scrollax-parent="true">
                        <div class="bg par-elem "  data-bg="{{ asset($category->image ?? 'front-assets/images/bg/1.jpg') }}" style="background-image: url('{{ asset($category->image ?? 'front-assets/images/bg/1.jpg') }}')" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2><span>{{ $category->name}}</span></h2>
                                <span class="section-separator"></span>
                                <h4>{{ $category->description }}</h4>
                                
                            </div>
                        </div>
                        <div class="header-sec-link">
                            <div class="container"><a href="#sec1" class="custom-scroll-link color-bg"><i class="fal fa-angle-double-down"></i></a></div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <div class="breadcrumbs-fs fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs fl-wrap"><a href="{{ route('front.home') }}">Home</a><a href="{{ route('front.category.all') }}">All Categories</a><span>{{ $category->name }}</span></div>
                        </div>
                    </div>
