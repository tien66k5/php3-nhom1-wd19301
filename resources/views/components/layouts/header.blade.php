
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
                                        <img style="width:80px; border-radius:30%;" src="https://scontent.fsgn5-9.fna.fbcdn.net/v/t39.30808-6/461328492_1243063690209847_5705983857865904213_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=nAZL61XcyLIQ7kNvwFDSV9q&_nc_oc=AdlPL2nf1g1uabar-CC8rUmVV2GABA56tM5M7HwmoOxNT-t_VuaMKeij1wdUKo5xOUWwZGlQOmtM79ZUWdaqqE51&_nc_zt=23&_nc_ht=scontent.fsgn5-9.fna&_nc_gid=37QK2rlJvI9VRJwVPqfnww&oh=00_AfE3ZziEMWNibON_bdA5J-P1EA90Epd7QDqiqow9TVfd_Q&oe=68045A8D" alt="">
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
            <div>
                @if(session('success'))
                <div class="alert alert-success" 
                id="success-alert"
                style="position: absolute; top: 20px; left: 50%; transform: translateX(-50%); z-index: 999;">
               {{ session('success') }}
            </div>@endif
            
            @if(session('success') || session('error'))
            <div 
                id="alert-message"
                class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }}" 
                style="position: absolute; top: 20px; left: 50%; transform: translateX(-50%); z-index: 999;">
                {{ session('success') ?? session('error') }}
            </div>
            @endif
    </header>