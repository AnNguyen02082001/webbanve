<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Đăng Ký</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="View/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Contact Start -->
    <div class="container-fluid">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $_SESSION['error'] ?>
            </div>
        <?php unset($_SESSION['error']); endif; ?>
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"><?php echo $title ?></span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <div class="login-form">
                    <form action="?action=registering" method="post">
                        <div class="form-group">
                            <label>Nhập Tên</label>
                            <input type="text" name="name" class="form-control"
                                <?php
                                if(isset($_SESSION['name_old'])) :
                                ?>
                                    value="<?php echo $_SESSION['name_old']; ?>"
                                <?php unset($_SESSION['name_old']); endif; ?>
                            >
                        </div>
                        <div class="form-group">
                            <label>Nhập email</label>
                            <input type="email" name="email" class="form-control"
                                <?php
                                if(isset($_SESSION['email_old'])) :
                                    ?>
                                    value="<?php echo $_SESSION['email_old']; ?>"
                                <?php unset($_SESSION['email_old']); endif; ?>
                            >
                            <?php
                            if(isset($_SESSION['email'])) :
                                ?>
                                <span class="text-danger"><?php echo $_SESSION['email']; ?></span>
                                <?php unset($_SESSION['email']);
                            endif;
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Nhập số điện thoại</label>
                            <input type="tel" name="phone" class="form-control"
                                <?php
                                if(isset($_SESSION['phone_old'])) :
                                    ?>
                                    value="<?php echo $_SESSION['phone_old']; ?>"
                                <?php unset($_SESSION['phone_old']); endif; ?>
                            >
                            <?php
                            if(isset($_SESSION['phone'])) :
                                ?>
                                <span class="text-danger"><?php echo $_SESSION['phone']; ?></span>
                                <?php unset($_SESSION['phone']);
                            endif;
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Nhập ngày sinh</label>
                            <input type="date" name="birthdate"
                                <?php
                                if(isset($_SESSION['birthdate_old'])) :
                                ?>
                                   value="<?php echo $_SESSION['birthdate_old']; ?>"
                                   <?php unset($_SESSION['birthdate_old']); endif; ?>
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nhập Địa chỉ</label>
                            <input type="text" name="address" class="form-control"
                                <?php
                                if(isset($_SESSION['address_old'])) :
                                    ?>
                                    value="<?php echo $_SESSION['address_old']; ?>"
                                <?php unset($_SESSION['address_old']); endif; ?>
                            >

                        </div>
                        <div class="form-group">
                            <label>Nhập mật khẩu</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" name="re_password" class="form-control">
                            <?php
                                if(isset($_SESSION['re_password'])) :
                                    ?>
                                    <span class="text-danger"><?php echo $_SESSION['re_password']; ?></span>
                                    <?php unset($_SESSION['re_password']);
                                endif;
                            ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Đăng ký</button>
                        
                        <div class="register-link m-t-15 text-center">
                            <p>Bạn đã có tài khoản ?<a href="?action=dang-nhap"> Đăng nhập</a></p>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>