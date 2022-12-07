<?php
    class Categories {
        public function all()
        {
            include_once "dbConnect.php";
            $sql = "SELECT DISTINCT the_loai from phim";
            $result = (new Connect())->query($sql);
            return $result->fetchAll(PDO::FETCH_COLUMN);
        }
        public function get($theLoai)
        {
            include_once "dbConnect.php";
            $sql = "SELECT * from phim where the_loai = '$theLoai'";
            $result = (new Connect())->query($sql);
            return $result->fetchAll(PDO::FETCH_OBJ);
        }
    }