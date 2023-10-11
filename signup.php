<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="signupform d-flex mx-auto">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <img src="images/signup-busbackground.jpg" alt="imgsignupback">
                        </div>
                        <div class="col-lg-7">
                            <div class="h4 text-center mt-3">Sign Up</div>
                            <div class="container">
                                <div class="row mt-5">
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" placeholder="NAME" aria-label="default input example" id="formboxdes">
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="number" placeholder="MOBILE NO" aria-label="default input example" id="formboxdes">
                                    </div>
                                    <div class="col-lg-6 mt-5">
                                        <input class="form-control" type="email" placeholder="EMAIL-ID" aria-label="default input example" id="formboxdes">
                                    </div>
                                    <div class="col-lg-6 mt-5">
                                        <input class="form-control" type="text" placeholder="YOUR CITY" aria-label="default input example" id="formboxdes">
                                    </div>
                                    <div class="col-lg-6 mt-5">
                                        <input class="form-control" type="text" placeholder="PASSWORD" aria-label="default input example" id="formboxdes">
                                    </div>
                                    <div class="col-lg-6 mt-5">
                                        <input class="form-control" type="text" placeholder="CONFIRM-PASSWORD" aria-label="default input example" id="formboxdes">
                                    </div>
                                    <div class="col-lg-12 mt-5 d-flex mx-auto justify-content-center">
                                        <input class="form-control" type="date" placeholder="DOB" aria-label="default input example" id="datedes">
                                    </div>
                                    <div class="col-lg-12 mt-5 text-center">
                                        <div class="btn btn-success" id="signbut">Sign Up</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('scripts.php'); ?>
</body>
</html>