<section class="account">
    <div class="container-fluid">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
        <div class="row g-0">
            @include('components.side-bar')
            <div class="col-lg-9">
                <div class="order-info">
                    <div class="order-info-add">
                        <div class="order-info-add-title">
                            <p>Đơn Hàng</p>
                        </div>
                        <ul class="nav nav-tabs fs">
                            <li class="fw-bold">TẤT CẢ ĐƠN HÀNG</li>
                        </ul>
                        <div class="container-fluid">
                            @if(empty($groupedOrders))
                            <div class="order-info-add-modal-show">
                                <span>Không có đơn hàng nào!</span>
                                <p>Hãy mua sắm ngay lúc này để tận hưởng các ưu đãi hấp dẫn.</p>
                                <button type="button">
                                    <a href="/products">DẠO MỘT VÒNG XEM NÀO</a>
                                </button>
                            </div>
                        @else
                            @foreach($groupedOrders as $orderId => $orderItems)
                                <div class="list-order-page">
                                    <div class="items-orders-list">
                                        <div class="wrap-head-order">
                                            <div class="d-flex justify-content-between align-items-center code-order-list">
                                                <h4>
                                                    <a href="{{ url('/order-detail/'.$orderId) }}">Đơn hàng <b>{{ $orderId }}</b></a>
                                                </h4>
                                                <div class="status-order d-flex align-items-center">
                                                    <span>
                                                        @switch($orderItems[0]['order_status'])
                                                            @case(1) Đang xử lý @break
                                                            @case(2) Chờ thanh toán @break
                                                            @case(3) Đã thanh toán @break
                                                            @case(4) Đang vận chuyển @break
                                                            @case(5) Đã giao @break
                                                            @default Đã hủy
                                                        @endswitch
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="content-order">
                                            @foreach($orderItems as $item)
                                                <div class="items-prod-in-orders">
                                                    <div class="media-prod">
                                                        <img width="100px" src="{{ asset('public/Assets/uploads/' . $item['image_name']) }}" alt="{{ $item['image_name'] }}">
                                                    </div>
                                                    <div class="info-prod">
                                                        <div class="vendor-prod">{{ $item['category_name'] }}</div>
                                                        <div class="title-prod">{{ $item['product_name'] }}</div>
                                                        <div class="wrap-price-quantity">
                                                            <div class="price-prod"><span>{{ number_format($item['order_price'], 0, ',', '.') }} VNĐ</span></div>
                                                            <div class="quantity-prod"><span>Số lượng: {{ $item['quantity'] }}</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                        
                                            @if($orderItems[0]['status'] == 1)
                                                <div class="btnInCard d-flex justify-content-end">
                                                    <form wire:submit.prevent="cancelOrder({{ $orderId }})">
                                                        <button type="submit" class="btn btn-danger btn-sm">Hủy đơn</button>
                                                    </form>
                                                    
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        
                                </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>