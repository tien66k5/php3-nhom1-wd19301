<div>
  <div class="containers">
    <h1>Chọn linh kiện cấu hình PC</h1>

    @foreach($components as $key => $component)
    <div class="component">
      <div class="component-name">{{ $key }}</div>

      @if(isset($selectedSkus[$key]))
      <div>
      <img src="{{ $selectedSkus[$key]['thumbnail'] }}" width="50">
      <strong>{{ $selectedSkus[$key]['name'] }}</strong>
      <br>
      Giá: {{ number_format($selectedSkus[$key]['price']) }}đ
      </div>
    @else
      <button wire:click="openModal('{{ $key }}')" class="select-btn">+ Chọn {{ $key }}</button>
    @endif
    </div>
  @endforeach
    @if(!empty($selectedSkus))
    <div class="text-center mt-4">
      <button wire:click="addBuildToCart" class="btn btn-success px-4 py-2">
      Thêm toàn bộ cấu hình vào giỏ hàng
      </button>
    </div>
  @endif

    @if (session()->has('success'))
    <div class="alert alert-success mt-2">
      {{ session('success') }}
    </div>
  @endif


  </div>




  @if ($modalOpen)
    <div class="modal" style="display: flex;">
    <div class="modal-content">
      <!-- HEADER -->
      <div class="modal-header-bar">
      <div class="modal-header-left">Chọn linh kiện: {{ $selectedComponent }}</div>
      <div class="modal-header-right">
        <div class="search-box">
        <input type="text" wire:model.live="search" placeholder="Bạn cần tìm linh kiện gì?">
        </div>
      </div>
      </div>

      <div class="modal-body">
      <!-- FILTER -->
      <div class="filter-sidebar">
        <h4 class="filter-title">Lọc sản phẩm</h4>

        <div class="filter-group">
        <h5>Hãng sản xuất</h5>
        <div class="filter-options">
          @foreach ($availableBrands as $brand)
        <label class="filter-option">
        <input type="checkbox" wire:model.live="selectedBrands" value="{{ $brand['name'] }}">
        <span>{{ $brand['name'] }}</span>
        </label>
      @endforeach
        </div>
        </div>

        <div class="filter-group">
        <h5>Khoảng giá</h5>
        <div class="filter-options">
          @foreach ($priceRanges as $label => $range)
        <label class="filter-option">
        <input type="checkbox" wire:model.live="selectedPrices" value="{{ $label }}">
        <span>{{ $label }}</span>
        </label>
      @endforeach
        </div>
        </div>
      </div>

      <!-- PRODUCT LIST -->
      <div class="product-list">
        <div class="product-controls">
        <select wire:model="sortBy">
          <option value="">Sắp xếp</option>
          <option value="price_asc">Giá thấp đến cao</option>
          <option value="price_desc">Giá cao đến thấp</option>
          <option value="name_asc">Tên A-Z</option>
          <option value="name_desc">Tên Z-A</option>
        </select>
        </div>

        @forelse ($filteredSkus as $sku)
      <div class="product-item">
      <img src="{{ $sku->thumbnail }}" width="100">
      <div>
        <strong>{{ $sku->product->name }}</strong><br>
        Giá: {{ number_format($sku->price) }}đ
      </div>
      <button class="add-btn" wire:click="addToBuild({{ $sku->id }})">Thêm vào cấu hình</button>
      </div>
    @empty
    <p>Không có sản phẩm phù hợp.</p>
  @endforelse
      </div>
      </div>

      <button class="close-modal" wire:click="closeModal">Đóng</button>
    </div>
    </div>
  @endif



</div>