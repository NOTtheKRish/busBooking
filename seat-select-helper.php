<?php
    require_once('admin/ticketBookings/TicketBooking.php');

    $ticketBooking = new TicketBooking();
    if(isset($_POST['busRouteId'])){
        $newTicket = $ticketBooking->createBooking(
            $_POST['userId'],
            $_POST['bookingDate'],
            $_POST['busRouteId'],
            $_POST['selectedSeat'],
            $_POST['passengerName'],
            $_POST['passengerAge'],
            $_POST['passengerEmail'],
            $_POST['passengerPhone'],
        );
    
        echo json_encode($newTicket);
    }
?>