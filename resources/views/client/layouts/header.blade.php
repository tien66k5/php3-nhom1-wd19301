
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
                            <div class="col-md-3 clearfix me-">
                                <div class="header-ctn">
                                    <!-- Xây dựng PC -->
                                    <div>
                                        <a href="#">
                                            <i class="fa fa-wrench"></i>
                                            <span>Xây dựng PC</span>
                                            <div class="qty">2</div>
                                        </a>
                                    </div>

                                    <!-- Tài khoản -->
                                    <div>
                                        <a href="<?= isset($_SESSION['user']) ? '/Account' : '/loginForm'; ?>">
                                            <i class="fa fa-user"></i>
                                            <span>
                                                <?= isset($_SESSION['user']) ? $_SESSION['user']['name'] : 'Tài khoản'; ?>
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