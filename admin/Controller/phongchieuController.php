<?php
    include '../utils/dbConnect.php';

    $phongchieu = $_POST;
    var_dump($phongchieu);
    
    $method = $_SERVER['REQUEST_METHOD'];
   
    
    switch ($method) {
        
        case "POST":
            $phongchieu = $_POST;
            $sql = "INSERT INTO phong_chieu(so_phong, so_ghe, tinh_trang) VALUES( :so_phong, :so_ghe, :tinh_trang)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':so_phong', $phongchieu["text_so_phong"]);
            $stmt->bindParam(':so_ghe', $phongchieu["text_so_ghe"]);
            $stmt->bindParam(':tinh_trang', $phongchieu["tinh_trang"]);
            
            
            try{
                $stmt->execute();
                
                    $response = ['status' => 1, 'message' => 'Record created successfully.'];
                    header("location: ../view/newphongchieu.php");
            }
            catch(Exception $e)
            {
                echo '<script>alert("số phòng đã tồn tại!");window.history.go(-1);</script>';
                exit;
            }  
    }
?>