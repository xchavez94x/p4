<?php 
    
    class DataBase 
    {
        protected $dsn = "mysql:host=localhost;dbname=grad_school";
        protected $user = "root";
        protected $pass = "";
        protected $conn;

        public function connectDb() {
            $this->conn = null;
            try {

                $this->conn = new PDO($this->dsn, $this->user, $this->pass);
                $this->conn->exec('set names utf8mb4');

            } catch(PDOException $ex) {
                echo "error while connecting to db ".$ex->getMessage() ;
            }
            return $this->conn;

        }
    }




?>