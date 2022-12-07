<?php
    include '../utils/dbConnect.php';
    $id_rap = isset($_GET['id_rap'])?$_GET['id_rap']:'';
    $sql = "delete from phong_chieu where id_rap = '$id_rap'";
    $conn ->query($sql);
    header('location:../view/phongchieu.php');
?>