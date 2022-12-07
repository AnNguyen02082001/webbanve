<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
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
                                <h1><a href="newphongchieu.php"><button type="button" class="btn btn-primary">Thêm phòng chiếu <i class="fa fa-plus-circle"></i></button></a></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li class="active">Quản lý rạp chiếu</li>
                                    <li><a href="phongchieu.php">Quản lý phòng chiếu</a></li>
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
                            <div class="card-header">
                                <strong class="card-title">Danh sách phòng chiếu</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">ID</th>
                                            <th>Số phòng chiếu</th>
                                            <th>Số ghế ngồi</th>
                                            <th>Tình trạng phòng chiếu</th>
                                            <th>Hoạt động</th>
                                            <th>         </th>
                                            <th>         </th>
                                        </tr>
                                    </thead>
                                    <?php
                                    include '../utils/dbConnect.php';
                                    $sql = "select * from phong_chieu";
                                    $stm = $conn->query($sql);
                                    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($data as $item) {
                                        echo "<tbody>";
                                        echo "<tr>";
                                        echo "<td class='serial'>{$item['id_rap']}</td>";
                                            
                                        echo "<td>{$item['so_phong']}</td>";
                                        echo "<td> <span class='product'>{$item['so_ghe']}</span> </td>";
                                        echo "<td> {$item['tinh_trang']}</td>";
                                        echo "<td>";
                                        echo "<a href='../view/update_phongchieu.php?id_rap={$item['id_rap']}' type='button' class='btn btn-primary'><i class='fa fa-edit'></i> Chỉnh sửa</a>";
                
                                        echo "</td>";
                                        echo "<td>";
                                        
                                        echo "<a href='../Controller/delete_phongchieu.php?id_rap={$item['id_rap']}' type='button' class='btn btn-danger'><i class='fa fa-trash-o'></i> Xóa</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                        echo "</tbody>";




                    
                                    }

                                    ?>
                                    
                                </table>
                            </div> <!-- /.table-stats -->
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
