<?php
    require('BusRoute.php');

    if(isset($_POST['methodName'])){
        $busRoute = new BusRoute();
        $methodName = $_POST['methodName'];

        if($methodName == "create"){
            $create = $busRoute->createRoute(
                $_POST['userId'],
                $_POST['fromLocation'],
                $_POST['toLocation'],
                $_POST['busName'],
                $_POST['busType'],
                $_POST['journeyDate'],
                $_POST['duration'],
                $_POST['boardingPoint'],
                $_POST['boardingTime'],
                $_POST['droppingPoint'],
                $_POST['droppingTime'],
                $_POST['fare'],
                $_POST['totalSeats'],
            );
            echo json_encode($create);
        }

        if($methodName == "update"){
            $create = $busRoute->updateRoute(
                $_POST['routeId'],
                $_POST['fromLocation'],
                $_POST['toLocation'],
                $_POST['busName'],
                $_POST['busType'],
                $_POST['journeyDate'],
                $_POST['duration'],
                $_POST['boardingPoint'],
                $_POST['boardingTime'],
                $_POST['droppingPoint'],
                $_POST['droppingTime'],
                $_POST['fare'],
                $_POST['totalSeats'],
            );
            echo json_encode($create);
        }

        if($methodName == "delete"){
            $delete = $busRoute->deleteRoute($_POST['routeId']);

            echo json_encode($delete);
        }
    }
?>