
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
                                    <form>
                                        <select class="input-select">
                                            <option value="0">Các danh mục</option>
                                            {{-- <?php
                                         
                                            foreach ($categories as $category) {
                                                echo '<option value="' . htmlspecialchars($category['id']) . '">' . htmlspecialchars($category['name']) . '</option>';
                                            }
                                            ?> --}}
                                        </select>
                                        <input class="input" placeholder="Tìm kiếm ở đây">
                                        <button class="search-btn">Tìm kiếm</button>
                                    </form>
                                </div>
                            </div>

                            <!-- /SEARCH BAR -->

                            <!-- ACCOUNT -->
                            <!-- ACCOUNT -->
                            <div class="col-md-3 clearfix ">
                                <div class="header-ctn">
                                    <!-- Xây dựng PC -->
                                    {{-- <div>
                                        <a href="#">
                                            <i class="fa fa-wrench"></i>
                                            <span>Xây dựng PC</span>
                                            <div class="qty">2</div>
                                        </a>
                                    </div> --}}
                                    <div class="dropdown">
                                        <a class="btn" href="/loginForm" role="button">
                                            <i class="fa fa-sign-in"></i>
                                            <span>Đăng nhập</span>
                                        </a>  
                                    </div> 
                                    <!-- Tài khoản -->
                                    <div class="dropdown">
                                        <a class="btn" href="/myAccount" role="button" id="dropdownMenuLink" aria-expanded="false">
                                            <i class="fa fa-user"></i>
                                            
                                            <span>
                                                {{ Auth::check() ? Auth::user()->name : 'Tài khoản' }}
                                            </span>
                                        </a>
                                                              

                                    </div>
                                    
                                     
                                    
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