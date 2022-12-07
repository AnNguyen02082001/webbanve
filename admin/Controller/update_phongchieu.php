<?php
    include '../utils/dbConnect.php';
    
    $id = isset($_GET['id_rap'])?$_GET['id_rap']:'';
    
    $so_phong = isset($_POST['text_so_phong'])?$_POST['text_so_phong']:'';
    
    
    $so_ghe = isset($_POST['text_so_ghe'])?$_POST['text_so_ghe']:'';
    

    $tinh_trang = isset($_POST['tinh_trang'])?$_POST['tinh_trang']:'';
    
    $sql = "update phong_chieu set so_phong='$so_phong', so_ghe='$so_ghe', tinh_trang='$tinh_trang' where id_rap='$id'";
    
    
    try {
    $n=$conn->query($sql);
    header('location:../view/phongchieu.php');
    }
    catch(Exception $e)
    {
        ?>
        <script>
            alert('số phòng đã tồn tại!');
            window.history.go(-1);
        </script>
        <?php
        exit;
    }
?>
