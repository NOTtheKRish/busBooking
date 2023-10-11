<?php
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "bus_booking";
    $conn = new mysqli($serverName, $username, $password, $databaseName);

    if(!$conn){
        die("Unable to connect to Database!");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Booking System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary d-none d-md-block">
          <div class="container-fluid d-flex justify-content-evenly">
            <a class="nav-link" aria-current="page" href="/busBooking">Home</a>
            <a class="nav-link" href="our-routes.php">Our Routes</a>
            <a class="navbar-brand" href="#">
              <img src="assets/images/bus-solid.svg" alt="Bootstrap" width="30" height="24">
            </a>
            <a class="nav-link" href="user-login.php">Login</a>
            <a class="nav-link" href="company-login.php">Company Login</a>
          </div>
        </nav>
      </div>
      <nav class="navbar navbar-expand-lg bg-body-tertiary d-block d-md-none">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse text-center" id="navbarTogglerDemo01">
                <a class="nav-link mb-3" aria-current="page" href="/busBooking">Home</a>
                <a class="nav-link mb-3" href="our-routes.php">Our Routes</a>
                <a href="javascript:void(0)">
                  <img src="assets/images/bus-solid.svg" alt="Bootstrap" width="30" height="24">
                </a>
                <a class="nav-link my-3" href="user-login.php">Login</a>
                <a class="nav-link mb-3" href="company-login.php">Company Login</a>
          </div>
        </div>
      </nav>
    </div>
  </div>
      <div class="container-fluid">
        <div class="row h-100" id="background">
            <div class="detailscont col-lg-4 align-self-center">
                <div class="row">
                <div class="card shadow-lg d-flex mx-auto my-auto" style="width: 25rem;border-radius:20px!important">
                    <div class="card-body">
                        <h4 class="text-center">Welcome</h4>
                        <form action="search.php" method="get">
                          <select class="form-control form-control-lg form-select mt-3" name="from" id="fromLocations"></select>
                          <select class="form-control form-control-lg form-select mt-3" name="to" id="toLocations">
                            <option value="">To</option>
                          </select>
                          <div class="text-center mt-3">
                              <label for="journey_date"><strong>Journey Date</strong></label>
                              <input type="date" name="journey_date" class="form-control form-control-lg mt-1">
                          </div>
                          <div class="text-center mt-3">    
                            <button type="submit" class="btn btn-success">Search</button>
                          </div>
                        </form>
                    </div>
                    </div>
                    </div>
                  </div>
                  <div class="col-lg-8 d-flex mx-auto my-auto">
                    <div class="row">
                        <div class="display-3 text-dark">
                            The journey of a thousand miles begins with<br> one step.
                        </div>
                    </div>
                  </div>
                  </div>
            </div>
    <?php include_once('scripts.php'); ?>
</body>
</html>