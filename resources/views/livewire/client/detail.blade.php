<div>

    {{-- <div id="breadcrumb" class="section">
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb-tree">
                            <li><a href="/">Trang chủ</a></li>
                            <li><a href="#">All Categories</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Headphones</a></li>
                            <li class="active">Product name goes here</li>
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /BREADCRUMB --> --}}

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <div class="col-md-5 col-md-push-2">
                        <div id="product-main-img">

                            @foreach ($images as $img)
                                <div class="product-preview">
                                    <img src="{{ asset('storage/' . $img) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Product thumb images -->
                    <div class="col-md-2 col-md-pull-5">
                        <div id="product-imgs">
                                                       @foreach ($images as $img)
                                <div class="product-preview">
                                    <img src="{{ asset('storage/' . $img) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- /Product thumb imgs -->

                    <!-- Product details -->
                
                    <!-- /Product details -->

                    <!-- Product tab -->
                    <div class="col-md-12">
                        <div id="product-tab">
                            <!-- product tab nav -->
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
                                {{-- <li><a data-toggle="tab" href="#tab2">Details</a></li> --}}
                                <li><a data-toggle="tab" href="#tab3">Bình luận</a></li>
                            </ul>
                            <!-- /product tab nav -->

                            <!-- product tab content -->
                            <div class="tab-content">
                                <!-- tab1  -->
                                <div id="tab1" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="description">
                                                {!!$product->description!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tab1  -->

                                <!-- tab2  -->
                                <div id="tab2" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam,
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                                esse
                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                                cupidatat
                                                non proident, sunt in culpa qui officia deserunt mollit anim id est
                                                laborum.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tab2  -->

                                <!-- tab3  -->
                                <!-- resources/views/livewire/client/detail.blade.php -->
                                <div id="tab3" class="tab-pane fade in">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <!-- Rating -->
                                        <div class="col-md-3">
                                            <div id="rating">
                                                <div class="rating-avg">
                                                    <span>
                                                        {{ $product->ratings->count() > 0 ? number_format($product->ratings->avg('rating'), 1) : '0' }}
                                                    </span>
                                                    <div class="rating-stars">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i
                                                                class="fa {{ $i <= round($product->ratings->avg('rating')) ? 'fa-star' : 'fa-star-o' }}"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <ul class="rating">
                                                    @foreach (range(1, 5) as $star)
                                                        <li>
                                                            <div class="rating-stars">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <i
                                                                        class="fa {{ $i <= $star ? 'fa-star' : 'fa-star-o' }}"></i>
                                                                @endfor
                                                            </div>
                                                            <div class="rating-progress">
                                                                <div style="width: {{ $star * 20 }}%;"></div>
                                                            </div>
                                                            <span
                                                                class="sum">{{ $product->ratings->where('rating', $star)->count() }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Reviews -->
                                        <div class="col-md-6">
                                            <div id="reviews">
                                                <ul class="reviews" id="review-list">
                                                    @foreach ($product->comments->where('status', 1) as $index => $comment)
                                                        <li
                                                            class="review-item {{ $index >= 3 ? 'd-none extra-review' : '' }}">
                                                            <div class="review-heading">
                                                                <h5 class="name">{{ $comment->user->name }}</h5>
                                                                <p class="date">
                                                                    {{ $comment->created_at->format('d M Y, h:i A') }}
                                                                </p>
                                                                <div class="review-rating">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        <i
                                                                            class="fa {{ $i <= $comment->rating->rating ? 'fa-star' : 'fa-star-o' }}"></i>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                            <div class="review-body">
                                                                <p>{{ $comment->content }}</p>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                @if ($product->comments->count() > 3)
                                                    <button id="show-more-reviews" class="btn btn-link">Xem thêm đánh
                                                        giá</button>
                                                    <button id="collapse-reviews" class="btn btn-link d-none">Thu gọn
                                                        lại</button>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Review Form -->
                                        <div class="col-md-3">
                                            <div id="review-form">


                                                <!-- Form đánh giá -->
                                                <form wire:submit.prevent="store" method="POST">
                                                    @csrf

                                                    {{-- <input class="input" name="name" type="text"
                                                        placeholder="Tên của bạn" wire:model="name">


                                                    <input class="input" name="email" type="email"
                                                        placeholder="Nhập email của bạn" wire:model="email">
                                                    @error('email') <span class="text-danger">{{ $message }}</span>
                                                    @enderror --}}



                                                    <!-- Nội dung bình luận -->
                                                    <textarea class="input" name="content"
                                                        placeholder="Nội dung bình luận"
                                                        wire:model="content"></textarea>
                                                    @error('content')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <!-- Đánh giá -->
                                                    <div class="input-rating">
                                                        <span>Đánh giá:</span>
                                                        <div class="stars">
                                                            @for ($i = 5; $i >= 1; $i--)
                                                                <input type="radio" id="star{{ $i }}" name="rating"
                                                                    value="{{ $i }}" wire:model="rating">
                                                                <label for="star{{ $i }}">★</label>
                                                            @endfor
                                                        </div>

                                                        @error('rating')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <!-- Nút gửi -->
                                                    <button class="primary-btn" type="submit">Gửi</button>
                                                </form>
                                            </div>
                                        </div>




                                    </div>
                                </div>


                                <!-- /tab3  -->
                            </div>
                            <!-- /product tab content  -->
                        </div>
                    </div>
                    <!-- /product tab -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- Section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
{{-- 
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h3 class="title">Sản phẩm liên quan</h3>
                        </div>
                    </div>

                    <!-- product -->

                    @foreach($relatedProducts as $related)
                                <div class="col-md-3 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('storage/uploads/' . $related->thumbnail) }}" alt="">
                                            <div class="product-label">
                                                @if($related->price > 0 && $related->discount > 0)
                                                    <span
                                                        class="sale">-{{ round(($related->discount / $related->price) * 100) }}%</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">
                                                {{ optional($related->categoryValues->first())->name }}
                                            </p>
                                            <h3 class="product-name">
                                                <a href="{{ route('product.detail', $related->id) }}">{{ $related->name }}</a>
                                            </h3>
                                            <h4 class="product-price">
                                                {{ number_format($related->discount > 0 ? $related->discount : $related->price) }}
                                                VNĐ
                                                @if($related->discount > 0)
                                                    <del class="product-old-price">{{ number_format($related->price) }} VNĐ</del>
                                                @endif
                                            </h4>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">
                                        {{ optional($related->categories)->name }}
                                    </p>
                                    <h3 class="product-name">
                                        <a href="{{ route('product.detail', $related->id) }}">{{ $related->name }}</a>
                                    </h3>



                                </div>

                            </div>
                        </div>
                        <!-- /product -->
                    @endforeach --}}


            <!-- /product -->



            <div class="clearfix visible-sm visible-xs"></div>



        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->


</div>
@script


<script>
    $wire.on('updatedPrice', () => {
        setTimeout(() => {
            (function ($) {
                "use strict"

                // Mobile Nav toggle
                $('.menu-toggle > a').on('click', function (e) {
                    e.preventDefault();
                    $('#responsive-nav').toggleClass('active');
                })

                // Fix cart dropdown from closing
                $('.cart-dropdown').on('click', function (e) {
                    e.stopPropagation();
                });

                /////////////////////////////////////////

                // Products Slick
                $('.products-slick').each(function () {
                    var $this = $(this),
                        $nav = $this.attr('data-nav');

                    $this.slick({
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        autoplay: true,
                        infinite: true,
                        speed: 300,
                        dots: false,
                        arrows: true,
                        appendArrows: $nav ? $nav : false,
                        responsive: [{
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        },
                        ]
                    });
                });

                // Products Widget Slick
                $('.products-widget-slick').each(function () {
                    var $this = $(this),
                        $nav = $this.attr('data-nav');

                    $this.slick({
                        infinite: true,
                        autoplay: true,
                        speed: 300,
                        dots: false,
                        arrows: true,
                        appendArrows: $nav ? $nav : false,
                    });
                });

                /////////////////////////////////////////

                // Product Main img Slick
                $('#product-main-img').slick({
                    infinite: true,
                    speed: 300,
                    dots: false,
                    arrows: true,
                    fade: true,
                    asNavFor: '#product-imgs',
                });

                // Product imgs Slick
                $('#product-imgs').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: true,
                    centerMode: true,
                    focusOnSelect: true,
                    centerPadding: 0,
                    vertical: true,
                    asNavFor: '#product-main-img',
                    responsive: [{
                        breakpoint: 991,
                        settings: {
                            vertical: false,
                            arrows: false,
                            dots: true,
                        }
                    },
                    ]
                });

                // Product img zoom
                var zoomMainProduct = document.getElementById('product-main-img');
                if (zoomMainProduct) {
                    $('#product-main-img .product-preview').zoom();
                }

                /////////////////////////////////////////

                // Input number
                $('.input-number').each(function () {
                    var $this = $(this),
                        $input = $this.find('input[type="number"]'),
                        up = $this.find('.qty-up'),
                        down = $this.find('.qty-down');

                    down.on('click', function () {
                        var value = parseInt($input.val()) - 1;
                        value = value < 1 ? 1 : value;
                        $input.val(value);
                        $input.change();
                        updatePriceSlider($this, value)
                    })

                    up.on('click', function () {
                        var value = parseInt($input.val()) + 1;
                        $input.val(value);
                        $input.change();
                        updatePriceSlider($this, value)
                    })
                });

                var priceInputMax = document.getElementById('price-max'),
                    priceInputMin = document.getElementById('price-min');

                priceInputMax.addEventListener('change', function () {
                    updatePriceSlider($(this).parent(), this.value)
                });

                priceInputMin.addEventListener('change', function () {
                    updatePriceSlider($(this).parent(), this.value)
                });

                function updatePriceSlider(elem, value) {
                    if (elem.hasClass('price-min')) {
                        console.log('min')
                        priceSlider.noUiSlider.set([value, null]);
                    } else if (elem.hasClass('price-max')) {
                        console.log('max')
                        priceSlider.noUiSlider.set([null, value]);
                    }
                }

                // Price Slider
                var priceSlider = document.getElementById('price-slider');
                if (priceSlider) {
                    noUiSlider.create(priceSlider, {
                        start: [1, 999],
                        connect: true,
                        step: 1,
                        range: {
                            'min': 1,
                            'max': 999
                        }
                    });

                    priceSlider.noUiSlider.on('update', function (values, handle) {
                        var value = values[handle];
                        handle ? priceInputMax.value = value : priceInputMin.value = value
                    });
                }

            })(jQuery);

        }, 1);
    });

    document.addEventListener('DOMContentLoaded', function () {
        const showMoreButton = document.getElementById('show-more-reviews');
        const collapseButton = document.getElementById('collapse-reviews');
        const extraReviews = document.querySelectorAll('.extra-review');

        if (showMoreButton) {
            showMoreButton.addEventListener('click', function () {
                // Hiển thị thêm bình luận
                extraReviews.forEach(function (review) {
                    review.classList.remove('d-none');
                });

                // Ẩn nút "Xem thêm" và hiển thị nút "Thu gọn lại"
                showMoreButton.style.display = 'none';
                collapseButton.style.display = 'inline-block';
            });
        }

        if (collapseButton) {
            collapseButton.addEventListener('click', function () {
                // Ẩn các bình luận thêm
                extraReviews.forEach(function (review) {
                    review.classList.add('d-none');
                });

                // Ẩn nút "Thu gọn lại" và hiển thị nút "Xem thêm"
                collapseButton.style.display = 'none';
                showMoreButton.style.display = 'inline-block';
            });
        }
    });


</script>
@endscript