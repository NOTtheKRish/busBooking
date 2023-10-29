<?php
    $fileName = basename($_SERVER["SCRIPT_FILENAME"], '.php');
    if(in_array($fileName,['profile'])){
        require_once('./helpers/DatabaseConnect.php');
    }else{
        require_once('../../helpers/DatabaseConnect.php');
    }
    
    class BusRoute{
        public function fetchAll(){
            // PHP prepared statement
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $sql = "SELECT * FROM bus_routes ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result

            return $result;
        }
        
        public function fetchById($busRouteId){
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $sql = "SELECT * FROM bus_routes WHERE id = ? LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i',$busRouteId);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
    
            return $result;
        }

        public function createRoute($userId,$fromLocation,$toLocation,$busName,$busType,$duration,$boardingPoint,
        $boardingTime,$droppingPoint,$droppingTime,$fare,$totalSeats){
            // 13 params
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $sql = "INSERT INTO bus_routes (user_id,from_location,to_location,bus_name,bus_type,duration,boarding_point,boarding_time,dropping_point,dropping_time,fare,total_seats,available_seats) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isssssssssiii", $userId,$fromLocation,$toLocation,$busName,$busType,$duration,
            $boardingPoint,$boardingTime,$droppingPoint,$droppingTime,$fare,$totalSeats,$totalSeats);
            $stmt->execute();
            
            $response = [
                'status' => "success",
                'message' => "Bus Route Created!"
            ];
            return $response;
        }

        public function updateRoute($routeId,$fromLocation,$toLocation,$busName,$busType,$duration,$boardingPoint,
        $boardingTime,$droppingPoint,$droppingTime,$fare,$totalSeats){
            // 13 params
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $sql = "UPDATE bus_routes SET from_location = ?,to_location = ?,bus_name = ?,bus_type = ?,duration = ?,boarding_point = ?,boarding_time = ?,dropping_point = ?,dropping_time = ?,fare = ?,total_seats = ?,available_seats = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssssiiii",$fromLocation,$toLocation,$busName,$busType,$duration,
            $boardingPoint,$boardingTime,$droppingPoint,$droppingTime,$fare,$totalSeats,$totalSeats,$routeId);
            $stmt->execute();
            
            $response = [
                'status' => "success",
                'message' => "Bus Route Updated!"
            ];
            return $response;
        }
        
        public function deleteRoute($routeId){
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $sql = "DELETE FROM bus_routes WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i",$routeId);
            $stmt->execute();
            
            $response = [
                'status' => "success",
                'message' => "Bus Route Deleted!"
            ];
            return $response;
        }
    }
?>