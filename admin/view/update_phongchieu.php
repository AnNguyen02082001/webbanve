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
    <title>Quản Lý phòng chiếu</title>
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
                                <h1><a href="phongchieu.php"><button type="button" class="btn btn-primary">Trở về <i
                                                class="fa fa-reply"></i></button></a></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li class="active">Quản lý rạp chiếu</li>
                                    <li><a href="phongchieu.php">Quản lý phòng chiếu</a></li>
                                    <li class="active">Cập nhật phòng chiếu</li>
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
                                <strong class="card-title text-light">Thông tin phòng chiếu</strong>
                            </div>
                            <div class="card-body card-block">
                            <?php
                                include '../utils/dbConnect.php';
                                $method = $_SERVER['REQUEST_METHOD'];
                                switch ($method) {
                                    case 'GET':
                                        $id = $_GET['id_rap'];
                                        $sql = "SELECT * FROM phong_chieu where id_rap='$id'";
                                        $stm = $conn->query($sql);
                                        $data = $stm->fetch(PDO::FETCH_ASSOC);
                                    default:
                                        break;
                                }
                                ?>
                                <?php
                               echo"<form action='../Controller/update_phongchieu.php?id_rap=$id' method='post'  enctype='multipart/form-data' class='form-horizontal'>";
                               echo"<div class='row form-group'>";
                               echo"<div class='col col-md-3'><label for='text_so_phong' class='form-control-label'>Số phòng chiếu</label></div>";
                               echo"<div class='col-12 col-md-9'><input value='{$data['so_phong']}' type='text' id='text_so_phong' name='text_so_phong' placeholder='Nhập số phòng' class='form-control'></div>";
                               echo"</div>";
                               echo"<div class='row form-group'>";
                               echo"<div class='col col-md-3'><label for='text_so_ghe' class='form-control-label'>Số ghế</label></div>";
                               echo"<div class='col-12 col-md-9'><input value='{$data['so_ghe']}' type='text' id='text_so_ghe' name='text_so_ghe' placeholder='Nhập số ghế' class='form-control'>";
                               echo"</div>";
                               echo"</div>";
                               echo"<div class='row form-group'>";
                               echo"<div class='col col-md-3'><label for='tinh_trang' class='form-control-label'>Tình trạng phòng chiếu</label></div>";
                               echo"<div class='col-12 col-md-9'>";
                               echo"<select name='tinh_trang' id='tinh_trang' class='form-control-sm form-control'>";

                               echo "<option value='{$data['tinh_trang']}'>{$data['tinh_trang']}</option>";
                               if($data['tinh_trang'] == "Đang hoạt động"){
                                echo "<option value='Đang sữa chữa'>Đang sữa chữa</option>";
                                
                               }
                               else{
                                echo "<option value='Đang hoạt động'>Đang hoạt động</option>";
                            }
                        
                               

                               echo"</select>";
                               echo"</div>";
                               echo"</div>";
                               echo"<div class='row form-group'>";
                               echo"<button type='submit' class='btn btn-primary'> Cập Nhật </button>";
                               echo"</div>";
                               echo"</form>";
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php include "layouts/footer.php"?>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <?php include "layouts/scripts.php"?>


</body>

</html>