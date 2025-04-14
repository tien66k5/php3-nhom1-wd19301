<div>
    <!-- PHẦN -->
    <div class="section">
        <!-- container (vùng chứa) -->
        <div class="container">
            <!-- dòng -->
            <div class="row">
                <!-- THANH BÊN -->
                <div id="aside" class="col-md-3">
                    <!-- Widget bên -->


                    <div class="aside">
                        <div class="category-filter">
                            <h3 class="aside-title">DANH MỤC</h3>
                            @foreach ($categories as $category)
                                <div class="category-block">
                                    <button class="category-toggle" onclick="toggleDropdown({{ $category->id }})">
                                        {{ $category->name }}
                                        <span class="arrow">&#9662;</span>
                                    </button>
                                    <div class="subcategory-list" id="category-{{ $category->id }}">
                                        @foreach ($category->categoryValues as $value)
                                            <label>
                                                <input type="checkbox" wire:model.live="selectedCategoryValueIds"
                                                    wire:key="category-{{ $category->id }}-value-{{ $value->id }}"
                                                    value="{{ $value->id }}">
                                                {{ $value->value }} {{ $value->name }}
                                                <small>({{ $value->products->count() }})</small>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- /Widget bên -->

                    <!-- Widget bên -->
                    <div class="aside">
                        <h3 class="aside-title">Giá</h3>
                        <div class="price-filter">
                            {{-- <div id="price-slider"></div> --}}
                            <div class="input-number price-min">
                                <input id="price-min" type="number" wire:model.live="minPrice">
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number" wire:model.live="maxPrice">
                            </div>
                        </div>
                    </div>
                    <!-- /Widget bên -->

                    <!-- Widget bên -->
                    <div class="aside">
                        <h3 class="aside-title">Thương hiệu</h3>
                        <div class="checkbox-filter">
                            <div class="brand-filter">

                                @foreach ($brands as $brand)
                                    <div class="checkbox-item">
                                        <label>
                                            <input type="checkbox" wire:model.live="selectedBrandIds"
                                                value="{{ $brand->id }}">
                                            {{ $brand->name }}
                                            <small>({{ $brand->products->count() }})</small>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /Widget bên -->

                </div>
                <!-- /THANH BÊN -->

                <!-- KHU VỰC SẢN PHẨM -->
                <div id="store" class="col-md-9">
                    @if ($search)
                        <h4>Kết quả tìm kiếm cho: <strong>"{{ $search }}"</strong></h4>
                    @endif
                    <!-- thanh lọc phía trên cửa hàng -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sắp xếp theo:
                                <select wire:model.live="sortOrder" class="input-select">
                                    <option value="desc">Mới nhất</option>
                                    <option value="asc">Cũ nhất</option>
                                </select>
                            </label>

                            <label>
                                Hiển thị:
                                <select wire:model.live="perPage" class="input-select">
                                    <option value="9">9</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>


                    <!-- /thanh lọc phía trên cửa hàng -->

                    <!-- sản phẩm cửa hàng -->
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ $product->image_url ?? 'default.jpg' }}" alt="">
                                        <div class="product-label">
                                            @if($product->discount)
                                                <span class="sale">-{{ $product->discount }}%</span>
                                            @endif
                                            <span class="new">MỚI</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $product->category->name ?? 'Danh mục' }}</p>
                                        <h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
                                        <h4 class="product-price">
                                            {{ number_format($product->defaultSku->price ?? 0, 0, ',', '.') }} VND

                                            @if($product->defaultSku && $product->defaultSku->old_price)
                                                <del class="product-old-price">${{ $product->defaultSku->old_price }}</del>
                                            @endif
                                        </h4>

                                        <div class="product-rating">
                                            @for($i = 0; $i < 5; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                    class="tooltipp">thêm vào yêu thích</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                    class="tooltipp">so sánh</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem
                                                    nhanh</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào
                                            giỏ</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /sản phẩm cửa hàng -->

                    <!-- bộ lọc phía dưới -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">
                            Hiển thị {{ $products->firstItem() }} - {{ $products->lastItem() }} trong tổng số
                            {{ $products->total() }} sản phẩm
                        </span>
                        <ul class="store-pagination">
                            @if ($products->onFirstPage())
                                <li class="disabled"><span><i class="fa fa-angle-left"></i></span></li>
                            @else
                                <li><a wire:click.prevent="gotoPage({{ $products->currentPage() - 1 }})" href="#"><i
                                            class="fa fa-angle-left"></i></a></li>
                            @endif

                            @for ($page = 1; $page <= $products->lastPage(); $page++)
                                @if ($page == $products->currentPage())
                                    <li class="active"><span>{{ $page }}</span></li>
                                @else
                                    <li><a wire:click.prevent="gotoPage({{ $page }})" href="#">{{ $page }}</a></li>
                                @endif
                            @endfor

                            @if ($products->hasMorePages())
                                <li><a wire:click.prevent="gotoPage({{ $products->currentPage() + 1 }})" href="#"><i
                                            class="fa fa-angle-right"></i></a></li>
                            @else
                                <li class="disabled"><span><i class="fa fa-angle-right"></i></span></li>
                            @endif
                        </ul>
                    </div>



                    <!-- /bộ lọc phía dưới -->
                </div>
                <!-- /KHU VỰC SẢN PHẨM -->
            </div>
            <!-- /dòng -->
        </div>
        <!-- /container -->
    </div>
    <!-- /PHẦN -->

    <!-- ĐĂNG KÝ NHẬN TIN -->

    <script>
        document.addEventListener('livewire:update', () => {
            console.log('Livewire component đã được cập nhật');
        });

        function toggleDropdown(id) {
            const list = document.getElementById('category-' + id);
            const block = list.closest('.category-block');

            if (list.style.display === 'block') {
                list.style.display = 'none';
                block.classList.remove('active');
            } else {
                list.style.display = 'block';
                block.classList.add('active');
            }
        }
    </script>
</div>