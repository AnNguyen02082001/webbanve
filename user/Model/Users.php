<?php
include_once "dbConnect.php";
    class Users {
        public function get($id)
        {
            $sql = "SELECT * from user where id = $id limit 1";
            $result = (new Connect())->query($sql);
            return $result->fetchAll(PDO::FETCH_OBJ);
        }
        public function getByEmail($email)
        {
            $sql = "SELECT * from user where email = '$email' limit 1";
            $result = (new Connect())->query($sql);
            return $result->fetchAll(PDO::FETCH_OBJ);
        }

        public function getByPhone($phone)
        {
            $sql = "SELECT * from user where phone = '$phone' limit 1";
            $result = (new Connect())->query($sql);
            return $result->fetchAll(PDO::FETCH_OBJ);
        }
        public function getByEmailNotUser($email, $id)
        {
            $sql = "SELECT * from user where email = '$email' and id <> $id limit 1";
            $result = (new Connect())->query($sql);
            return $result->fetchAll(PDO::FETCH_OBJ);
        }

        public function getByPhoneNotUser($phone, $id)
        {
            $sql = "SELECT * from user where phone = '$phone' and id <> $id limit 1";
            $result = (new Connect())->query($sql);
            return $result->fetchAll(PDO::FETCH_OBJ);
        }

        public function create($name, $email, $phone, $birthday, $address, $password)
        {
            $sql = "INSERT INTO user (name, email, phone, birthdate, address, password) 
                    VALUES( '$name', '$email', '$phone', '$birthday', '$address', '$password')";
            (new Connect())->query($sql);
        }

        public function update($id, $name, $email, $phone, $birthday, $address)
        {
            $sql = "UPDATE user 
                SET name = '$name', email = '$email', phone = $phone, birthdate = '$birthday', address = '$address' 
                where id = $id";
            (new Connect())->query($sql);
        }
    }