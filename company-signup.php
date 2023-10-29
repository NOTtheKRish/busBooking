<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration</title>
    <link rel="stylesheet" href="assets/css/bus_registration.css">
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
            <div class="registration-div mx-auto">
                <div class="row">
                    <div class="h4 col-lg-12 text-center mt-3">
                        Company Registration
                    </div>
                    <div class="col-lg-12 mt-5">
                        <input class="form-control mx-auto formboxdes" type="text" placeholder="Name" id="name">
                    </div>
                    <div class="col-lg-12 mt-5">
                        <input class="form-control mx-auto formboxdes" type="text" placeholder="Company Name" id="companyName">
                    </div>
                    <div class="col-lg-12 mt-5">
                        <input class="form-control mx-auto formboxdes" type="email" placeholder="E-Mail-ID" id="email">
                    </div>
                    <div class="col-lg-12 mt-5">
                        <input class="form-control mx-auto formboxdes" type="text" placeholder="Phone No" id="phone">
                    </div>
                    <div class="col-lg-12 mt-5">
                        <input class="form-control mx-auto formboxdes" type="password" placeholder="Password" id="pass">
                    </div>
                    <div class="col-lg-12 mt-5">
                        <button class="btn btn-success d-flex mx-auto disabled hidden" id="initSignIn">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="visually-hidden">Registering...</span>
                        </button>
                        <button class="btn btn-success d-flex mx-auto" name="signIn" id="signIn">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('scripts.php'); ?>
    <script type="text/javascript">
        $('body').on('click','#signIn',function(e){
            e.preventDefault();
            var name = $('#name').val();
            var comName = $('#companyName').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var pass = $('#pass').val();

            $('#initSignIn').removeClass('hidden');
            $('#signIn').addClass('hidden');
            $.ajax({
                url:'company-signup-helper.php',
                type:'post',
                dataType:'json',
                data:{
                    name: name,
                    comName: comName,
                    phone: phone,
                    email: email,
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
                                    confirm: "Login Now",
                                }
                            }).then(function(){
                                window.location.href = "company-login.php";
                            });
                        }
                    },600);
                }
            });
        });
    </script>
</body>
</html>