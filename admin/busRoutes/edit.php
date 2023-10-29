<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

    require_once('../session.php');
    require_once('BusRoute.php');

    if(isset($_SESSION['user_id'])){
        $userId = $_SESSION['user_id'];
    }

    $busRouteId = $_GET['bus_route_id'];
    $fromLocation = "Chennai";
    $toLocation = "Coimbatore";
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Edit Bus Route <?php echo $busRouteId; ?> - Bus Booking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
      .hidden{
        display: none!important;
        }
    </style>
  </head>
  <body> 
<main>
  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
        <div class="d-flex align-items-center justify-content-between text-body-emphasis text-decoration-none">
            <div class="">
                <a href="../dashboard.php" class="text-body-emphasis text-decoration-none">
                    <img src="../../assets/images/bus-solid.svg" alt="Bootstrap" width="30" height="24">
                </a>
            </div>
            <div class="">
                <a class="text-dark text-decoration-none me-3" href="../dashboard.php">Home</a>
                <a class="text-dark text-decoration-none" href="../../logout.php">Logout</a>
            </div>
        </div>
    </header>

    <div class="p-3 mb-4 bg-body-tertiary rounded-5">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Edit Bus Route <?php echo $busRouteId; ?></h1>
      </div>
    </div>

    <div class="p-3 mb-4 bg-body-tertiary rounded-5">
      <div class="container-fluid py-5">
        <?php
            $busRoute = new BusRoute();
            $bus = $busRoute->fetchById($busRouteId);
            // print_r($bus);
            if (sqlsrv_num_rows($bus) > 0) {
                while($row = sqlsrv_fetch_array($bus, SQLSRV_FETCH_ASSOC)){
                    $fromLocation = $row['from_location'];
                    $toLocation = $row['to_location'];
        ?>
        <div class="h-100 p-2 body-bg-tertiary rounded-5">
            <div class="form-row d-flex justify-content-evenly">
                <div class="form-group col-md-5">
                    <div class="mb-3">
                        <label for="busName" class="form-label">Bus Name</label>
                        <input type="hidden" id="busRouteId" value="<?php echo $row['id']; ?>">
                        <input type="text" class="form-control" id="busName" value="<?php echo $row['bus_name']; ?>">
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <div class="mb-3">
                        <label for="busType" class="form-label">Bus Type</label>
                        <input type="text" class="form-control" id="busType" value="<?php echo $row['bus_type']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-row d-flex justify-content-evenly">
                <div class="form-group col-md-3">
                    <div class="mb-3">
                        <label for="fromLocations" class="form-label">From</label>
                        <select class="form-control form-select" name="fromLocations" id="fromLocations"></select>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="mb-3">
                        <label for="boardingPoint" class="form-label">Boarding Point</label>
                        <input type="text" class="form-control" id="boardingPoint" value="<?php echo $row['boarding_point']; ?>">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="mb-3">
                        <label for="boardingTime" class="form-label">Boarding Time</label>
                        <input type="time" class="form-control" id="boardingTime" value="<?php echo $row['boarding_time']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-row d-flex justify-content-evenly">
                <div class="form-group col-md-3">
                    <div class="mb-3">
                        <label for="toLocations" class="form-label">To</label>
                        <select class="form-control form-select" name="toLocations" id="toLocations"></select>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="mb-3">
                        <label for="droppingPoint" class="form-label">Dropping Point</label>
                        <input type="text" class="form-control" id="droppingPoint" value="<?php echo $row['dropping_point']; ?>">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="mb-3">
                        <label for="droppingTime" class="form-label">Dropping Time</label>
                        <input type="time" class="form-control" id="droppingTime" value="<?php echo $row['dropping_time']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-row d-flex justify-content-evenly">
                <div class="form-group col-md-3">
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" class="form-control" placeholder="eg: 9h 55m" id="duration" value="<?php echo $row['duration']; ?>">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="mb-3">
                        <label for="fare" class="form-label">Fare</label>
                        <input type="number" step="0.1" class="form-control" id="fare" value="<?php echo $row['fare']; ?>">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="mb-3">
                        <label for="totalSeats" class="form-label">Total Seats</label>
                        <input type="number" class="form-control" id="totalSeats" value="<?php echo $row['total_seats']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-row text-center mt-5">
                <div class="form-group">
                    <div class="mb-3">
                        <button class="btn btn-success d-flex mx-auto disabled hidden" id="initCreate">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="visually-hidden">Updating...</span>
                        </button>
                        <button class="btn btn-success d-flex mx-auto" name="create" id="create">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <?php 
                }
            }
        ?>
    </div>
    </div>
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    var from = "<?php echo $fromLocation; ?>";
    var to = "<?php echo $toLocation; ?>"
    var cities = [
    "Coimbatore","Chennai","Trichy","Madurai","Salem","Erode","Vellore","Thanjavur",
    "Kancheepuram","Kumbakonam","Ambur","Bengaluru","Mangaluru","Shivamogga","Tumakuru",
    "Kalaburagi","Ballari","Udupi","Dharwad","Karwar","Madikeri","Mysore",
    ];
    cities.sort()

    $.each(cities, function(key, value) {   
        $('#fromLocations').append($("<option></option>")
                        .attr("value", value)
                        .text(value));
    });
    $('#fromLocations').val(from)
    var filteredArr = cities.filter( n => n != from)
    $('#toLocations').empty()
    $.each(filteredArr, function(key, value) {   
        $('#toLocations').append($("<option></option>")
                        .attr("value", value)
                        .text(value));
    });
    $('#toLocations').val(to)

    $('#fromLocations').on('change',function(){
        $('#toLocations').empty()
            var selected = $('#fromLocations').find(":selected").text();
            var filteredArr = cities.filter( n => n != selected)
            $.each(filteredArr, function(key, value) {   
            $('#toLocations').append($("<option></option>")
                                .attr("value", value)
                                .text(value));
        });
    });

    $('body').on('click','#create',function(e){
        e.preventDefault();
        var routeId = $('#busRouteId').val();
        var busName = $('#busName').val();
        var busType = $('#busType').val();
        var fromLocation = $('#fromLocations option:selected').val();
        var boardingPoint = $('#boardingPoint').val();
        var boardingTime = $('#boardingTime').val();
        var toLocation = $('#toLocations option:selected').val();
        var droppingPoint = $('#droppingPoint').val();
        var droppingTime = $('#droppingTime').val();
        var duration = $('#duration').val();
        var fare = $('#fare').val();
        var totalSeats = $('#totalSeats').val();

        var data = {
            methodName: "update",
            routeId: routeId,
            busName: busName,
            busType: busType,
            fromLocation: fromLocation,
            boardingPoint: boardingPoint,
            boardingTime: boardingTime,
            toLocation: toLocation,
            droppingPoint: droppingPoint,
            droppingTime: droppingTime,
            duration: duration,
            fare: fare,
            totalSeats: totalSeats,
        };
        console.log(data);

        $('#initCreate').removeClass('hidden');
        $('#create').addClass('hidden');
        $.ajax({
            url:'bus-route-helper.php',
            type:'post',
            dataType:'json',
            data:data,
            success:function(msg){
                $('#initCreate').addClass('hidden');
                $('#create').removeClass('hidden');
                setTimeout(function(){
                    if(msg.status == "error"){
                        swal({
                            icon: "error",
                            title: msg.message,
                        });
                    }else if(msg.status == "success"){
                        swal({
                            icon: "success",
                            title: msg.message,
                            buttons: {
                                confirm: "Close",
                            }
                        }).then(function(){
                            window.location.href = "index.php";
                        });
                    }
                },600);
            }
        });
    });
</script>
</body>
</html>
