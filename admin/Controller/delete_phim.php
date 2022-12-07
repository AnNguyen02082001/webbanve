<?php
    include '../utils/dbConnect.php';
    $id_phim = isset($_GET['id_phim'])?$_GET['id_phim']:'';
    $sql = "delete from phim where id_phim = '$id_phim'";
    $conn ->query($sql);
    header('location:../view/phim.php');
?>