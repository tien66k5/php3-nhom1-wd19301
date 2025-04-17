<div>
    {{--
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Checkout</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li class="active">Checkout</li>
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

                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Thanh Toán</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" value="{{$user->email}}">
                        </div>
                        {{-- {{$user->name}} --}}

                        {{-- <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="country" placeholder="Country">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                        </div> --}}
                        <div class="form-group">
                            <input class="input" type="phone" name="phone" value="{{$user->phone}}">
                        </div>
                        <div class="form-group">
                            <input class="input" type="Text" name="address" placeholder="Địa chỉ">
                        </div>


                        <div>
                            <div>
                                <label for="province">Tỉnh/Thành phố</label>
                                <select wire:model="selectedProvince" wire:key="province-select" id="province">
                                    <option value="">-- Chọn tỉnh --</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province['code'] }}">{{ $province['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if (!empty($districts))
                                <div>
                                    <label for="district">Quận/Huyện</label>
                                    <select wire:model="selectedDistrict" wire:key="district-select-{{ $selectedProvince }}"
                                        id="district">
                                        <option value="">-- Chọn huyện --</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district['code'] }}">{{ $district['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            @if (!empty($wards))
                                <div>
                                    <label for="ward">Phường/Xã</label>
                                    <select wire:model="selectedWard" wire:key="ward-select-{{ $selectedDistrict }}"
                                        id="ward">
                                        <option value="">-- Chọn xã --</option>
                                        @foreach ($wards as $ward)
                                            <option value="{{ $ward['code'] }}">{{ $ward['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            @if ($selectedProvince && $selectedDistrict && $selectedWard)
                                <div style="margin-top: 20px;">
                                    <strong>Địa chỉ đã chọn:</strong><br>
                                    Tỉnh: {{ collect($provinces)->firstWhere('code', $selectedProvince)['name'] ?? '' }}<br>
                                    Huyện:
                                    {{ collect($districts)->firstWhere('code', $selectedDistrict)['name'] ?? '' }}<br>
                                    Xã: {{ collect($wards)->firstWhere('code', $selectedWard)['name'] ?? '' }}
                                </div>
                            @endif
                        </div>




                        <div class="form-group">
                            <div class="input-checkbox">
                                <input type="checkbox" id="create-account">
                                {{-- <label for="create-account">
                                    <span></span>
                                    Create Account?
                                </label> --}}
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt.</p>
                                    <input class="input" type="password" name="password"
                                        placeholder="Enter Your Password">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="shiping-details">
                        <div class="section-title">
                            <h3 class="title">Shiping address</h3>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="shiping-address">
                            <label for="shiping-address">
                                <span></span>
                                Ship to a diffrent address?
                            </label>
                            <div class="caption">
                                <div class="form-group">
                                    <input class="input" type="text" name="first-name" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="last-name" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="address" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="city" placeholder="City">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="country" placeholder="Country">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="tel" name="tel" placeholder="Telephone">
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Order notes -->
                    {{-- <div class="order-notes">
                        <textarea class="input" placeholder="Order Notes"></textarea>
                    </div> --}}
                    <!-- /Order notes -->
                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details" myfrom="">
                    <div class="section-title text-center">
                        <h3 class="title">Đơng hàng</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>Sản phẩm</strong></div>
                            <div><strong>Tổng</strong></div>
                        </div>
                        <div class="order-products">
                            @if($dataCart)
                                @foreach ($dataCart as $product)
                                    <div class="order-col">
                                        <div>{{$product->productSku->product->name}}</div>
                                        <div>{{ number_format(($product->productSku->price) * ($product->quantity))}}</div>
                                    </div>
                                @endforeach
                            @endif




                        </div>
                        {{-- <div class="order-col">
                            <div>Shiping</div>
                            <div><strong>FREE</strong></div>
                        </div> --}}
                        <div class="order-col">




                            @php
                                $totalPrice = 0;
                            @endphp

                            @if($dataCart)
                                                    @foreach($dataCart as $item)
                                                                            @php
                                                                                $totalPrice += ($item->productSku->price) * ($item->quantity);
                                                                            @endphp
                                                    @endforeach
                                                    <div><strong>Tổng tiền:</strong></div>
                                                    <div><strong class="order-total">{{ number_format($totalPrice, 0, ',', '.') }} </strong>
                                                    </div>

                            @endif



                        </div>
                    </div>
                    <form wire:submit.prevent="checkout">

                        <button class="primary-btn order-submit" id="formCheckout">Xác nhận</button>
                    </form>
                </div>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->





</div>