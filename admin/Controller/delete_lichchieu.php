<?php
    include '../utils/dbConnect.php';
    $id_lich_chieu = isset($_GET['id_lich_chieu'])?$_GET['id_lich_chieu']:'';
    $sql = "delete from lich_chieu where id_lich_chieu = '$id_lich_chieu'";
    $conn ->query($sql);
    header('location:../view/lichchieu.php');
?>