<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Registration</title>
    <link rel="stylesheet" href="assets/css/bus_registration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="col-lg-12 main-div d-flex justify-content-center align-items-center">
            <div class="registration-div mx-auto">
                <div class="row">
                    <div class="h4 col-lg-12 text-center mt-3">
                        Bus Company Registration
                    </div>
                    <div class="col-lg-12 mt-5">
                        <input class="form-control mx-auto" type="text" placeholder="Company Name" aria-label="default input example" id="formboxdes">
                    </div>
                    <div class="col-lg-12 mt-5">
                        <input class="form-control mx-auto" type="time" aria-label="default input example" id="formboxdes">
                    </div>
                    <div class="col-lg-12 mt-5">
                        <input class="form-control mx-auto" type="text" placeholder="From" aria-label="default input example" id="formboxdes">
                    </div>
                    <div class="col-lg-12 mt-5">
                        <input class="form-control mx-auto" type="text" placeholder="To" aria-label="default input example" id="formboxdes">
                    </div>
                    <div class="col-lg-12 mt-5">
                        <button class="btn btn-success d-flex mx-auto">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('scripts.php'); ?>
</body>
</html>