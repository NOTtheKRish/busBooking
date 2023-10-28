<?php
    require('../session.php');
    require_once('BusRoute.php');
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Bus Routes - Bus Booking System</title>
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
    </style>

    
  </head>
  <body> 
<main>
  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
        <div class="d-flex align-items-center justify-content-between text-body-emphasis text-decoration-none">
            <div class="">
                <a href="dashboard.php" class="text-body-emphasis text-decoration-none">
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
        <h1 class="display-5 fw-bold">Bus Routes</h1>
        <p class="col-md-8 fs-4">Manage and view all Bus Routes of Bus Management System</p>
      </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-12">
        <div class="h-100 p-4 text-bg-dark rounded-5">
        <table class="table table-dark table-striped table-hover">
            <thead>
                <td>Route ID</td>
                <td>Bus Name</td>
                <td>Bus Type</td>
                <td>From</td>
                <td>To</td>
                <td>Fare</td>
                <td>Available Seats</td>
                <td>Actions</td>
            </thead>
            <tbody>
                <?php
                    $busRoute = new BusRoute();
                    $fetchAll = $busRoute->fetchAll();
                    if (mysqli_num_rows($fetchAll) > 0) {
                        while($row = mysqli_fetch_array($fetchAll)){
                ?>
                <tr class="align-items-end">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['bus_name']; ?></td>
                    <td><?php echo $row['bus_type']; ?></td>
                    <td><?php echo $row['from_location']; ?></td>
                    <td><?php echo $row['to_location']; ?></td>
                    <td>INR <?php echo $row['fare']; ?></td>
                    <td><?php echo $row['available_seats']; ?>/<?php echo $row['total_seats']; ?></td>
                    <td>
                        <a class="btn btn-outline-light me-2" href="edit.php">Edit</a>
                        <a class="btn btn-outline-light" href="javascript:void(0)" onclick="deleteBusRoute(<?php echo $row['id']; ?>);">Delete</a>
                    </td>
                </tr>
                <?php
                        }
                    }else{
                ?>
                    <tr class="align-items-end">
                        No Bus Routes Found!
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    function deleteBusRoute(id){
        swal({
            icon: "info",
            title: "Delete Bus Route "+id,
            message: "Are you Sure to delete?",
            buttons: {
                confirm: {
                    text: "Delete",
                    value: "delete",
                },
                cancel: true,
            }
        }).then((value) => {
            console.log(value);
            if(value == "delete"){
                $.ajax({
                    url:'bus-route-helper.php',
                    type:'post',
                    dataType:'json',
                    data:{
                        methodName: "delete",
                        routeId: id,
                    },
                    success:function(msg){
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
            }
        });
    }
</script>
</body>
</html>
