<?php
    /**
     * Database Connection
     */
        class Connect {
            private $servername = "localhost";
            private $username = "root";
            private $password = "";
            private $dbname = "quanlybanve";

            private function getConnect()
            {
                try {
                    $conn = new PDO('mysql:host=' . $this->servername . ';dbname=' . $this->dbname, $this->username, $this->password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    return $conn;
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
                return null;
            }

            public function query($sql)
            {
                return $this->getConnect()->query($sql);
            }
        }

