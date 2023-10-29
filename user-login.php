<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="assets/css/company-login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
        .hidden{
            display: none!important;
        }
    </style>
</head>
<body>
    <div class="container">
            <div class="col-lg-12 main-div d-flex justify-content-center align-items-center">
                <div class="login-div mx-auto">
                    <div class="row">
                        <div class="h3 col-lg-12 mt-4 ms-4">
                            User Login
                        </div>
                        <div class="col-lg-12 mt-4">
                            <input class="form-control mx-auto formindes" type="email" placeholder="Email-ID" id="email">
                        </div>
                        <div class="col-lg-12 mt-4">
                            <input class="form-control mx-auto formindes" type="password" placeholder="Password" id="pass">
                        </div>
                        <div class="col-lg-12 mt-5">
                            <button class="btn btn-success d-flex mx-auto disabled hidden" id="initSignIn">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span class="visually-hidden">Loading...</span>
                            </button>
                            <button class="btn btn-success d-flex mx-auto" name="signIn" id="signIn">Sign In</button>
                        </div>
                        <div class="col-lg-12 d-flex align-items-end mt-5">
                            <h5>New User?</h5>
                            <a class="btn btn-primary text-decoration-none text-dark ms-3" href="user-signup.php">Register</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <?php include_once('scripts.php'); ?>
    <script type="text/javascript">
        $('body').on('click','#signIn',function(e){
            e.preventDefault();
            var email = $('#email').val();
            var pass = $('#pass').val();
            $('#initSignIn').removeClass('hidden');
            $('#signIn').addClass('hidden');
            $.ajax({
                url:'user-login-helper.php',
                type:'post',
                dataType:'json',
                data:{
                    username: email,
                    pass: pass,
                },
                success:function(msg){
                    console.log(msg);
                    $('#initSignIn').addClass('hidden');
                    $('#signIn').removeClass('hidden');
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