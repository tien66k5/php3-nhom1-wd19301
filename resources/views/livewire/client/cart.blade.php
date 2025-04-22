<div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="/">Home</a></span> / <span>Shopping Cart</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-product">
        <div class="container">
            <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="product-name d-flex">
                        <div class="one-forth text-left px-4" style="padding-left:20px ">
                            <span>Chi tiết sản phẩm</span>
                        </div>

                        <div class="one-eight text-center">
                            <span>Giá</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Số lượng</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Tổng</span>
                        </div>
                        <div class="one-eight text-center px-4">
                            <span>Xóa</span>
                        </div>
                    </div>

                    @if (!empty($data))
                        @foreach($data as $item)
                            <div class="product-cart d-flex" style="padding-inline:10px">
                                <div class="one-forth">
                                    <div class="product-img">
                                        <img src="{{ asset('storage/' . $item->productSku->images) }}" alt="" width="80"
                                            height="80" style="object-fit: cover;">
                                    </div>

                                    <div class="display-tc">
                                        <h3>{{$item->productSku->product->name}}</h3>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span class="price">{{number_format($item->productSku->price)}} VNĐ</span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <p>{{$item->quantity}}</p>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span
                                            class="price">{{ number_format(($item->productSku->price) * ($item->quantity))}}</span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <button type="button" class="btn btn-danger"
                                            onclick="if (confirm('Bạn có chắc chắn muốn xóa không?')) { @this.call('deleteOne', {{ $item->id }}) }">
                                            X
                                        </button>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center">Giỏ hàng trống. <a href="/shop">Tiếp tục mua sắm</a></p>
                    @endif




                </div>
            </div>

            <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="total-wrap">
                        <div class="row">
                            <div class="col-sm-8">
                                <form action="#">
                                    <div class="row form-group">
                                        <div class="col-sm-9">
                                            {{-- <input type="text" name="coupon" class="form-control input-number"
                                                placeholder="Your Coupon Number..."> --}}
                                        </div>
                                        {{-- <div class="col-sm-3">
                                            <a href="/checkout" class="btn btn-success">Thanh toán</a>
                                        </div> --}}
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4 text-center">
                                <div class="total">
                                    <div class="sub">
                                        {{-- <p><span>Tổng tiền:</span> <span> --}}


                                                {{-- </span></p> --}}
                                        {{-- <p><span>Delivery:</span> <span>$0.00</span></p> --}}
                                        {{-- <p><span>Discount span> <span>$0.00</span></p> --}}
                                    </div>
                                    <div class="grand-total">
                                        @php
                                            $totalPrice = 0;
                                        @endphp

                                        @if($data)
                                                                            @foreach($data as $item)
                                                                                                                @php
                                                                                                                    $totalPrice += ($item->productSku->price) * ($item->quantity);
                                                                                                                @endphp
                                                                            @endforeach
                                                                            <p><span><strong>Tổng tiền:</strong></span>
                                                                                <span>{{ number_format($totalPrice, 0, ',', '.') }} VNĐ</span>
                                                                            </p>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right" style="display: flex; justify-content: flex-end	">
                            <div class="col-sm-3">
                                <a href="/checkout" class="btn btn-success">Thanh toán</a>
                            </div>
                            <div style="width: 100px">
                                <form action="/cart/delete-all" method="POST">
                                    <button type="submit" class="btn btn-danger">Xóa tất cả</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>