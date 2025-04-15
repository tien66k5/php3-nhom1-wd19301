
            <!-- HEADER -->
            <header>
                
                <!-- TOP HEADER -->

                <!-- /TOP HEADER -->

                <!-- MAIN HEADER -->
                <div id="header">
                    <!-- container -->
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <!-- LOGO -->
                            <div class="col-md-3">
                                <div class="header-logo">
                                    <a href="/" class="logo">
                                        <img src="<?= $_ENV['APP_URL'] ?>/public/Assets/Client/img/MaxStore (3) (1).png" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- /LOGO -->

                            <!-- SEARCH BAR -->
                            <div class="col-md-6">
                                <div class="header-search">
                                    <form action="{{ route('store') }}" method="GET">
                                        <select class="input-select">
                                            <option value="0">Các danh mục</option>
                                            {{-- Có thể thêm category filter ở đây nếu muốn --}}
                                        </select>
                                        <input name="search" class="input" placeholder="Tìm kiếm ở đây">
                                        <button type="submit" class="search-btn">Tìm kiếm</button>
                                    </form>
                                    
                                </div>
                            </div>

                            <!-- /SEARCH BAR -->

                            <!-- ACCOUNT -->
                            <!-- ACCOUNT -->
                            <div class="col-md-3 clearfix ">
                                <div class="header-ctn">
                                   
    <!-- Hiển thị "Xây dựng PC" nếu đã đăng nhập -->
    <div>
        <a href="/config">
            <i class="fa fa-wrench"></i>
            <span>Xây dựng PC</span>
            <div class="qty">2</div>
        </a>
    </div>


@if(!Auth::check()) 
<div class="dropdown">
    <a class="btn" href="/loginForm" role="button">
        <i class="fa fa-sign-in"></i>
        <span>Đăng nhập</span>
    </a>  
</div>
@endif

<!-- Tài khoản -->
@if(Auth::check())
<div class="dropdown">
    <a class="btn" href="/myAccount" role="button" id="dropdownMenuLink" aria-expanded="false">
        <i class="fa fa-user"></i>
        <span>
            {{ Auth::user()->name }}
        </span>
    </a>
</div>
@endif
                                
                                     
                                    
                                    <!-- Giỏ hàng -->
                                    <div class="dropdown">
                                        <a href="/cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Giỏ hàng</span>
                                            <div class="qty">3</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /ACCOUNT -->

                            <!-- /ACCOUNT -->

                        </div>
                        <!-- row -->
                    </div>
                    <!-- container -->
                </div>
                <!-- /MAIN HEADER -->
            </header>
            <!-- /HEADER -->
    </header>