<?php 
    class Database {
        private $host = 'localhost';
        private $db_name = 'bwe_test_case_address';
        private $username = 'root';
        private $password = '654321';
        private $conn;

        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name};password={$this->password}", $this->username); 
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $error_message = 'Database Error: ';
                $error_message .= $e->getMessage();
                echo $error_message;
                include('view/error.php')
                exit('Unable to connect to the database');
            }
            return $this->conn;
        }
    }

