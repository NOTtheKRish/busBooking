<?php
    require('helpers/DatabaseConnect.php');
    
    class TicketBooking{
        public function fetchAll(){
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $sql = "SELECT * FROM ticket_bookings ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $bus = $result->fetch_assoc(); // fetch data
            
            return $bus;
        }

        public function createBooking($userId,$bookingDate,$busRouteId,$selectedSeats,$passengerNames,
                        $passengerAges,$passengerEmail,$passengerPhone){
            // 8 params
            $totalTickets = 0;
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
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