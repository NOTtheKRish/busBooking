<?php
    class DatabaseConnect{
        public function getInstance(){
            // localhost credentials

            // $serverName = "localhost";
            // $username = "root";
            // $password = "";
            // $databaseName = "bus_booking";
            // $conn = new sqlsrv($serverName, $username, $password, $databaseName);

            // if(!$conn){
            //     die("Unable to connect to Database!");
            // }
            // return $conn;

            // MS Azure Credentials
            try {
                $conn = new PDO("sqlsrv:server = tcp:buscredentials.database.windows.net,1433; Database = Busdetails", "logesh", "Muthukumarloki@2930");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                print("Error connecting to SQL Server.");
                die(print_r($e));
            }
            $connectionInfo = array("UID" => "logesh", "pwd" => "Muthukumarloki@2930", "Database" => "Busdetails", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
            $serverName = "tcp:buscredentials.database.windows.net,1433";
            $conn = sqlsrv_connect($serverName, $connectionInfo);

            return $conn;
        }
    }
?>