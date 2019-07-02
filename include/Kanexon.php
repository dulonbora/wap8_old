<?php
    class Kanexon{
        private $conn = null;
        
        private $hostname="localhost";
        private $username="root";
        private $password="";
        public function getDb(){
                $this->conn = new PDO("mysql:host=$this->hostname;dbname=asomi",  $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("set names utf8");
                return $this->conn;
        }

}?>