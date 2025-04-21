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
                            <input   wire:model="form.name" class="input" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <input  wire:model="form.email" class="input" type="email" name="email" >
                        </div>
                        <div class="form-group">
                            <input  wire:model="form.phone" class="input" type="phone" name="phone" >
                        </div>
                        <div class="form-group">
                            <select wire:model="address" class="input" name="address">
                                <option value="">-- Chọn địa chỉ --</option>
                                @foreach ($user->checkoutAddresses as $address)
                                    <option value="{{ $address->id }}">
                                        {{$address->address}}, {{  $address->ward_name }}, {{ $address->district_name }}, {{ $address->province_name }}, SĐT: {{ $address->phone }}
                                    </option>
                                @endforeach
                            </select>
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

                  
                </div>

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
                    <form wire:submit.prevent="checkout" id="formCheckout" >
                        <button class="primary-btn order-submit" >Xác nhận</button>
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
