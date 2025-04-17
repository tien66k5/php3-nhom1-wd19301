<div>
        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img {{ asset('client/img/shop01png') }} alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Laptop<br>Collection</h3>
                                <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /shop -->
    
                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img {{ asset('client/img/shop03png') }} alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Accessories<br>Collection</h3>
                                <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /shop -->
    
                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img {{ asset('client/img/shop03png') }} alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Cameras<br>Collection</h3>
                                <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /shop -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->
    
        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Sản Phẩm Mới</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->
    
                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">
                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        {{-- @if(isset($products) && $products->count() > 0) --}}
                                        @foreach($products as $product)
                                                                    <div class="product">
                                                                        <div class="product-img">
                                                                            <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}" alt="" width="150">
                                                                            <div class="product-label">
                                                                                @if($product->price > 0 && $product->discount > 0)
        
                                                                                    <span
                                                                                        class="sale">-{{ round(($product->discount / $product->price) * 100) }}%</span>
                                                                                @endif
        
                                                                                <span class="new">NEW</span>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="product-body">
    
                                                                            <p class="product-category">Category</p>
                                                                            <h3 class="product-name">
                                                                                <a
                                                                                    href=" {{ route('product.detail', $product->id) }}">{{ $product->name }}</a>
                                                                            </h3>
    
                                                                            <h4 class="product-price">
                                                                                {{ number_format($product->discount > 0 ? $product->discount :
                                                                                 $product->price) }} VNĐ
                                                                                @if($product->discount > 0)
                                                                                    <del class="product-old-price">{{ number_format($product->price) }}
                                                                                        VNĐ</del>
                                                                                @endif
                                                                            </h4>
    
    
                                                                            <div class="product-rating">
                                                                                @php
                                                                                    $avgRating = round($product->ratings->avg('rating'));
                                                                                @endphp
                                                                                @for ($i = 1; $i <= 5; $i++)
                                                                                    <i class="fa {{ $i <= $avgRating ? 'fa-star' : 'fa-star-o' }}"></i>
                                                                                @endfor
                                                                            </div>
                                                                            <div class="product-btns">
                                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                                                        class="tooltipp">add to wishlist</span></button>
                                                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                                                        class="tooltipp">add to compare</span></button>
                                                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                                                        class="tooltipp">quick view</span></button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="add-to-cart">
                                                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                                                cart</button>
                                                                        </div>
                                                                    </div>
                                        @endforeach
                                        {{-- @else
                                        <p>Không có sản phẩm nào.</p>
                                        @endif --}}
                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->
                            </div>
                        </div>
                    </div>
                    <!-- Products tab & slick -->
                </div>
    
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->
    
        <!-- HOT DEAL SECTION -->
        <div id="hot-deal" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="hot-deal">
                            <ul class="hot-deal-countdown">
                                <li>
                                    <div>
                                        <h3>02</h3>
                                        <span>Days</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3>10</h3>
                                        <span>Hours</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3>34</h3>
                                        <span>Mins</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3>60</h3>
                                        <span>Secs</span>
                                    </div>
                                </li>
                            </ul>
                            <h2 class="text-uppercase">hot deal this week</h2>
                            <p>New Collection Up to 50% OFF</p>
                            <a class="primary-btn cta-btn" href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /HOT DEAL SECTION -->
    
        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
    
                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Sản Phẩm Top Hot</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Cameras</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->
                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab2" class="tab-pane fade in active">
                                    <div class="products-slick" data-nav="#slick-nav-2">
                                         @foreach($products as $product)
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}"
                                                    alt="">
                                                <div class="product-label">
                                                    @if($product->price > 0 && $product->discount > 0)
                                                    <span class="sale">-{{ round(($product->discount / $product->price) * 100)
                                                        }}%</span>
                                                    @endif
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name">
                                                    <a href=" {{ route('product.detail', $product->id) }}">{{ $product->name
                                                        }}</a>
                                                       
                                                </h3>
                                                <h4 class="product-price">
                                                    {{ number_format($product->discount > 0 ? $product->discount :
                                                    $product->price) }} VNĐ
                                                    @if($product->discount > 0)
                                                    <del class="product-old-price">{{ number_format($product->price) }}
                                                        VNĐ</del>
                                                    @endif
                                                </h4>
                                                <div class="product-rating">
                                                    @php
                                                        $avgRating = round($product->ratings->avg('rating'));
                                                    @endphp
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="fa {{ $i <= $avgRating ? 'fa-star' : 'fa-star-o' }}"></i>
                                                    @endfor
                                                </div>
                                                
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                    cart</button>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        @endforeach
                                    </div>
                                    <div id="slick-nav-2" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->
                            </div>
                        </div>
    
                    </div>
                    <!-- /Products tab & slick -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->
    
        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Sản phẩm bán chạy</h4>
                            <div class="section-nav">
                                <div id="slick-nav-3" class="products-slick-nav"></div>
                            </div>
                        </div>
    
                        <div class="products-widget-slick" data-nav="#slick-nav-3">
                           
    
                            <div>
                                <!-- product widget -->
                                @foreach($products->take(3) as $product)
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}"
                                                    alt="">
                                                <div class="product-label">
                                                    @if($product->price > 0 && $product->discount > 0)
                                                    <span class="sale">-{{ round(($product->discount / $product->price) * 100)
                                                        }}%</span>
                                                    @endif
                                                    <span class="new">NEW</span>
                                                </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name">
                                            <a href=" {{ route('product.detail', $product->id) }}">{{ $product->name
                                                }}</a>
                                               
                                        </h3>
                                        <h4 class="product-price">
                                            {{ number_format($product->discount > 0 ? $product->discount :
                                            $product->price) }} VNĐ
                                            @if($product->discount > 0)
                                            <del class="product-old-price">{{ number_format($product->price) }}
                                                VNĐ</del>
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                                @endforeach
                                   
                                
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Sản phẩm bán chạy</h4>
                            <div class="section-nav">
                                <div id="slick-nav-4" class="products-slick-nav"></div>
                            </div>
                        </div>
    
                        <div class="products-widget-slick" data-nav="#slick-nav-4">
                           
    
                            <div>
                                <!-- product widget -->
                                @foreach($products->take(3) as $product)
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}"
                                                    alt="">
                                                <div class="product-label">
                                                    @if($product->price > 0 && $product->discount > 0)
                                                    <span class="sale">-{{ round(($product->discount / $product->price) * 100)
                                                        }}%</span>
                                                    @endif
                                                    <span class="new">NEW</span>
                                                </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name">
                                            <a href=" {{ route('product.detail', $product->id) }}">{{ $product->name
                                                }}</a>
                                               
                                        </h3>
                                        <h4 class="product-price">
                                            {{ number_format($product->discount > 0 ? $product->discount :
                                            $product->price) }} VNĐ
                                            @if($product->discount > 0)
                                            <del class="product-old-price">{{ number_format($product->price) }}
                                                VNĐ</del>
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                                @endforeach
                                   
                                
                            </div>
                        </div>
                    </div>
    
                    <div class="clearfix visible-sm visible-xs"></div>
    
                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Sản phẩm bán chạy</h4>
                            <div class="section-nav">
                                <div id="slick-nav-5" class="products-slick-nav"></div>
                            </div>
                        </div>
    
                        <div class="products-widget-slick" data-nav="#slick-nav-5">
                           
    
                            <div>
                                <!-- product widget -->
                                @foreach($products->take(3) as $product)
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}"
                                                    alt="">
                                                <div class="product-label">
                                                    @if($product->price > 0 && $product->discount > 0)
                                                    <span class="sale">-{{ round(($product->discount / $product->price) * 100)
                                                        }}%</span>
                                                    @endif
                                                    <span class="new">NEW</span>
                                                </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name">
                                            <a href=" {{ route('product.detail', $product->id) }}">{{ $product->name
                                                }}</a>
                                               
                                        </h3>
                                        <h4 class="product-price">
                                            {{ number_format($product->discount > 0 ? $product->discount :
                                            $product->price) }} VNĐ
                                            @if($product->discount > 0)
                                            <del class="product-old-price">{{ number_format($product->price) }}
                                                VNĐ</del>
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                                @endforeach
                                                                   
                            </div>
                        </div>
                    </div>
    
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->
    
</div>