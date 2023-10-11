<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Login</title>
    <link rel="stylesheet" href="assets/css/company-login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
            <div class="col-lg-12 main-div d-flex justify-content-center align-items-center">
                <div class="login-div mx-auto">
                    <div class="row">
                        <div class="h3 col-lg-12 mt-4 ms-4">
                            Login
                        </div>
                        <div class="col-lg-12 mt-4">
                            <input class="form-control mx-auto" type="text" placeholder="Email-ID" aria-label="default input example" id="formindes">
                        </div>
                        <div class="col-lg-12 mt-4">
                            <input class="form-control mx-auto" type="password" placeholder="Password" aria-label="default input example" id="formindes">
                        </div>
                        <div class="col-lg-12 mt-5">
                            <button class="btn btn-success d-flex mx-auto">Log In</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <?php include_once('scripts.php'); ?>
</body>
</html>