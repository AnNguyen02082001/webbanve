    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="?" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Multi</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="?action=search">
                    <div class="input-group">
                        <input type="text" name="q" <?php if(isset($q)): ?> value="<?php echo $q ?>" <?php endif; ?> class="form-control" placeholder="Nhập tên phim">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <?php if (isset($_SESSION['user'])) : ?>
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                            <?php echo $_SESSION['user']->name ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="?action=trang-ca-nhan&id=<?php echo $_SESSION['user']->id ?>"><button class="dropdown-item" type="button">Trang cá nhân</button></a>
                            <a href="?action=ve-da-mua"><button class="dropdown-item" type="button">Vé đã mua</button></a>
                            <a href="?action=logout"><button class="dropdown-item" type="button">Đăng xuất</button></a>
                        </div>
                        <?php else: ?>
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Tài khoản</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="?action=dang-nhap"><button class="dropdown-item" type="button">Đăng nhập</button></a>
                            <a href="?action=dang-ky"><button class="dropdown-item" type="button">Đăng ký</button></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="?" class="nav-item nav-link active" style="min-width: 100px">Trang chủ</a>
                            <a class="nav-item nav-link d-flex align-items-center justify-content-between w-100" data-toggle="collapse" href="#navbar-vertical">
                                <h6 class="text-white m-0 mr-2" >Thể loại</h6>
                                <i class="fa fa-angle-down text-white"></i>
                            </a>
                            <style>
                                .navbar-dark .navbar-nav .nav-link {
                                    color: black;
                                }
                            </style>
                            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999; top: 100%; left: 0">
                                <div class="navbar-nav w-100">
                                    <?php foreach ($categories as $category) : ?>
                                        <a href="?action=the-loai&id=<?php echo $category ?>" class="nav-item nav-link <?php if (isset($theLoai)) { if ($category === $theLoai): ?> active <?php endif; } ?>"><?php echo $category ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </nav>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->