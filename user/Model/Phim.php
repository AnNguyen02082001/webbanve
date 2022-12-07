<?php
class Phim {
    public function all()
    {
        include_once "dbConnect.php";
        $sql = "SELECT * from phim order by rand()";
        $result = (new Connect())->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function get($id)
    {
        include_once "dbConnect.php";
        $sql = "SELECT * from phim where id_phim = $id";
        $result = (new Connect())->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAllByName($name)
    {
        include_once "dbConnect.php";
        $sql = "SELECT * from phim where ten like '%$name%'";
        $result = (new Connect())->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
}