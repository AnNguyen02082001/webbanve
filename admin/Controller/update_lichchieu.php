<?php
    include '../utils/dbConnect.php';
    $id = isset($_GET['id_lich_chieu'])?$_GET['id_lich_chieu']:'';
    $id_phongchieu = isset($_POST['id_phongchieu'])?$_POST['id_phongchieu']:'';
    $id_phim = isset($_POST['text_id_phim'])?$_POST['text_id_phim']:'';
    $ngay_chieu = isset($_POST['text_ngay'])?$_POST['text_ngay']:'';
    $gio_chieu = isset($_POST['text_gio'])?$_POST['text_gio']:'';
    
    $sql = "update lich_chieu set Phimid_phim='$id_phim', ngay_chieu='$ngay_chieu', gio_chieu='$gio_chieu', phong_chieuid_rap='$id_phongchieu' where id_lich_chieu='$id'";
    $conn->query($sql);
    header('location:../view/lichchieu.php');
?>