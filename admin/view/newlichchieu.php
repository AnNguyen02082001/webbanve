<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('location:../view/index.php');
    }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản Lý lịch chiếu</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>
    <!-- Left Panel -->
    <?php include "layouts/menuadmin.php" ?>
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include "layouts/menutop.php" ?>
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><a href="lichchieu.php"><button type="button" class="btn btn-primary">Trở về <i class="fa fa-reply"></i></button></a></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li class="active">Quản lý rạp chiếu</li>
                                    <li><a href="lichchieu.php">Quản lý lịch chiếu</a></li>
                                    <li class="active">Thêm lịch chiếu</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <strong class="card-title text-light">Thông tin lịch chiếu</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="../Controller/lichchieuController.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text_id_phim" class=" form-control-label">ID phim
                                            </label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="text_id_phim" id="text_id_phim" class="form-control-sm form-control">
                                            <option value="...">...</option>
                                                <?php
                                                include '../utils/dbConnect.php';
                                                $sql = "select * from phim";
                                                $stm = $conn->query($sql);
                                                $data = $stm->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($data as $item) {
                                                    echo "<option value='{$item['id_phim']}'>{$item['id_phim']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text_ngay" class=" form-control-label">Ngày chiếu
                                            </label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text_ngay" name="text_ngay" placeholder="Nhập ngày" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text_gio_chieu" class=" form-control-label">Giờ chiếu</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text_gio_chieu" name="text_gio_bd" placeholder="Nhập giờ bắt đầu" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text_id_phim" class=" form-control-label">ID phòng chiếu
                                            </label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="id_phongchieu" id="id_phongchieu" class="form-control-sm form-control">
                                            <option value="...">...</option>
                                                <?php
                                                include '../utils/dbConnect.php';
                                                $sql = "select * from phong_chieu";
                                                $stm = $conn->query($sql);
                                                $data = $stm->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($data as $item) {
                                                    echo "<option value='{$item['id_rap']}'>{$item['id_rap']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Thêm <i class="fa fa-plus-circle"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php include "layouts/footer.php" ?>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <?php include "layouts/scripts.php" ?>


</body>

</html>