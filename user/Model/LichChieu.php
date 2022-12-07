<?php
include_once "dbConnect.php";

class LichChieu {
    public function getAllByPhim($phim)
    {
        $sql = "SELECT * 
                FROM lich_chieu join phong_chieu on lich_chieu.phong_chieuid_rap = phong_chieu.id_rap
                where Phimid_phim = $phim
                ";
        $result = (new Connect())->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    public function get($id)
    {
        $sql = "SELECT * 
                FROM lich_chieu 
                    join phim on phim.id_phim = lich_chieu.Phimid_phim
                    join phong_chieu on lich_chieu.phong_chieuid_rap = phong_chieu.id_rap
                where id_lich_chieu = $id
                ";
        $result = (new Connect())->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
}