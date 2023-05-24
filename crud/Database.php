<?php
    class Database {
        public $conn;

        public function __construct($servername, $username, $password, $database) {
            $this->conn = new mysqli($servername, $username, $password, $database);

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        public function get_popular() {

            $sql = "SELECT * FROM popular";

            $result = $this->conn->query($sql);

            return $result;
        }

        public function closeConn() {
            $this->conn->close();
        }
    }
    
?>
