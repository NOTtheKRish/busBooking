<?php
    class DatabaseConnect{
        public function getInstance(){
            $serverName = "localhost";
            $username = "root";
            $password = "";
            $databaseName = "bus_booking";
            $conn = new mysqli($serverName, $username, $password, $databaseName);

            if(!$conn){
                die("Unable to connect to Database!");
            }
            return $conn;
        }
    }
?>