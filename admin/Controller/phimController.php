<?php
    include '../utils/dbConnect.php';

    $method = $_SERVER['REQUEST_METHOD'];
   
    switch ($method) {
        
        case "POST":
            $phim = $_POST;
            $img = $_FILES;
            $sql = "INSERT INTO phim(ten,img, the_loai, Dien_vien, ngon_ngu, thoi_gian, gia_ve) VALUES( :ten, :img, :the_loai, :Dien_vien, :ngon_ngu, :thoi_gian, :gia_ve)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ten', $phim["text_ten"]);
            $stmt->bindParam(':img', $img["text_img"]["name"]);
            $stmt->bindParam(':the_loai', $phim["text_theloai"]);
            $stmt->bindParam(':Dien_vien', $phim["text_dienvien"]);
            $stmt->bindParam(':ngon_ngu', $phim["text_ngonngu"]);
            $stmt->bindParam(':thoi_gian', $phim["thoi_gian"]);
            $stmt->bindParam(':gia_ve', $phim["text_giave"]);
    
            if ($stmt->execute()) {
                $response = ['status' => 1, 'message' => 'Record created successfully.'];
            } else {
                $response = ['status' => 0, 'message' => 'Failed to create record.'];
            }
            if($response['status']==1){
                
                echo '<script type="text/javascript">';
                echo 'alert("thêm thành công")';
                echo "localStorage.setItem('access', '1')";  //not showing an alert box.
                echo '</script>';
                header("location:../view/newphim.php");
            }
            break;
    }
?>