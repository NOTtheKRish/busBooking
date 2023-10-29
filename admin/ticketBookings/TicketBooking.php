<?php
    $fileName = basename($_SERVER["SCRIPT_FILENAME"], '.php');
    if(in_array($fileName,['profile'])){
        require_once('./helpers/DatabaseConnect.php');
    }else{
        require_once('../../helpers/DatabaseConnect.php');
    }
    
    class TicketBooking{
        public function fetchAll(){
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $sql = "SELECT * FROM ticket_bookings ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
<<<<<<< HEAD
            $result = $stmt->get_result(); // get the mysqli result
=======
            $result = $stmt->get_result(); // get the sqlsrv result
>>>>>>> d5d5f13cddf41dfe615be77690302b9aaf2de5f7
            
            return $result;
        }
        
        public function fetchForUser($userId){
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $sql = "SELECT * FROM ticket_bookings WHERE user_id = ? ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i',$userId);
            $stmt->execute();
<<<<<<< HEAD
            $result = $stmt->get_result(); // get the mysqli result
=======
            $result = $stmt->get_result(); // get the sqlsrv result
>>>>>>> d5d5f13cddf41dfe615be77690302b9aaf2de5f7
            
            return $result;
        }

        public function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        public function createBooking($userId,$bookingDate,$busRouteId,$selectedSeats,$passengerNames,
                        $passengerAges,$passengerEmail,$passengerPhone){
            // 8 params
            $totalTickets = 0;
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $ticketId = self::generateRandomString(12);
            $sql = "INSERT INTO ticket_bookings (user_id,ticket_id,booking_date,bus_route_id,seat_no,passenger_name,passenger_age,passenger_email,passenger_phone) VALUES(?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ississsss", $userId,$ticketId,$bookingDate,$busRouteId,$selectedSeats,$passengerNames,
                            $passengerAges,$passengerEmail,$passengerPhone);
            $stmt->execute();
            
            $sql1 = "UPDATE bus_routes SET available_tickets = available_tickets - ? WHERE id = ?";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bind_param("ii", $totalTickets,$busRouteId);
            $stmt1->execute();
            
            $response = ['success' => "Ticket Booking Successful!"];
            echo json_encode($response);
        }
        
        public function cancelBooking($ticketBookingId){
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $sql = "UPDATE ticket_bookings SET status = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", "Cancelled",$ticketBookingId);
            $stmt->execute();
            
            $response = ['success' => "Ticket Booking Cancelled!"];
            echo json_encode($response);
        }
    }
?>