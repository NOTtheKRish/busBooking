<?php
    $fileName = basename($_SERVER["SCRIPT_FILENAME"], '.php');
    if(in_array($fileName,['profile','seat-select-helper'])){
        require_once('./helpers/DatabaseConnect.php');
        require_once('./admin/busRoutes/BusRoute.php');
    }else{
        require_once('../../helpers/DatabaseConnect.php');
        require_once('../busRoutes/BusRoute.php');
    }
    
    class TicketBooking{
        public function fetchAll(){
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $sql = "SELECT * FROM ticket_bookings ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            
            return $result;
        }
        
        public function fetchForUser($userId){
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $sql = "SELECT * FROM ticket_bookings WHERE user_id = ? ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i',$userId);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            
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

        public function createBooking($userId,$bookingDate,$busRouteId,$selectedSeat,$passengerName,
                        $passengerAge,$passengerEmail,$passengerPhone){
            // 8 params
            $totalTickets = 0;
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $ticketId = self::generateRandomString(12);
            $selectedSeats = $selectedSeat;
            $passengerNames = explode(',', $passengerName);
            $passengerAges = explode(',', $passengerAge);
            $passengerPhones = explode(',', $passengerPhone);
            $passengerEmails = explode(',', $passengerEmail);

            $totalTickets = count($passengerNames);

            for ($i = 0; $i < $totalTickets; $i++) {
                $sql = "INSERT INTO ticket_bookings (user_id,ticket_id,booking_date,bus_route_id,seat_no,passenger_name,passenger_age,passenger_email,passenger_phone) VALUES(?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ississsss", $userId,$ticketId,$bookingDate,$busRouteId,$selectedSeats[$i],$passengerNames[$i],
                                $passengerAges[$i],$passengerEmails[$i],$passengerPhones[$i]);
                $stmt->execute();
            }

            // $busRoute = new BusRoute();
            // $availableSeats = 0;
            // $bus = $busRoute->fetchById($busRouteId);
            // if (mysqli_num_rows($bus) > 0) {
            //     while($row = mysqli_fetch_array($bus)){
            //         $availableSeats = $row['available_seats'];
            //     }
            // }
            // $availableSeats -= $totalTickets;

            // return $availableSeats;
            
            // $sql1 = "UPDATE bus_routes SET available_tickets = ? WHERE id = ?";
            // $stmt1 = $conn->prepare($sql1);
            // $stmt1->bind_param("ii", $availableSeats,$busRouteId);
            // $stmt1->execute();
            
            $response = [
                'status' => "success",
                'message' => "Ticket Booking Successful!"
            ];
            return $response;
        }
        
        public function cancelBooking($ticketBookingId){
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $sql = "UPDATE ticket_bookings SET status = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", "Cancelled",$ticketBookingId);
            $stmt->execute();
            
            $response = [
                'status' => "success",
                'message' => "Ticket Cancelled Successful!"
            ];
            return $response;
        }
    }
?>