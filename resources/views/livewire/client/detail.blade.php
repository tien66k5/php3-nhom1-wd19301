<div>

    {{-- <div id="breadcrumb" class="section">
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
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">

                        <div class="product-preview">
                            {{-- <img src="{{ asset('client/img/product08.png') }}" alt=""> --}}
                        </div>

                    </div>
                </div>
                <!-- /Product main img -->

                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        @foreach ($image as $img)
                            <div class="product-preview">
                                <img src="{{ asset('storage/' . $img) }}" alt="">

                                {{-- @dd($img) --}}
                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{$product->name . '-' . $skuName}}</h2>
                        {{-- <div>
                            đánh giá và bình luận
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a class="review-link" href="#">10 Review(s) | Add your review</a>
                        </div> --}}
                        <div>
                            <h3 class="product-price">
                                {{ number_format($price)}}

                                @if($product->discount > 0)
                                                            <del class="product-old-price">{{ number_format($price * (1 -
                                    $product->discount / 100)) }}VNĐ</del>
                                @endif
                            </h3>
                            <span class="product-available">Còn hàng</span>
                        </div>
                        <p>{{$product->short_description}}</p>
                        <form wire:submit.prevent="addToCart">
                            <div class="product-options">
                                <div class="filter-container">
                                    @foreach ($product->productSku as $sku)
                                        <label class="filter-option" for="sku_{{$sku->id}}">
                                            <input wire:model="sku_id" type="radio" id="sku_{{$sku->id}}" name="variant"
                                                value="{{$sku->id}}" wire:click="updateSku({{ $sku->id }})" hidden>
                                            @foreach ($sku->skuValues as $value)
                                                {{ $value->option->name }}: {{ $value->optionValue->value_name }}
                                                <br />
                                            @endforeach
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="add-to-cart">
                                <div class="qty-label">
                                    Số lượng
                                    <div class="input-number">
                                        <input type="number" wire:model="quantity" min="1">

                                        <span class="qty-up" wire:click="increaseQuantity">+</span>
                                        <span class="qty-down" wire:click="decreaseQuantity">-</span>
                                    </div>

                                </div>

                                <button type="submit" class="add-to-cart-btn">
                                    <i class="fa fa-shopping-cart"></i>Thêm giỏ hàng
                                </button>
                            </div>
                        </form>

                        {{-- <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i>Thêm vào sản phẩm yêu thích</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i>Thêm vào so sánh</a></li>
                        </ul> --}}

                        <ul class="product-links">
                            <li>Danh mục:</li>
                            {{-- <li><a href="#">{{$product->categoryValue->}}</a></li> --}}
                        </ul>

                        {{-- <ul class="product-links">
                            <li>Chỉa sẻ:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul> --}}

                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
                            <li><a data-toggle="tab" href="#tab2">Details</a></li>
                            <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!!$product->description!!}
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab2  -->

                            <!-- tab3  -->
                            <div id="tab3" class="tab-pane fade in">
                                <div class="row">
                                    <!-- Rating -->
                                    <div class="col-md-3">
                                        <div id="rating">
                                            <div class="rating-avg">
                                                <span>4.5</span>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <ul class="rating">
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 80%;"></div>
                                                    </div>
                                                    <span class="sum">3</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 60%;"></div>
                                                    </div>
                                                    <span class="sum">2</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Rating -->

                                    <!-- Reviews -->
                                    <div class="col-md-6">
                                        <div id="reviews">
                                            <ul class="reviews">
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">John</h5>
                                                        <p class="date">27 DEC 2018, 8:0 PM</p>
                                                        <div class="review-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">John</h5>
                                                        <p class="date">27 DEC 2018, 8:0 PM</p>
                                                        <div class="review-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">John</h5>
                                                        <p class="date">27 DEC 2018, 8:0 PM</p>
                                                        <div class="review-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="reviews-pagination">
                                                <li class="active">1</li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-3">
                                        <div id="review-form">
                                            <form class="review-form">
                                                <input class="input" type="text" placeholder="Your Name">
                                                <input class="input" type="email" placeholder="Your Email">
                                                <textarea class="input" placeholder="Your Review"></textarea>
                                                <div class="input-rating">
                                                    <span>Your Rating: </span>
                                                    <div class="stars">
                                                        <input id="star5" name="rating" value="5" type="radio"><label
                                                            for="star5"></label>
                                                        <input id="star4" name="rating" value="4" type="radio"><label
                                                            for="star4"></label>
                                                        <input id="star3" name="rating" value="3" type="radio"><label
                                                            for="star3"></label>
                                                        <input id="star2" name="rating" value="2" type="radio"><label
                                                            for="star2"></label>
                                                        <input id="star1" name="rating" value="1" type="radio"><label
                                                            for="star1"></label>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /Review Form -->
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

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Sản phẩm liên quan</h3>
                    </div>
                </div>

                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            {{-- <img src="./img/product01.png" alt=""> --}}
                            <div class="product-label">
                                <span class="sale">-30%</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            <div class="product-rating">
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
                                        to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
                                        to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>
                <!-- /product -->

                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            {{-- <img src="./img/product02.png" alt=""> --}}
                            <div class="product-label">
                                <span class="new">NEW</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
                                        to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
                                        to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>
                <!-- /product -->

                <div class="clearfix visible-sm visible-xs"></div>

                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            {{-- <img src="./img/product03.png" alt=""> --}}
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
                                        to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
                                        to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>
                <!-- /product -->

                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            {{-- <img src="./img/product04.png" alt=""> --}}
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            <div class="product-rating">
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
                                        to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
                                        to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>
                <!-- /product -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->


</div>
<script>
    // const radioInputs = document.querySelectorAll('.filter-option input[type="radio"]');

    // radioInputs.forEach(radio => {
    //     radio.addEventListener('change', () => {
    //         document.querySelectorAll('.filter-option').forEach(option => {
    //             option.classList.remove('selected');
    //         });

    //         radio.closest('.filter-option').classList.add('selected');
    //     });
    // });

    // const checkedRadio = document.querySelector('.filter-option input[type="radio"]:checked');
    // if (checkedRadio) {
    //     checkedRadio.closest('.filter-option').classList.add('selected');
    // }
</script>
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
</script>
@endscript