<?php
    include '../utils/dbConnect.php';
    $id = isset($_GET['id_phim'])?$_GET['id_phim']:'';
    $sql = "select img from phim where id_phim = $id";
    $stm = $conn->query($sql);
    $hinh = $stm->fetch(PDO::FETCH_ASSOC);
    
    $img = ($_FILES['text_img']['name']!=='')?$_FILES['text_img']['name']:$hinh['img'];
    $ten = isset($_POST["text_ten"])?$_POST["text_ten"]:'';
    
    $theloai = isset($_POST['text_theloai'])?$_POST['text_theloai']:'';
    $dienvien = isset($_POST['text_dienvien'])?$_POST['text_dienvien']:'';
    $ngonngu = isset($_POST['text_ngonngu'])?$_POST['text_ngonngu']:'';
    $thoigian = isset($_POST['thoi_gian'])?$_POST['thoi_gian']:'';
    $giave = isset($_POST['text_giave'])?$_POST['text_giave']:'';
    $sql = "update phim set img='$img', ten='$ten', the_loai='$theloai', Dien_vien='$dienvien', ngon_ngu='$ngonngu', thoi_gian='$thoigian', gia_ve='$giave' where id_phim='$id'";
    $conn->query($sql);
    header('location:../view/phim.php');
?>