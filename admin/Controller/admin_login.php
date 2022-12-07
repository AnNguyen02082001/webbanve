<?php
    include'../utils/dbConnect.php';
    $sql = "select * from admin";
    $stm = $conn->query($sql);
    $data=$stm->fetchAll(PDO::FETCH_ASSOC);
    $username = isset($_POST['username'])?$_POST['username']:'';
    
    $password = isset($_POST['password'])?$_POST['password']:'';

    foreach($data as $acc){
        
        if($username == $acc['user_name'] && $password == $acc['password']){

            session_start();
            $_SESSION['login'] = 1;
            header('location:../view/phim.php');
        }
        if($username == '' && $password == ''){

            echo '<script>alert("Tài khoản hoặc mật khẩu trống!");window.history.go(-1);</script>';
        }
        else{
            echo '<script>alert("Tài khoản hoặc mật khẩu không đúng!");window.history.go(-1);</script>';
        }
    }
?>