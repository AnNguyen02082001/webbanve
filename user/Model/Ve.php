<?php
include_once "dbConnect.php";

class Ve {
    public function getSoGheByLich($lich)
    {
        $sql = "SELECT so_ghe from ve where id_lich_chieu = '$lich'";
        $result = (new Connect())->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAllByUser($user)
    {
        $sql = "SELECT *, ve.so_ghe from ve 
         join lich_chieu on ve.id_lich_chieu = lich_chieu.id_lich_chieu
         join phim on phim.id_phim = lich_chieu.Phimid_phim
         join phong_chieu on phong_chieu.id_rap = lich_chieu.phong_chieuid_rap
         where id_user = '$user' order by id desc";
        $result = (new Connect())->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($idUser, $idLichChieu, $soGhe)
    {
        $sql = "INSERT INTO ve (id_user, id_lich_chieu, so_ghe) VALUES ('$idUser', '$idLichChieu', '$soGhe')";
        (new Connect())->query($sql);
    }
}