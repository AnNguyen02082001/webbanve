<?php
include  $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/Model/Categories.php';
include $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/Model/Phim.php';
include $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/Model/Users.php';
include $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/Model/LichChieu.php';
include $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/Model/Ve.php';

    class User {
        public function index()
        {
            session_start();
            $title = 'Danh sách phim';
            $categories = (new Categories())->all();
            $q = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
            $listPhim ;
            if (empty($q)) {
                $listPhim = (new Phim())->all();
            }
            else {
                $listPhim = (new Phim())->getAllByName($q);
            }
            include  $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/View/index.php';
        }

        public function showPhim()
        {
            $id = htmlspecialchars($_GET['phim']);
            $title = 'Nội dung phim';
            $categories = (new Categories())->all();
            $phim = (new Phim())->get($id)[0];

            session_start();
            include  $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/View/phim.php';
        }

        public function showTheLoai()
        {
            $theLoai = htmlspecialchars($_GET['id']);
            $title = $theLoai;
            $categories = (new Categories())->all();
            $listPhim = (new Categories())->get($theLoai);

            session_start();
            include  $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/View/index.php';
        }

        public function login()
        {
            session_start();
            $title = 'Đăng nhập';
            include  $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/View/login.php';
        }

        public function logining()
        {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

            session_start();
            if (empty($email) || empty($password)) {
                $_SESSION['error'] = 'Bạn phải nhập đầy đủ các trường';
                header('location:?action=dang-nhap');
                return;
            }

            $user = (new Users())->getByEmail($email)[0];
            if (empty($user)) {
                $_SESSION['email'] = 'Không tồn tại người dùng';
                $_SESSION['email_old'] = $email;
                header('location:?action=dang-nhap');
                return;
            }

            if ($password !== $user->password) {
                $_SESSION['password'] = 'Mật khẩu không đúng';
                $_SESSION['email_old'] = $email;
                header('location:?action=dang-nhap');
                return;
            }

            $_SESSION['user'] = $user;
            header('location:?');
        }

        public function register()
        {
            $title = 'Đăng ký';
            session_start();
            include  $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/View/register.php';
        }

        public function registering()
        {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
            $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_SPECIAL_CHARS);
            $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $rePassword = filter_input(INPUT_POST, 're_password', FILTER_SANITIZE_SPECIAL_CHARS);

            session_start();
            $_SESSION['name_old'] = $name;
            $_SESSION['email_old'] = $email;
            $_SESSION['phone_old'] = $phone;
            $_SESSION['birthdate_old'] = $birthdate;
            $_SESSION['address_old'] = $address;
            $_SESSION['password_old'] = $password;
            $_SESSION['rePassword_old'] = $rePassword;

            if (empty($name) || empty($email) || empty($phone) || empty($birthdate) ||
                empty($address) || empty($password) || empty($rePassword)) {
                $_SESSION['error'] = 'Bạn phải nhập đầy đủ các trường';
                header('location:?action=dang-ky');
                return;
            }

            $userEmail = (new Users())->getByEmail($email);
            if (!empty($userEmail)) {
                $_SESSION['email'] = 'Email đã tồn tại';
                header('location:?action=dang-ky');
                return;
            }

            $userPhone = (new Users())->getByPhone($phone);
            if (!empty($userPhone)) {
                $_SESSION['phone'] = 'Số điện thoại đã tồn tại';
                header('location:?action=dang-ky');
                return;
            }

            if ($password !== $rePassword) {
                $_SESSION['re_password'] = 'Mật khẩu nhập lại không khớp';
                header('location:?action=dang-ky');
                return;
            }
            (new Users())->create($name, $email, $phone, $birthdate, $address, $password);
            $newUser = (new Users())->getByEmail($email)[0];
            $_SESSION['user'] = $newUser;
            header('location:?action=index');
        }

        public function logout()
        {
            session_start();
            unset($_SESSION['user']);
            header('location:?action=dang-nhap');
        }

        public function showMenu()
        {
            $title = 'Danh sách lịch chiếu';
            $idPhim = htmlspecialchars($_GET['phim']);
            $categories = (new Categories())->all();
            $phim = (new Phim())->get($idPhim)[0];

            $listLich = (new LichChieu())->getAllByPhim($idPhim);

            include  $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/View/menu.php';
        }

        public function showDatVe()
        {
            session_start();
            if (is_null($_SESSION['user'])) {
                $_SESSION['error'] = 'Bạn cần đăng nhập để có thể đặt vé';
                header('location:?action=dang-nhap');
                return ;
            }

            $title = 'Đặt vé xem phim';
            $idLich = htmlspecialchars($_GET['lich']);
            $categories = (new Categories())->all();

            $lich = (new LichChieu())->get($idLich)[0];

            $phim = (new Phim())->get($lich->Phimid_phim)[0];

//            xử lý kiểm tra số ghế đã được đặt
            $soGheDefault = (new Ve())->getSoGheByLich($idLich);
            $soGhe = [];
            foreach ($soGheDefault as $soGheItem) {
                $soGhe[] = $soGheItem->so_ghe;
            }

            include  $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/View/dat_ve.php';
        }

        public function datVeHandle()
        {
            session_start();

            $soGhe = $_POST['so_ghe'];
            $lich = $_POST['lich'];
            $user = $_SESSION['user']->id;
            if (empty($soGhe) || empty($lich)) {
                $_SESSION['error'] = 'Bạn cần chọn ghế để đặt vé';
                header("location: ?action=dat-ve&lich=$lich");
                return;
            }
            foreach ($soGhe as $ghe) {
                (new Ve())->create($user, $lich, $ghe);
            }
            $_SESSION['success'] = 'Đã đặt vé thành công';
            header("location: ?action=dat-ve&lich=$lich");
        }

        public function showProfile()
        {
            session_start();

            $categories = (new Categories())->all();

            $id = htmlspecialchars($_GET['id']);
            
            if (is_null($_SESSION['user'])) {
                $_SESSION['error'] = 'Bạn chưa đăng nhập';
                header("location:?action=dang-nhap");
            }
            if ($_SESSION['user']->id != $id) {
                $_SESSION['error'] = 'Bạn không có quyền';
                header("location:?action=dang-nhap");
            }

            $user = (new Users())->get($id)[0];

            $title = 'Trang cá nhân';
            include  $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/View/profile.php';
        }

        public function editProfie()
        {
            session_start();

            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_SPECIAL_CHARS);
            $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);

            if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($birthdate) ||
                empty($address)) {
                $_SESSION['error'] = 'Bạn không được để trống trường nào cả';
                header("location:?action=trang-ca-nhan&id=$id");
            }

            $userEmail = (new Users())->getByEmailNotUser($email, $id);
            if (!empty($userEmail)) {
                $_SESSION['error'] = 'Email đã tồn tại';
                header("location:?action=trang-ca-nhan&id=$id");
                return;
            }

            $userPhone = (new Users())->getByPhoneNotUser($phone, $id);
            if (!empty($userPhone)) {
                $_SESSION['error'] = 'Số điện thoại đã tồn tại';
                header("location:?action=trang-ca-nhan&id=$id");
                return;
            }

            (new Users())->update($id, $name, $email, $phone, $birthdate, $address);

            $_SESSION['success'] = 'Đã thay đổi thông tin thành công';
            header("location:?action=trang-ca-nhan&id=$id");
        }

        public function showVeDaMua()
        {
            session_start();

            $categories = (new Categories())->all();

            if (is_null($_SESSION['user'])) {
                $_SESSION['error'] = 'Bạn chưa đăng nhập';
                header("location:?action=dang-nhap");
            }
            $user_id = $_SESSION['user']->id;
            $listVe = (new Ve())->getAllByUser($user_id);

            $title = 'Vé đã mua';
            include  $_SERVER['DOCUMENT_ROOT'] . '/webbanve/user/View/ve_da_mua.php';
        }

    }