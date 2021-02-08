<?php 

    class Admin {
        private $tableName = "contacts";
        private $tableName2 = "members";
        private $connection;

        public function __construct($conn) {
            $this->connection = $conn;
        }

        public function sendContactData($name,$email,$message) {

            $name = htmlspecialchars(strip_tags($name));
            $email = htmlspecialchars(strip_tags($email));
            $message = htmlspecialchars(strip_tags($message));

            $query = "INSERT {$this->tableName} (name,email,message) VALUES (:name,:email,:message)";

            $result = $this->connection->prepare($query);
            $result->bindParam(':name',$name,PDO::PARAM_STR);
            $result->bindParam(':email',$email,PDO::PARAM_STR);
            $result->bindParam(':message',$message,PDO::PARAM_STR);

            if($result->execute()) {
                return true;
            }
            return false;
        }

        public function read($id=null,$table) {
            $query = "SELECT * FROM {$table}" ;
            if(!empty($id)) {
                $query .= " WHERE id=:id";
            }

            $result = $this->connection->prepare($query);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
            return $result->fetchAll();
            

        }

        public function search($search) {
            $text = htmlspecialchars(strip_tags($search));

            $query = "SELECT * FROM {$this->tableName} WHERE name=:search OR email=:search";

            $res = $this->connection->prepare($query);
            $res->bindParam(':search',$search,PDO::PARAM_STR);
            $res->bindParam(':email',$search,PDO::PARAM_STR);
            $res->execute();

            return $res->fetchAll();

        }

        public function register($name,$email,$phone) 
        {
            $query = "INSERT INTO {$this->tableName2} (name,email,phone_number) VALUES (:name,:email,:phone_number)";

            $res = $this->connection->prepare($query);

            $res->bindParam(':name',$name,PDO::PARAM_STR);
            $res->bindParam(':email',$email,PDO::PARAM_STR);
            $res->bindParam(':phone_number',$phone,PDO::PARAM_STR);

            if($res->execute()) 
            {
                return true;
            }

            return false;

        }
    }



?>