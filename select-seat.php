<?php
    require_once('session.php');
    require_once('./admin/busRoutes/BusRoute.php');
    $busRouteId = $_GET['bus_route_id'];
    $userId = $_SESSION['user_id'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Your Seat</title>
    <link rel="stylesheet" href="assets/css/seatselect.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid d-flex">
        <div class="row">
            <div class="col-lg-3 leftdash">
                <div class="row">
                    <div class="h3 text-white mt-3">Select Your Seats</div>
                    <span id="selectseatheading"></span>
                    <div class="col-lg-12">
                        <div class="form-group mt-5 text-light">
                            <span class="mx-3">From : <?php echo $_GET['from_location']; ?></span>
                        </div>
                    </div>
                    <div class="form-group mt-2 text-light">
                        <span class="mx-3">To : <?php echo $_GET['to_location']; ?></span>
                    </div>
                    <div class="form-group mt-2 text-light">
                        <span class="mx-3">Journey Date : <?php echo $_GET['journey_date']; ?></span>
                    </div>
                    <?php
                        $busRoute = new BusRoute();
                        $bus = $busRoute->fetchById($busRouteId);
                        if (mysqli_num_rows($bus) > 0) {
                            while($row = mysqli_fetch_array($bus)){
                    ?>
                    <div class="form-group mt-3 text-light">
                        <input type="hidden" id="userId" value="<?php echo $userId; ?>">
                        <input type="hidden" id="busRouteId" value="<?php echo $row['id']; ?>">
                        <input type="hidden" id="bookingDate" value="<?php echo $_GET['journey_date']; ?>">
                        <span class="mx-3">Bus Name : <?php echo $row['bus_name']; ?></span>
                    </div>
                    <div class="form-group mt-2 text-light">
                        <span class="mx-3">Bus Type : <?php echo $row['bus_type']; ?></span>
                    </div>
                    <div class="form-group mt-2 text-light">
                        <span class="mx-3">Fare : INR <?php echo $row['fare']; ?></span>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-9 maindash bg-dark">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 bookingbus">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img src="assets/images/steering.png" class="d-flex ms-auto mt-3" alt="steering" id="steering">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row mt-3 me-3">
                                            <div class="col-lg-6">
                                                <input type="checkbox" class="btn-check" id="seat_A1" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_A1">A1</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="checkbox" class="btn-check" id="seat_A2" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_A2">A2</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_B1" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_B1">B1</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_B2" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_B2">B2</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_C1" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_C1">C1</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_C2" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_C2">C2</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_D1" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_D1">D1</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_D2" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_D2">D2</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_E1" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_E1">E1</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_E2" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_E2">E2</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_F1" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_F1">F1</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_F2" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_F2">F2</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_G1" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_G1">G1</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_G2" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_G2">G2</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mt-3 ms-4">
                                            <div class="col-lg-6">
                                                <input type="checkbox" class="btn-check" id="seat_A3" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_A3">A3</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="checkbox" class="btn-check" id="seat_A4" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_A4">A4</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_B3" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_B3">B3</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_B4" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_B4">B4</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_C3" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_C3">C3</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_C4" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_C4">C4</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_D3" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_D3">D3</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_D4" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_D4">D4</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_E3" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_E3">E3</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_E4" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_E4">E4</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_F3" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_F3">F3</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_F4" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_F4">F4</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_G3" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_G3">G3</label>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <input type="checkbox" class="btn-check" id="seat_G4" autocomplete="off">
                                                <label class="btn btn-outline-dark" for="seat_G4">G4</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 ms-1">
                                        <div class="col-lg-3">
                                            <input type="checkbox" class="btn-check" id="seat_H1" autocomplete="off">
                                            <label class="btn btn-outline-dark" for="seat_H1">H1</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="checkbox" class="btn-check" id="seat_H2" autocomplete="off">
                                            <label class="btn btn-outline-dark" for="seat_H2">H2</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="checkbox" class="btn-check" id="seat_H3" autocomplete="off">
                                            <label class="btn btn-outline-dark" for="seat_H3">H3</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="checkbox" class="btn-check" id="seat_H4" autocomplete="off">
                                            <label class="btn btn-outline-dark" for="seat_H4">H4</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 passengerDetails">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>Passenger Details</h6>
                                    <div id="passengerDetails">
                                    </div>
                                </div>
                            </div>
                            <div class="row text-light mt-3">
                                <div class="col-lg-12">
                                    <h6>Payment Method</h6>
                                    <div class="mt-3" id="paymentMethods">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paymentMethod" value="CC" id="ccPayment">
                                            <label class="form-check-label" for="ccPayment">
                                                Credit Card
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paymentMethod" value="DC" id="dcPayment">
                                            <label class="form-check-label" for="dcPayment">
                                                Debit Card
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paymentMethod" value="NB" id="nbPayment">
                                            <label class="form-check-label" for="nbPayment">
                                                Netbanking
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paymentMethod" value="UPI" id="upiPayment">
                                            <label class="form-check-label" for="upiPayment">
                                                UPI
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-outline-light" id="makePayment">Make Payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once('scripts.php'); ?>
    <script type="text/javascript">
        var selectedSeats = [];
        $(document).on('click', '[id^="seat_"]', function(){
            var realId = $(this).attr('id');
            var id = realId.replace('seat_','');
            console.log("Seat Selected :"+id);
            var isSelected = $('#'+realId).is(":checked");

            console.log("Seat Data : "+isSelected);
            var htmlRows = '';
            htmlRows += '<div class="col-lg-12 mt-3" id="'+id+'"><div class="card"><div class="card-body"><div class="form-group row col-lg-12"><div class="col-lg-12"><div class="mb-3">';
            htmlRows += '<label for="seatNo">Seat No : '+id+'</label><input type="hidden" name="seatNo[]" value="'+id+'">';
            htmlRows += '</div></div></div><div class="form-group row col-lg-12"><div class="col-lg-6"><div class="mb-3"><label for="passengerName" class="form-label">Passenger Name</label>';
            htmlRows += '<input type="text" class="form-control" name="passengerName[]" id="passengerName"></div></div><div class="col-lg-6"><div class="mb-3"><label for="passengerAge" class="form-label">Passenger Age</label><input type="number" class="form-control" name="passengerAge[]" id="passengerAge">';
            htmlRows += '</div></div></div><div class="form-group row col-lg-12"><div class="col-lg-6"><div class="mb-3"><label for="passengerPhone" class="form-label">Passenger Phone</label><input type="text" class="form-control" name="passengerPhone[]" id="passengerPhone"></div></div>';
            htmlRows += '<div class="col-lg-6"><div class="mb-3"><label for="passengerEmail" class="form-label">Passenger E-Mail</label><input type="email" class="form-control" name="passengerEmail[]" id="passengerEmail"></div></div></div></div></div></div>';

            if(isSelected){
                $('#passengerDetails').append(htmlRows);
                selectedSeats.push(id);
            }else{
                $('#'+id).remove();
                selectedSeats = selectedSeats.filter(item => item !== id)
            }
            console.log("Selected Seats : "+selectedSeats)
        });

        $(document).on('click', '#makePayment', function(){
            if(selectedSeats.length == 0){
                swal({
                    icon: "error",
                    title: "Select atleast 1 Seat to proceed Booking!",
                });
            }else{
                var userId = $('#userId').val();
                var busRouteId = $('#busRouteId').val();
                var bookingDate = $('#bookingDate').val();
                var paymentMethod = $('[name="paymentMethod"]:checked').val();
                if(paymentMethod == undefined){
                    swal({
                        icon: "error",
                        title: "Select a Payment Method!",
                    });
                }else{
                    var passengerName = $("input[name='passengerName[]']").map(function(){
                        return $(this).val();
                    }).get().join(",");
                    var passengerAge = $("input[name='passengerAge[]']").map(function(){
                        return $(this).val();
                    }).get().join(",");
                    var passengerPhone = $("input[name='passengerPhone[]']").map(function(){
                        return $(this).val();
                    }).get().join(",");
                    var passengerEmail = $("input[name='passengerEmail[]']").map(function(){
                        return $(this).val();
                    }).get().join(",");
                    var data = {
                        userId : userId,
                        bookingDate: bookingDate,
                        busRouteId: busRouteId,
                        selectedSeat: selectedSeats,
                        passengerName: passengerName,
                        passengerAge: passengerAge,
                        passengerPhone: passengerPhone,
                        passengerEmail: passengerEmail,
                        paymentMethod: paymentMethod,
                    };
                    console.log(data);
                    $.ajax({
                        url:'seat-select-helper.php',
                        type:'post',
                        dataType:'json',
                        data: data,
                        success:function(msg){
                            console.log(msg);
                            setTimeout(function(){
                                if(msg.status == "error"){
                                    swal({
                                        icon: "error",
                                        title: msg.message,
                                    });
                                }else if(msg.status == "success"){
                                    swal({
                                        icon: "success",
                                        title: "Payment Successful!",
                                        text: msg.message,
                                        buttons: {
                                            confirm: "Close",
                                        }
                                    }).then(function(){
                                        window.location.href = "profile.php";
                                    });
                                }
                            },600);
                        }
                    });
                }
            }
        });
    </script>
</body>
</html>