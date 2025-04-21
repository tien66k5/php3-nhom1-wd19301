<x-filament::page>
    <h2 class="text-2xl font-bold text-center mb-6">Danh sách Đơn Hàng</h2>

    <table class="table-auto w-full border-collapse mb-6">
        <thead>
            <tr class="bg-black">
                <th class="p-3 text-left text-sm font-medium text-black">Mã đơn</th>
                <th class="p-3 text-left text-sm font-medium text-black">Khách hàng</th>
                <th class="p-3 text-left text-sm font-medium text-black">Tổng tiền</th>
                <th class="p-3 text-left text-sm font-medium text-black">Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <!-- Hàng chính -->
                <tr class="border-t bg-black">
                    <td class="p-3 text-sm font-semibold text-black">{{ $order->id }}</td>
                    <td class="p-3 text-sm text-black">{{ $order->user->name }}</td>
                    <td class="p-3 text-sm text-black">{{ number_format($order->total_price) }} VNĐ</td>
                    <td class="p-3 text-sm text-black">
                        {{
                            match($order->status) {
                                1 => 'Đang xử lý',
                                2 => 'Chờ thanh toán',
                                3 => 'Đã thanh toán',
                                4 => 'Đang vận chuyển',
                                5 => 'Đã giao',
                                default => 'Đã hủy',
                            }
                        }}
                    </td>
                    
                </tr>

                <!-- Hàng chi tiết -->
                <tr class="bg-black">
                    <td colspan="4" class="p-4">
                        <div class="grid grid-cols-2 gap-4 text-sm mb-3">
                            <div><strong class="text-black">SĐT:</strong> {{ $order->user->phone }}</div>
                            <div><strong class="text-black">Địa chỉ:</strong> {{ $order->address->address ?? '---' }}</div>
                        </div>

                        <div>
                            <strong class="block mb-2 text-black">Sản phẩm:</strong>
                            <table class="w-full border text-sm">
                                <thead class="bg-black">
                                    <tr>
                                        <th class="p-2 text-left text-black">Tên sản phẩm</th>
                                        <th class="p-2 text-left text-black">SKU</th>
                                        <th class="p-2 text-left text-black">Số lượng</th>
                                        <th class="p-2 text-left text-black">Giá</th>
                                        <th class="p-2 text-left text-black">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->details as $detail)
                                        <tr class="border-t">
                                            <td class="p-2 text-black">{{ $detail->productSku->product->name ?? '---' }}</td>
                                            <td class="p-2 text-black">{{ $detail->productSku->sku ?? '---' }}</td>
                                            <td class="p-2 text-black">{{ $detail->quantity }}</td>
                                            <td class="p-2 text-black">{{ number_format($detail->price) }} VNĐ</td>
                                            <td class="p-2 text-black">{{ number_format($detail->price * $detail->quantity) }} VNĐ</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-filament::page>
