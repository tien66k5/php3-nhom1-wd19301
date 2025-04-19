<div>
    <div class="containers">
        <h1>Chọn linh kiện cấu hình PC</h1>
  
        <div class="component">
          <div class="component-name">1. CPU</div>
          <button class="select-btn" onclick="openModal('CPU')">+ Chọn
            CPU</button>
        </div>
        
        <div class="component">
          <div class="component-name">2. Mainboard</div>
          <button class="select-btn" onclick="openModal('Mainboard')">+ Chọn
            Mainboard</button>
        </div>
        <div class="component">
          <div class="component-name">3. RAM</div>
          <button class="select-btn" onclick="openModal('RAM')">+ Chọn Ram bộ nhớ
            trong</button>
        </div>
        <div class="component">
          <div class="component-name">4. Ổ CỨNG SSD1</div>
          <button class="select-btn" onclick="openModal('SDD1')">+ Chọn Ổ Cứng SDD1
            </button>
        </div>
        <div class="component">
          <div class="component-name">5. Ổ CỨNG SSD2</div>
          <button class="select-btn" onclick="openModal('SDD2')">+ Chọn Ổ Cứng SDD2
            </button>
        </div>
        <div class="component">
          <div class="component-name">6. Ổ CỨNG HDD</div>
          <button class="select-btn" onclick="openModal('HDD')">+ Chọn Ổ Cứng HDD
            </button>
        </div>
        <div class="component">
          <div class="component-name">7. BÀN PHÍM</div>
          <button class="select-btn" onclick="openModal('BÀN PHÍM')">+ Chọn Bàn Phím
            </button>
        </div>
        <div class="component">
          <div class="component-name">8. MOUSE - CHUỘT</div>
          <button class="select-btn" onclick="openModal('MOUSE')">+ Chọn Mouse - Chuột
            </button>
        </div>
        <div class="component">
          <div class="component-name">9. PAD - BÀN DI CHUỘT</div>
          <button class="select-btn" onclick="openModal('PAD')">+ Chọn Pad - Bàn Di Chuột
            </button>
        </div>
        <div class="component">
          <div class="component-name">10. GHẾ GAMING</div>
          <button class="select-btn" onclick="openModal('GHẾ GAMING')">+ Chọn Ghế Gaming 
            </button>
        </div>
        <div class="component">
          <div class="component-name">11. BÀN GAMING</div>
          <button class="select-btn" onclick="openModal('BÀN GAMING')">+ Chọn Bàn Gaming
            </button>
        </div>
      </div>
  
      <div class="modal" id="selectModal">
        <div class="modal-content">
  
          <!-- PHẦN HEADER CHUNG -->
          <div class="modal-header-bar">
            <div class="modal-header-left">Chọn linh kiện</div>
            <div class="modal-header-right">
              <div class="search-box">
                <input type="text" placeholder="Bạn cần tìm linh kiện gì?">
                <button class="search-btn"><i class="fa fa-search"></i></button>
              </div>
  
            </div>
          </div>
  
          <div class="modal-body">
            <div class="filter-sidebar">
              <h4 class="filter-title">Lọc sản phẩm</h4>
              <div class="filter-group">
                <h5>Hãng sản xuất</h5>
                <div class="filter-options">
                  <label class="filter-option"><input
                      type="checkbox"><span>Intel</span></label>
                  <label class="filter-option"><input
                      type="checkbox"><span>AMD</span></label>
                  <label class="filter-option"><input
                      type="checkbox"><span>MSI</span></label>
                </div>
              </div>
              <div class="filter-group">
                <h5>Khoảng giá</h5>
                <div class="filter-options">
                  <label class="filter-option"><input type="checkbox"><span>Dưới 1
                      triệu</span></label>
                  <label class="filter-option"><input type="checkbox"><span>2
                      triệu - 5 triệu</span></label>
                  <label class="filter-option"><input type="checkbox"><span>7
                      triệu - 10 triệu</span></label>
                  <label class="filter-option"><input type="checkbox"><span>1
                      triệu - 2 triệu</span></label>
                  <label class="filter-option"><input type="checkbox"><span>10
                      triệu - 15 triệu</span></label>
                  <label class="filter-option"><input type="checkbox"><span>5
                      triệu - 7 triệu</span></label>
                </div>
              </div>
  
             
            </div>
  
            <div class="product-list">
              <div class="product-controls">
                <select>
                  <option>Sắp xếp</option>
                  <option>Giá thấp đến cao</option>
                  <option>Giá cao đến thấp</option>
                  <option>Tên A-Z</option>
                  <option>Tên Z-A</option>
                </select>
                <div class="pagination">
                  <button class="active">1</button>
                  <button>2</button>
                  <button>3</button>
                  <button>4</button>
                  <button>5</button>
                  <button>next</button>
                </div>
              </div>
              <div class="product-item">
                <img
                  src="https://product.hstatic.net/1000026716/product/mainboard-asrock-z690-pg-riptide_5e9a62c087674b3d9b8bbf0f28ff5ab0.jpg"
                  alt>
                <div>
                  <strong>ASROCK Z690 PG Riptide</strong><br>
                  Giá: 3.990.000đ
                </div>
                <button class="add-btn">Thêm vào cấu hình</button>
              </div>
            </div>
          </div>
  
        </div>
        <button class="close-modal" onclick="closeModal()">Đóng</button>
      </div>
</div>
@section('scripts')
  <script>
        function openModal() {
      document.getElementById('selectModal').style.display = 'flex';
    }
    function closeModal() {
      document.getElementById('selectModal').style.display = 'none';
    }

  </script>
@endsection