<?php
    include  $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/Controller/User.php';
    $action = $_GET['action'] ?? 'index';
    // cách gọi dùng link: <a href="?action=phim&phim=10"></a>
    switch ($action) {
        case 'index':
            (new User())->index();
            break;
        case 'search':
            (new User())->index();
            break; 
        case 'phim':
            (new User())->showPhim();
            break;
        case 'the-loai':
            (new User())->showTheLoai();
            break;
        case 'menu':
            (new User())->showMenu();
            break;
        case 'dat-ve':
            (new User())->showDatVe();
            break;
        case 'trang-ca-nhan':
            (new User())->showProfile();
            break;
        case 've-da-mua':
            (new User())->showVeDaMua();
            break;
        case 'edit_profile':
            (new User())->editProfie();
            break;
        case 'orders':
            (new User())->datVeHandle();
            break;
        case 'dang-nhap':
            (new User())->login();
            break;
        case 'logining':
            (new User())->logining();
            break;
        case 'dang-ky':
            (new User())->register();
            break;
        case 'registering':
            (new User())->registering();
            break;
        case 'logout':
            (new User())->logout();
            break;
        default: echo "Không có action này";
    }