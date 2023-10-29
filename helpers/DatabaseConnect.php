<?php
    class DatabaseConnect{
        public function getInstance(){
            // localhost credentials

            $serverName = "localhost";
            $username = "root";
            // $password = "";
            $password = "Muthukumarloki@2930";
            $databaseName = "bus_booking";
            $conn = new mysqli($serverName, $username, $password, $databaseName);

            if(!$conn){
                die("Unable to connect to Database!");
            }
            return $conn;
        }
    }
?>