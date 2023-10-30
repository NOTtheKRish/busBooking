<?php
  require_once('./helpers/SearchHelper.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Buses</title>
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
            <a class="nav-link" aria-current="page" href="/">Home</a>
            <a class="nav-link" href="our-routes.php">Our Routes</a>
            <a class="navbar-brand" href="#">
              <img src="assets/images/bus-solid.svg" alt="Bootstrap" width="30" height="24">
            </a>
            <?php
              session_name("BusUserSession");
              session_start();
              $userLoggedIn = false;
              $companyLoggedIn = false;
              $userId = -1;
              $userType = '-1';
              if(isset($_SESSION['user_id']) && isset($_SESSION['user_type'])){
                $userId = $_SESSION['user_id'];
                $userType = $_SESSION['user_type'];
                if($userType == '0'){
                  $userLoggedIn = true;
                }
                if($userType == '1'){
                  $companyLoggedIn = true;
                }
              }
            ?>
            <?php
              if($userLoggedIn){
            ?>
                <a class="nav-link" href="profile.php">Profile</a>
            <?php
              }else{
            ?>
            <a class="nav-link" href="user-login.php">Login</a>
            <?php
              }
            ?>
            <?php
              if($companyLoggedIn){
            ?>
                <a class="nav-link" href="company-login.php">Dashboard</a>
            <?php
              }else{
            ?>
                <a class="nav-link" href="company-login.php">Company Login</a>
            <?php
              }
              if($userLoggedIn || $companyLoggedIn){
            ?>
                <a class="nav-link" href="logout.php" id="logoutUser">Logout</a>
            <?php
              }
            ?>
          </div>
        </nav>
      </div>
      <nav class="navbar navbar-expand-lg bg-body-tertiary d-block d-md-none">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse text-center" id="navbarTogglerDemo01">
                <a class="nav-link mb-3" aria-current="page" href="/">Home</a>
                <a class="nav-link mb-3" href="our-routes.php">Our Routes</a>
                <a href="javascript:void(0)">
                  <img src="assets/images/bus-solid.svg" alt="Bootstrap" width="30" height="24">
                </a>
                <?php
              if($userLoggedIn){
            ?>
                <a class="nav-link" href="profile.php">Profile</a>
            <?php
              }else{
            ?>
            <a class="nav-link" href="user-login.php">Login</a>
            <?php
              }
            ?>
            <?php
              if($companyLoggedIn){
            ?>
                <a class="nav-link" href="company-login.php">Dashboard</a>
            <?php
              }else{
            ?>
                <a class="nav-link" href="company-login.php">Company Login</a>
            <?php
              }
              if($userLoggedIn || $companyLoggedIn){
            ?>
                <a class="nav-link" href="logout.php" id="logoutUser">Logout</a>
            <?php
              }
            ?>
          </div>
        </div>
      </nav>
    </div>
    </div>
    </div>
      <div class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-3 mb-4">
          <?php
            $searchHelper = new SearchHelper($_GET['from'],$_GET['to'],$_GET['journey_date']);
          ?>
          <h1 class="text-body-emphasis">Showing Buses from <?php echo $searchHelper->fetchFromLocation(); ?> - <?php echo $searchHelper->fetchToLocation(); ?> </h1>
          <p class="lead">
            Journey Date :  <?php echo $searchHelper->fetchJourneyDate(); ?>
          </p>
        </div>
      </div>
      <div class="container my-5">
        <div class="row">
          <?php
            $availableBuses = $searchHelper->fetchBuses();
            if (mysqli_num_rows($availableBuses) > 0) {
                while($row = mysqli_fetch_array($availableBuses)){
          ?>
          <div class="col-sm-12 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="row d-flex">
                  <div class="col-sm-2 mb-3 mb-lg-0">
                    <h5 class="card-title"><?php echo $row['bus_name']; ?></h5>
                    <p class="card-text"><?php echo $row['bus_type']; ?></p>
                  </div>
                  <div class="col-sm-2 mb-3 mb-lg-0">
                    <h5 class="card-title">Departure</h5>
                    <p class="card-text"><strong><?php echo $row['boarding_time']; ?></strong></p>
                    <p class="card-text"><?php echo $row['boarding_point']; ?></p>
                  </div>
                  <div class="col-sm-2 mb-3 mb-lg-0">
                    <h5 class="card-title">Duration</h5>
                    <p class="card-text"><?php echo $row['duration']; ?></p>
                  </div>
                  <div class="col-sm-2 mb-3 mb-lg-0">
                    <h5 class="card-title">Arrival</h5>
                    <p class="card-text"><strong><?php echo $row['dropping_time']; ?></strong></p>
                    <p class="card-text"><?php echo $row['dropping_point']; ?></p>
                  </div>
                  <div class="col-sm-2 mb-3 mb-lg-0">
                    <h5 class="card-title">Fare</h5>
                    <p class="card-text"><strong>INR <?php echo $row['fare']; ?></strong></p>
                  </div>
                  <hr class="d-block d-lg-none">
                  <div class="col-sm-2">
                    <h5 class="card-title">Seats Available</h5>
                    <p class="card-text"><strong><?php echo $row['available_seats'] ?></strong> Seats Available</p>
                    <a href="select-seat.php?bus_route_id=<?php echo $row['id']; ?>&from_location=<?php echo $searchHelper->fetchFromLocation(); ?>&to_location=<?php echo $searchHelper->fetchToLocation(); ?>&journey_date=<?php echo $_GET['journey_date']; ?>" class="btn btn-primary">View Seats</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
                }
              }else{
          ?>
          <div class="col-sm-12 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="row d-flex justify-content-center p-3">
                  <div class="col-sm-2 mb-3 mb-lg-0">
                    <h5 class="card-title">No Buses Available!</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
              }
          ?>
        </div>
      </div>
      <?php include_once('scripts.php'); ?>
</body>
</html>