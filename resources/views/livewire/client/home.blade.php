<div>
    <!-- SECTION -->
    <div class="section">
        <!-- khối chứa nội dung -->
        <div class="container">
            <!-- hàng -->
            <div class="row">
                <!-- mục mua sắm -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img {{ asset('client/img/shop01png') }} alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Bộ sưu tập<br>Laptop</h3>
                            <a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /mục mua sắm -->

                <!-- mục mua sắm -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img {{ asset('client/img/shop03png') }} alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Bộ sưu tập<br>Phụ kiện</h3>
                            <a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /mục mua sắm -->

                <!-- mục mua sắm -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img {{ asset('client/img/shop03png') }} alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Bộ sưu tập<br>Máy ảnh</h3>
                            <a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /mục mua sắm -->
            </div>
            <!-- /hàng -->
        </div>
        <!-- /container -->
    </div>
    <!-- /PHẦN -->

  
    <div class="section">
        <div class="container">
            <div class="row">
                <!-- tiêu đề section -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Sản Phẩm Mới</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Laptop</a></li>
                                <li><a data-toggle="tab" href="#tab1">Điện thoại</a></li>
                                <li><a data-toggle="tab" href="#tab1">Máy ảnh</a></li>
                                <li><a data-toggle="tab" href="#tab1">Phụ kiện</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /tiêu đề -->

                <!-- tab sản phẩm + slider -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">

                                    @foreach($products as $product)
                                                                        <div class="product">
                                                                            <div class="product-img">
                                                                                <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}" alt=""
                                                                                    width="150">
                                                                                <div class="product-label">
                                                                                    @if($product->price > 0 && $product->discount > 0)
                                                                                        <span
                                                                                            class="sale">-{{ round(($product->discount / $product->price) * 100) }}%</span>
                                                                                    @endif
                                                                                    <span class="new">Mới</span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="product-body">
                                                                                <p class="product-category">Danh mục</p>
                                                                                <h3 class="product-name">
                                                                                    <a
                                                                                        href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a>
                                                                                </h3>

                                                                                <h4 class="product-price">
                                                                                    {{ number_format($product->discount > 0 ? $product->discount : $product->price) }}
                                                                                    VNĐ
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
                                                                                            class="tooltipp">Thêm vào yêu thích</span></button>
                                                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                                                            class="tooltipp">So sánh</span></button>
                                                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                                                            class="tooltipp">Xem nhanh</span></button>
                                                                                </div>
                                                                            </div>

                                                                            <div class="add-to-cart">
                                                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào
                                                                                    giỏ</button>
                                                                            </div>
                                                                        </div>
                                    @endforeach

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /tab sản phẩm -->
            </div>
        </div>
    </div>


    <!-- HOT DEAL SECTION -->
    <!-- PHẦN KHUYẾN MÃI NỔI BẬT -->
    <div id="hot-deal" class="section">
        <!-- khung nội dung -->
        <div class="container">
            <!-- hàng ngang -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <!-- bộ đếm thời gian khuyến mãi -->
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Ngày</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Giờ</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Phút</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Giây</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">Khuyến mãi hot tuần này</h2>
                        <p>Bộ sưu tập mới giảm giá đến 50%</p>
                        <a class="primary-btn cta-btn" href="#">Mua ngay</a>
                    </div>
                </div>
            </div>
            <!-- /hàng ngang -->
        </div>
        <!-- /khung nội dung -->
    </div>
    <!-- /PHẦN KHUYẾN MÃI -->

    <!-- PHẦN SẢN PHẨM HOT -->
    <div class="section">
        <!-- khung nội dung -->
        <div class="container">
            <!-- hàng ngang -->
            <div class="row">

                <!-- tiêu đề phần -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Sản Phẩm Top Hot</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab2">Điện thoại</a></li>
                                <li><a data-toggle="tab" href="#tab2">Máy ảnh</a></li>
                                <li><a data-toggle="tab" href="#tab2">Phụ kiện</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /tiêu đề phần -->

                <!-- Tabs sản phẩm và hiệu ứng slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    @foreach($products as $product)
                                                                        <!-- sản phẩm -->
                                                                        <div class="product">
                                                                            <div class="product-img">
                                                                                <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}" alt="">
                                                                                <div class="product-label">
                                                                                    @if($product->price > 0 && $product->discount > 0)
                                                                                        <span
                                                                                            class="sale">-{{ round(($product->discount / $product->price) * 100) }}%</span>
                                                                                    @endif
                                                                                    <span class="new">MỚI</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-body">
                                                                                <p class="product-category">Danh mục</p>
                                                                                <h3 class="product-name">
                                                                                    <a
                                                                                        href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a>
                                                                                </h3>
                                                                                <h4 class="product-price">
                                                                                    {{ number_format($product->discount > 0 ? $product->discount : $product->price) }}
                                                                                    VNĐ
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
                                                                                            class="tooltipp">Thêm vào yêu thích</span></button>
                                                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                                                            class="tooltipp">So sánh</span></button>
                                                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                                                            class="tooltipp">Xem nhanh</span></button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="add-to-cart">
                                                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào
                                                                                    giỏ</button>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /sản phẩm -->
                                    @endforeach
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Tabs sản phẩm -->
            </div>
            <!-- /hàng ngang -->
        </div>
        <!-- /khung nội dung -->
    </div>
    <!-- /PHẦN SẢN PHẨM HOT -->


    <!-- PHẦN -->
    <div class="section">
        <!-- khối container -->
        <div class="container">
            <!-- dòng row -->
            <div class="row">

                <!-- CỘT 1 -->
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Sản phẩm bán chạy</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                            <!-- widget sản phẩm -->
                            @foreach($products->take(3) as $product)
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}" alt="">
                                        <div class="product-label">
                                            @if($product->price > 0 && $product->discount > 0)
                                                <span
                                                    class="sale">-{{ round(($product->discount / $product->price) * 100) }}%</span>
                                            @endif
                                            <span class="new">MỚI</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Danh mục</p>
                                        <h3 class="product-name">
                                            <a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <h4 class="product-price">
                                            {{ number_format($product->discount > 0 ? $product->discount : $product->price) }}
                                            VNĐ
                                            @if($product->discount > 0)
                                                <del class="product-old-price">{{ number_format($product->price) }} VNĐ</del>
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- CỘT 2 (tương tự) -->
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Sản phẩm bán chạy</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-4">
                        <div>
                            @foreach($products->take(3) as $product)
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}" alt="">
                                        <div class="product-label">
                                            @if($product->price > 0 && $product->discount > 0)
                                                <span
                                                    class="sale">-{{ round(($product->discount / $product->price) * 100) }}%</span>
                                            @endif
                                            <span class="new">MỚI</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Danh mục</p>
                                        <h3 class="product-name">
                                            <a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <h4 class="product-price">
                                            {{ number_format($product->discount > 0 ? $product->discount : $product->price) }}
                                            VNĐ
                                            @if($product->discount > 0)
                                                <del class="product-old-price">{{ number_format($product->price) }} VNĐ</del>
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Dòng ngắt trên mobile -->
                <div class="clearfix visible-sm visible-xs"></div>

                <!-- CỘT 3 (tương tự) -->
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Sản phẩm bán chạy</h4>
                        <div class="section-nav">
                            <div id="slick-nav-5" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-5">
                        <div>
                            @foreach($products->take(3) as $product)
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}" alt="">
                                        <div class="product-label">
                                            @if($product->price > 0 && $product->discount > 0)
                                                <span
                                                    class="sale">-{{ round(($product->discount / $product->price) * 100) }}%</span>
                                            @endif
                                            <span class="new">MỚI</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Danh mục</p>
                                        <h3 class="product-name">
                                            <a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <h4 class="product-price">
                                            {{ number_format($product->discount > 0 ? $product->discount : $product->price) }}
                                            VNĐ
                                            @if($product->discount > 0)
                                                <del class="product-old-price">{{ number_format($product->price) }} VNĐ</del>
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <!-- /dòng row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /PHẦN -->


</div>