<?php
    include '../utils/dbConnect.php';

    $lichchieu = $_POST;
    var_dump($lichchieu);
    
    $method = $_SERVER['REQUEST_METHOD'];
   
    
    switch ($method) {
        
        case "POST":
            $lichchieu = $_POST;
            $sql = "INSERT INTO lich_chieu(Phimid_phim, ngay_chieu, gio_chieu, phong_chieuid_rap) VALUES( :Phimid_phim, :ngay_chieu, :gio_chieu, :phong_chieuid_rap)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':Phimid_phim', $lichchieu["text_id_phim"]);
            $stmt->bindParam(':ngay_chieu', $lichchieu["text_ngay"]);
            $stmt->bindParam(':gio_chieu', $lichchieu["text_gio_bd"]);
            $stmt->bindParam(':phong_chieuid_rap', $lichchieu["id_phongchieu"]);
    
            if ($stmt->execute()) {
                $response = ['status' => 1, 'message' => 'Record created successfully.'];
            } else {
                $response = ['status' => 0, 'message' => 'Failed to create record.'];
            }
            if($response["status"]==1){
               
                echo '<script type="text/javascript">';
                echo "localStorage.setItem('access', '1')";  //not showing an alert box.
                echo '</script>';
                header("location: ../view/newlichchieu.php");
            }
            break;
            
    }
?>